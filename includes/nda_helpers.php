<?php
declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/nda_text.php';

function old(array $data, string $key): string
{
    $value = $data[$key] ?? '';

    if (is_array($value)) {
        return '';
    }

    return h((string) $value);
}


function post_string(array $post, string $key): string
{
    $value = $post[$key] ?? '';

    if (is_array($value)) {
        return '';
    }

    return trim((string) $value);
}


function initial_string(array $initials, string $key): string
{
    $value = $initials[$key] ?? '';

    if (is_array($value)) {
        return '';
    }

    return trim((string) $value);
}

function safe_strlen(string $value): int
{
    if (function_exists('mb_strlen')) {
        return mb_strlen($value);
    }

    return strlen($value);
}

function add_length_errors(array &$errors, array $post): void
{
    $limits = [
        'legal_name' => ['Full legal name', 255],
        'address_line_1' => ['Street address', 255],
        'address_line_2' => ['Address line 2', 255],
        'city' => ['City', 120],
        'state_province' => ['State/Province', 120],
        'postal_code' => ['ZIP/Postal code', 40],
        'country' => ['Country', 120],
        'email' => ['Email address', 255],
        'phone' => ['Phone number', 80],
        'business_name' => ['Business name', 255],
        'business_website' => ['Business website', 500],
        'facebook_profile' => ['Facebook name/profile URL', 500],
        'typed_signature_name' => ['Typed signature legal name', 255],
        'vouching_designer_name' => ['Vouching designer name', 255],
        'vouching_designer_business' => ['Vouching designer business name', 255],
        'vouching_designer_facebook' => ['Vouching designer Facebook/profile URL', 500],
        'vouching_designer_email' => ['Vouching designer email', 255],
        'vouching_designer_relationship' => ['Relationship to tester', 255],
        'signature_data' => ['Drawn signature', 1500000],
        'signature_drawn' => ['Drawn signature confirmation', 10],
    ];

    foreach ($limits as $field => [$label, $maxLength]) {
        $value = post_string($post, $field);
        if ($value !== '' && safe_strlen($value) > $maxLength) {
            $errors[] = sprintf('%s must be %d characters or less.', $label, $maxLength);
        }
    }
}

function validate_nda(array $post): array
{
    $errors = [];

    $csrfToken = post_string($post, 'csrf_token');
    if (!verify_csrf($csrfToken)) {
        $errors[] = 'Your session expired. Please try again.';
    }

    if (post_string($post, 'website') !== '') {
        $errors[] = 'Submission could not be accepted.';
    }

    $postedInitials = isset($post['initials']) && is_array($post['initials']) ? $post['initials'] : [];

    foreach (all_nda_sections() as $key => $section) {
        $initials = initial_string($postedInitials, $key);
        if ($initials === '' || safe_strlen($initials) > 10 || $initials !== strip_tags($initials)) {
            $errors[] = 'Initials are required for ' . $section['title'] . ' and must be 10 characters or less.';
        }
    }

    add_length_errors($errors, $post);

    $requiredFields = [
        'legal_name' => 'Full legal name',
        'address_line_1' => 'Street address',
        'city' => 'City',
        'state_province' => 'State/Province',
        'postal_code' => 'ZIP/Postal code',
        'country' => 'Country',
        'email' => 'Email',
        'phone' => 'Phone',
        'business_name' => 'Business name',
        'business_website' => 'Business website',
        'facebook_profile' => 'Facebook name/profile URL',
        'typed_signature_name' => 'Typed signature legal name',
        'signature_data' => 'Drawn signature',
    ];

    foreach ($requiredFields as $field => $label) {
        if (post_string($post, $field) === '') {
            $errors[] = $label . ' is required.';
        }
    }

    $email = strtolower(post_string($post, 'email'));
    if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email address must be valid.';
    }

    $vouchingDesignerEmail = post_string($post, 'vouching_designer_email');
    if ($vouchingDesignerEmail !== '' && !filter_var($vouchingDesignerEmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Vouching designer email must be valid.';
    }

    $testingPhase = post_string($post, 'testing_phase');
    if (!in_array($testingPhase, ['Alpha', 'Beta', 'Either / As Assigned'], true)) {
        $errors[] = 'Testing phase must be Alpha, Beta, or Either / As Assigned.';
    }

    $url = post_string($post, 'business_website');
    if ($url !== '' && !preg_match('#^https?://#i', $url)) {
        $errors[] = 'Business website must start with https:// or http://.';
    } elseif ($url !== '' && !filter_var($url, FILTER_VALIDATE_URL)) {
        $errors[] = 'Business website must be a valid URL.';
    }

    $signatureData = post_string($post, 'signature_data');
    if (!preg_match('#^data:image/png;base64,[A-Za-z0-9+/=]+$#', $signatureData)) {
        $errors[] = 'Drawn signature must be provided using the signature pad.';
    }

    if (post_string($post, 'signature_drawn') !== '1') {
        $errors[] = 'Please draw your signature before submitting.';
    }

    foreach (['confirm_info_accurate', 'confirm_read_understood_agreed', 'confirm_legal_action', 'confirm_no_disclosure'] as $field) {
        if (post_string($post, $field) !== '1') {
            $errors[] = 'All legal acknowledgment checkboxes are required.';
        }
    }

    if ($email !== '') {
        $stmt = db()->prepare("SELECT COUNT(*) FROM nda_submissions WHERE email = ? AND submitted_at >= datetime('now', '-10 minutes')");
        $stmt->execute([$email]);
        if ((int) $stmt->fetchColumn() > 0) {
            $errors[] = 'An NDA was already submitted with this email very recently. Please wait before submitting again.';
        }
    }

    return $errors;
}

