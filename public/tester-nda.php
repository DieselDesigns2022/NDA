<?php
require_once __DIR__ . '/../includes/nda_helpers.php';

$errors = [];
$posted = $_POST;
$postedInitials = isset($posted['initials']) && is_array($posted['initials']) ? $posted['initials'] : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validate_nda($_POST);
    if (!$errors) {
        create_nda_submission($_POST);
        redirect_to('/nda-success.php');
    }
}

$legalFields = [
    'legal_name' => 'Full legal name',
    'address_line_1' => 'Street address',
    'address_line_2' => 'Address line 2 (optional)',
    'city' => 'City',
    'state_province' => 'State/Province',
    'postal_code' => 'ZIP/Postal code',
    'country' => 'Country',
    'email' => 'Email address',
    'phone' => 'Phone number',
    'business_name' => 'Business name',
    'business_website' => 'Business website / URL',
    'facebook_profile' => 'Facebook name/profile URL',
];

$vouchingFields = [
    'vouching_designer_name' => 'Name of designer vouching for tester',
    'vouching_designer_business' => 'Vouching designer business name',
    'vouching_designer_facebook' => 'Vouching designer website/Facebook/profile URL',
    'vouching_designer_email' => 'Vouching designer email',
    'vouching_designer_relationship' => 'Relationship to tester',
];

$acknowledgments = [
    'confirm_info_accurate' => 'I confirm that the information I provided is true and accurate.',
    'confirm_read_understood_agreed' => 'I confirm that I have read, understood, and agreed to this Confidentiality and Non-Disclosure Agreement in full.',
    'confirm_legal_action' => 'I understand that any violation of this Agreement may result in immediate removal from Asset Moth testing, loss of tester-related perks or benefits, and legal action by Angela Rodgers.',
    'confirm_no_disclosure' => 'I understand that I may not discuss, share, post, leak, copy, recreate, use, or disclose protected Asset Moth information with anyone outside of approved Asset Moth testers, approved Asset Moth admins, and Angela Rodgers.',
];
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Asset Moth Tester NDA</title>
    <link rel="stylesheet" href="<?= h(app_url('/style.css')) ?>">
</head>
<body>
<main class="wrap">
    <h1>Asset Moth Tester NDA</h1>
    <p class="intro">This Confidentiality &amp; Non-Disclosure Agreement must be completed before private Alpha/Beta tester access is granted.</p>

    <?php if ($errors): ?>
        <div class="errors">
            <strong>Please fix:</strong>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= h($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" id="ndaForm" novalidate>
        <?= csrf_field() ?>
        <input class="hp" name="website" tabindex="-1" autocomplete="off">

        <?php foreach (all_nda_sections() as $key => $section): ?>
            <section class="card">
                <div class="nda-text"><?= render_markdownish($section['body']) ?></div>
                <label>
                    <strong>Initial here to acknowledge you have read and understood this section.</strong>
                    <input
                        required
                        maxlength="10"
                        name="initials[<?= h($key) ?>]"
                        value="<?= h(initial_string($postedInitials, $key)) ?>"
                    >
                </label>
            </section>
        <?php endforeach; ?>

        <section class="card">
            <h2>Receiving Party / Tester Legal Information</h2>
            <div class="grid">
                <?php foreach ($legalFields as $key => $label): ?>
                    <?php $required = $key !== 'address_line_2'; ?>
                    <label>
                        <?= h($label) ?><?= $required ? ' *' : '' ?>
                        <input
                            <?= $required ? 'required' : '' ?>
                            name="<?= h($key) ?>"
                            value="<?= old($posted, $key) ?>"
                        >
                    </label>
                <?php endforeach; ?>

                <label>
                    Testing phase requested *
                    <select name="testing_phase" required>
                        <?php foreach (['' => 'Choose...', 'Alpha' => 'Alpha', 'Beta' => 'Beta', 'Either / As Assigned' => 'Either / As Assigned'] as $value => $label): ?>
                            <option value="<?= h($value) ?>" <?= ($posted['testing_phase'] ?? '') === $value ? 'selected' : '' ?>><?= h($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
            </div>

            <h3>Optional Vouching Designer Information</h3>
            <p>If another established designer is vouching for you, add their name, business, website/Facebook/profile, email, and relationship here.</p>
            <div class="grid">
                <?php foreach ($vouchingFields as $key => $label): ?>
                    <label>
                        <?= h($label) ?>
                        <input name="<?= h($key) ?>" value="<?= old($posted, $key) ?>">
                    </label>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="card">
            <h2>Electronic Signature</h2>
            <label>
                Typed signature legal name *
                <input required name="typed_signature_name" value="<?= old($posted, 'typed_signature_name') ?>">
            </label>
            <p>Draw your signature below.</p>
            <canvas id="sig" width="700" height="180"></canvas>
            <input type="hidden" id="signature_data" name="signature_data" value="<?= old($posted, 'signature_data') ?>">
            <input type="hidden" id="signature_drawn" name="signature_drawn" value="<?= old($posted, 'signature_drawn') ?>">
            <button type="button" id="clearSig">Clear Signature</button>

            <div class="checks">
                <?php foreach ($acknowledgments as $key => $label): ?>
                    <label>
                        <input type="checkbox" required name="<?= h($key) ?>" value="1" <?= post_string($posted, $key) === '1' ? 'checked' : '' ?>>
                        <?= h($label) ?>
                    </label>
                <?php endforeach; ?>
            </div>

            <button class="primary" type="submit">Submit Signed NDA</button>
        </section>
    </form>

    <footer>This page is used to collect electronic agreement records for Asset Moth private tester access. Please read the full agreement before signing.</footer>
</main>
<script src="<?= h(app_url('/signature.js')) ?>"></script>
</body>
</html>
