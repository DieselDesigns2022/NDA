<?php
require_once __DIR__ . '/../../includes/bootstrap.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (verify_csrf($_POST['csrf_token'] ?? '') && admin_login($_POST['password'] ?? '')) {
        redirect_to('/admin/ndas.php');
    }

    $error = 'Invalid admin password.';
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?= h(app_url('/style.css')) ?>">
</head>
<body>
<main class="wrap card">
    <h1>Asset Moth Admin</h1>

    <?php if (!admin_password_hash_configured() && admin_password_fallback_configured()): ?>
        <div class="errors">
            ADMIN_PASSWORD_HASH is not configured. ADMIN_PASSWORD is active only as a temporary local-testing fallback and should not be used for production.
        </div>
    <?php elseif (!admin_password_configured()): ?>
        <div class="errors">
            Admin login is disabled until ADMIN_PASSWORD_HASH is configured persistently for the PHP-FPM/web server environment.
        </div>
    <?php endif; ?>

    <?php if ($error !== ''): ?>
        <div class="errors"><?= h($error) ?></div>
    <?php endif; ?>

    <form method="post">
        <?= csrf_field() ?>
        <label>
            Admin password
            <input type="password" name="password" required>
        </label>
        <button class="primary">Log in</button>
    </form>
</main>
</body>
</html>