function create_nda_submission(array $post): string
{
    $uuid = bin2hex(random_bytes(16));
    $now = gmdate('Y-m-d H:i:s');
    $initials = [];
    $postedInitials = isset($post['initials']) && is_array($post['initials']) ? $post['initials'] : [];

    foreach (all_nda_sections() as $key => $section) {
        $initials[$key] = initial_string($postedInitials, $key);
    }

    $fields = [
        'uuid' => $uuid,
        'nda_version' => NDA_VERSION,
        'nda_text_hash' => nda_text_hash(),
        'nda_text_snapshot' => nda_text_snapshot(),
        'legal_name' => post_string($post, 'legal_name'),
        'address_line_1' => post_string($post, 'address_line_1'),
        'address_line_2' => post_string($post, 'address_line_2'),
        'city' => post_string($post, 'city'),
        'state_province' => post_string($post, 'state_province'),
        'postal_code' => post_string($post, 'postal_code'),
        'country' => post_string($post, 'country'),
        'email' => strtolower(post_string($post, 'email')),
        'phone' => post_string($post, 'phone'),
        'business_name' => post_string($post, 'business_name'),
        'business_website' => post_string($post, 'business_website'),
        'facebook_profile' => post_string($post, 'facebook_profile'),
        'testing_phase' => post_string($post, 'testing_phase'),
        'vouching_designer_name' => post_string($post, 'vouching_designer_name'),
        'vouching_designer_business' => post_string($post, 'vouching_designer_business'),
        'vouching_designer_facebook' => post_string($post, 'vouching_designer_facebook'),
        'vouching_designer_email' => post_string($post, 'vouching_designer_email'),
        'vouching_designer_relationship' => post_string($post, 'vouching_designer_relationship'),
        'initials_json' => json_encode($initials, JSON_THROW_ON_ERROR),
        'typed_signature_name' => post_string($post, 'typed_signature_name'),
        'signature_data' => post_string($post, 'signature_data'),
        'signature_file_path' => null,
        'confirm_info_accurate' => 1,
        'confirm_read_understood_agreed' => 1,
        'confirm_legal_action' => 1,
        'confirm_no_disclosure' => 1,
        'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '',
        'user_agent' => substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 1000),
        'submitted_at' => $now,
        'created_at' => $now,
        'updated_at' => $now,
    ];

    $columns = array_keys($fields);
    $sql = 'INSERT INTO nda_submissions (' . implode(',', $columns) . ') VALUES (:' . implode(',:', $columns) . ')';
    db()->prepare($sql)->execute($fields);

    return $uuid;
}

function find_nda(string $uuid): ?array
{
    $stmt = db()->prepare('SELECT * FROM nda_submissions WHERE uuid = ?');
    $stmt->execute([$uuid]);
    $record = $stmt->fetch();

    return $record ?: null;
}
