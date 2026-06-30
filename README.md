# Asset Moth Tester NDA System

This repository contains a simple PHP/SQLite NDA signing system for Asset Moth private Alpha/Beta testers.

## Production URL path for dieseldesigns.co

This app is intended to be accessed publicly under:

```text
https://dieseldesigns.co/NDA/
```

The server folder may be named `NDA`, but the web server must expose only this repo's `public/` directory at the public `/NDA/` URL path.

The app defaults to `APP_BASE_PATH=/NDA`, so generated links and redirects point to `/NDA/...` unless explicitly overridden.

## Required public routes

With the `/NDA/` deployment path, these are the live URLs:

- `https://dieseldesigns.co/NDA/tester-nda.php`
- `https://dieseldesigns.co/NDA/nda-success.php`
- `https://dieseldesigns.co/NDA/admin/login.php`
- `https://dieseldesigns.co/NDA/admin/logout.php`
- `https://dieseldesigns.co/NDA/admin/ndas.php`
- `https://dieseldesigns.co/NDA/admin/nda-view.php?id=<submission-uuid>`

## Public vs private folders

The following browser-facing files live under `public/`:

- `public/tester-nda.php`
- `public/nda-success.php`
- `public/admin/login.php`
- `public/admin/logout.php`
- `public/admin/ndas.php`
- `public/admin/nda-view.php`
- `public/style.css`
- `public/signature.js`

These private folders must remain outside the public web root and must not be directly browser-accessible:

- `includes/`
- `database/`
- `storage/`
- `storage/nda.sqlite`

Do **not** expose `storage/nda.sqlite`. Signed NDA records and signature data are stored in SQLite under `storage/` by default, so `storage/` must be writable by PHP but must not be publicly browsable.

## Base path configuration

Production can rely on the default base path:

```bash
APP_BASE_PATH=/NDA
```

If `APP_BASE_PATH` is not set, the app defaults to `/NDA`.

For root/local testing only, explicitly set an empty base path:

```bash
APP_BASE_PATH=''
```

Base-path behavior examples:

- `app_url('/tester-nda.php')` -> `/NDA/tester-nda.php`
- `app_url('tester-nda.php')` -> `/NDA/tester-nda.php`
- `app_url('/admin/login.php')` -> `/NDA/admin/login.php`
- with `APP_BASE_PATH=''`, `app_url('/tester-nda.php')` -> `/tester-nda.php`

## Safe server configuration guidance

### Nginx goal

Configure Nginx so the public URL path `/NDA/` maps to the repo's `public/` directory, not the repo root.

The goal is:

- `/NDA/tester-nda.php` resolves to `public/tester-nda.php`
- `/NDA/admin/login.php` resolves to `public/admin/login.php`
- `/NDA/includes/` is not accessible
- `/NDA/database/` is not accessible
- `/NDA/storage/` is not accessible

The exact Nginx config depends on the VPS layout and PHP-FPM version, but avoid any config that aliases `/NDA/` to the repo root. If using `alias`, it should point at the `public/` folder, and PHP `SCRIPT_FILENAME` must also resolve inside `public/`.

### Apache goal

If using Apache, make the web-accessible directory for this app the repo's `public/` folder. If that is not possible, deny direct browser access to `includes/`, `database/`, and `storage/` before going live.

## Persistent admin password setup

Use an admin password hash in production. Generate the hash with:

```bash
php -r "echo password_hash('CHANGE_THIS_PASSWORD', PASSWORD_DEFAULT) . PHP_EOL;"
```

Set the generated value persistently as `ADMIN_PASSWORD_HASH` for the PHP-FPM pool or service that runs `dieseldesigns.co`. For a typical PHP-FPM pool, add a line like this to the site/pool configuration, then reload PHP-FPM:

```ini
env[ADMIN_PASSWORD_HASH] = $2y$10$replace_this_with_the_generated_hash
env[APP_BASE_PATH] = /NDA
```

Example reload command, adjusted for the installed PHP-FPM service name:

```bash
sudo systemctl reload php-fpm
```

or, on versioned PHP-FPM installs:

```bash
sudo systemctl reload php8.3-fpm
```

`ADMIN_PASSWORD` is supported only as a temporary local-testing fallback when `ADMIN_PASSWORD_HASH` is not set. Do not use `export ADMIN_PASSWORD=...` as permanent VPS configuration.

## Storage setup

Make `storage/` writable by the PHP user and keep it outside the public web root:

```bash
mkdir -p storage
chmod 750 storage
```

Depending on the VPS user/group, you may also need something like:

```bash
sudo chown -R www-data:www-data storage
```

The app auto-creates the SQLite database at `storage/nda.sqlite` using `database/001_create_nda_submissions.sql` on first use. To use another private SQLite path, set `NDA_DB_PATH` persistently for PHP-FPM too.

Do not commit `storage/nda.sqlite`; it contains signed NDA records.

## Local testing

PHP's built-in server with `-t public` serves from the local root path, so use one of these options.

### Option A: practical root-path local testing

Use an empty base path locally:

```bash
APP_BASE_PATH='' ADMIN_PASSWORD_HASH="$(php -r "echo password_hash('local-test-password', PASSWORD_DEFAULT);")" php -S 127.0.0.1:8080 -t public
```

Then open:

- `http://127.0.0.1:8080/tester-nda.php`
- `http://127.0.0.1:8080/nda-success.php`
- `http://127.0.0.1:8080/admin/login.php`
- `http://127.0.0.1:8080/admin/ndas.php`

### Option B: simulate `/NDA`

Use server config or a router script that maps `/NDA/` to `public/`, then run with:

```bash
APP_BASE_PATH=/NDA ADMIN_PASSWORD_HASH="$(php -r "echo password_hash('local-test-password', PASSWORD_DEFAULT);")" php -S 127.0.0.1:8080 -t public
```

When using this option, confirm generated links contain `/NDA/...` and that the test server/router resolves those paths into `public/`.
