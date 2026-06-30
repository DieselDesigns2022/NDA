<?php
declare(strict_types=1);

$secureSessionCookie = (
    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')
);

session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => $secureSessionCookie,
    'httponly' => true,
    'samesite' => 'Lax',
]);
session_start();

define('APP_ROOT', dirname(__DIR__));
define('NDA_DB_PATH', getenv('NDA_DB_PATH') ?: APP_ROOT . '/storage/nda.sqlite');

function h(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function app_base_path(): string
{
    $configured = getenv('APP_BASE_PATH');
    if ($configured === false) {
        $configured = '/NDA';
    }

    $configured = trim($configured);
    if ($configured === '' || $configured === '/') {
        return $configured === '/' ? '/' : '';
    }

    return rtrim('/' . trim($configured, '/'), '/');
}

function app_url(string $path): string
{
    $path = '/' . ltrim($path, '/');
    $base = app_base_path();

    if ($base === '' || $base === '/') {
        return $path;
    }

    return $base . $path;
}

function redirect_to(string $path): never
{
    header('Location: ' . app_url($path));
    exit;
}

function redirect(string $path): never
{
    redirect_to($path);
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="' . h(csrf_token()) . '">';
}

function verify_csrf(?string $token): bool
{
    return is_string($token) && hash_equals($_SESSION['csrf_token'] ?? '', $token);
}

function db(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    if (!is_dir(dirname(NDA_DB_PATH))) {
        mkdir(dirname(NDA_DB_PATH), 0750, true);
    }

    $pdo = new PDO('sqlite:' . NDA_DB_PATH, null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    $pdo->exec(file_get_contents(APP_ROOT . '/database/001_create_nda_submissions.sql'));

    return $pdo;
}

function admin_password_hash_configured(): bool
{
    return (getenv('ADMIN_PASSWORD_HASH') ?: '') !== '';
}

function admin_password_fallback_configured(): bool
{
    return (getenv('ADMIN_PASSWORD') ?: '') !== '';
}

function admin_password_configured(): bool
{
    return admin_password_hash_configured() || admin_password_fallback_configured();
}

function is_admin(): bool
{
    return !empty($_SESSION['admin_authenticated']);
}

function require_admin(): void
{
    if (!is_admin()) {
        redirect_to('/admin/login.php');
    }
}

function mark_admin_authenticated(): void
{
    session_regenerate_id(true);
    $_SESSION['admin_authenticated'] = true;
}

function admin_login(string $password): bool
{
    if ($password === '') {
        return false;
    }

    $hash = getenv('ADMIN_PASSWORD_HASH') ?: '';
    if ($hash !== '') {
        if (password_verify($password, $hash)) {
            mark_admin_authenticated();
            return true;
        }

        return false;
    }

    $expected = getenv('ADMIN_PASSWORD') ?: '';
    if ($expected !== '' && hash_equals($expected, $password)) {
        mark_admin_authenticated();
        return true;
    }

    return false;
}
