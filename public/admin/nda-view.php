<?php
require_once __DIR__ . '/../../includes/nda_helpers.php';
require_admin();

$idValue = $_GET['id'] ?? '';
$id = is_array($idValue) ? '' : trim((string) $idValue);

if (!preg_match('/^[a-f0-9]{32}$/i', $id)) {
    http_response_code(404);
    exit('Not found');
}

$nda = find_nda($id);
if (!$nda) {
    http_response_code(404);
    exit('Not found');
}

$decodedInitials = json_decode($nda['initials_json'] ?? '', true);
$initials = is_array($decodedInitials) ? $decodedInitials : [];

function stored_initial(array $initials, string $key): string
{
    $value = $initials[$key] ?? '';

    if (is_array($value)) {
        return '';
    }

    return trim((string) $value);
}

function yes_no(mixed $value): string
{
    return (string) $value === '1' ? 'Yes' : 'No';
}

function admin_scalar_value(mixed $value): string
{
    if (is_array($value)) {
        return '';
    }

    return trim((string) $value);
}

function admin_link_href(mixed $value): string
{
    $url = admin_scalar_value($value);

    if ($url === '' || preg_match('/\s/', $url)) {
        return '';
    }

    if (!preg_match('#^[a-z][a-z0-9+.-]*://#i', $url)) {
        $url = 'https://' . ltrim($url, '/');
    }

    return filter_var($url, FILTER_VALIDATE_URL) ? $url : '';
}

function render_admin_value(string $key, mixed $value): string
{
    $text = admin_scalar_value($value);
    $linkFields = [
        'business_website',
        'facebook_profile',
        'vouching_designer_facebook',
    ];

    if (in_array($key, $linkFields, true)) {
        $href = admin_link_href($text);

        if ($href !== '') {
            return '<a href="' . h($href) . '" target="_blank" rel="noopener">' . h($text) . '</a>';
        }
    }

    return h($text);
}

$submissionFields = [
    'uuid' => 'Submission ID',
    'submitted_at' => 'Submitted at (UTC)',
    'legal_name' => 'Legal name',
    'business_name' => 'Business name',
    'email' => 'Email',
    'phone' => 'Phone',
    'address_line_1' => 'Street address',
    'address_line_2' => 'Address line 2',
    'city' => 'City',
    'state_province' => 'State/Province',
    'postal_code' => 'ZIP/Postal code',
    'country' => 'Country',
    'business_website' => 'Business website',
    'facebook_profile' => 'Facebook profile',
    'testing_phase' => 'Testing phase',
    'vouching_designer_name' => 'Vouching designer',
    'vouching_designer_business' => 'Vouching business',
    'vouching_designer_facebook' => 'Vouching Facebook',
    'vouching_designer_email' => 'Vouching email',
    'vouching_designer_relationship' => 'Relationship',
    'typed_signature_name' => 'Typed signature',
    'ip_address' => 'IP address',
    'user_agent' => 'User agent',
    'nda_version' => 'NDA version',
    'nda_text_hash' => 'NDA text hash',
];

$acknowledgments = [
    'confirm_info_accurate' => 'Confirmed information is true and accurate',
    'confirm_read_understood_agreed' => 'Confirmed they read, understood, and agreed to the NDA in full',
    'confirm_legal_action' => 'Understood violation may result in removal/loss of benefits/legal action',
    'confirm_no_disclosure' => 'Understood no disclosure outside approved testers/admins/Angela Rodgers',
];
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>NDA - <?= h($nda['legal_name']) ?></title>
    <link rel="stylesheet" href="<?= h(app_url('/style.css')) ?>">
</head>
<body>
<main class="wrap">
    <div class="topbar no-print">
        <h1>Signed NDA</h1>
        <p>
            <a href="<?= h(app_url('/admin/ndas.php')) ?>">Back to list</a>
            <button onclick="window.print()">Print</button>
        </p>
    </div>

    <section class="card">
        <h2>Submission Record</h2>
        <div class="meta">
            <?php foreach ($submissionFields as $key => $label): ?>
                <strong><?= h($label) ?></strong>
                <span><?= render_admin_value($key, $nda[$key] ?? '') ?></span>
            <?php endforeach; ?>
        </div>

        <h3>Drawn Signature</h3>
        <img class="sigimg" src="<?= h($nda['signature_data']) ?>" alt="Drawn signature">
    </section>

    <section class="card">
        <h2>Legal Acknowledgments</h2>
        <div class="meta">
            <?php foreach ($acknowledgments as $key => $label): ?>
                <strong><?= h($label) ?></strong>
                <span><?= h(yes_no($nda[$key] ?? 0)) ?></span>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="card">
        <h2>Signed NDA Text Snapshot</h2>
        <p><strong>This is the stored NDA text snapshot signed with this submission.</strong></p>
        <div class="nda-text"><?= render_markdownish($nda['nda_text_snapshot'] ?? '') ?></div>
    </section>

    <section class="card">
        <h2>Tester Initials by Section</h2>
        <div class="meta">
            <?php foreach (all_nda_sections() as $key => $section): ?>
                <strong><?= h($section['title']) ?></strong>
                <span><?= h(stored_initial($initials, $key)) ?></span>
            <?php endforeach; ?>
        </div>
    </section>
</main>
</body>
</html>
