# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Development Server

```bash
# From project root
php -S localhost:8000
```

Apache/Nginx must point document root at the project root. The `.htaccess` handles Apache rules.

## Database Setup

```bash
# Create DB and import schema
mysql -u root -p -e "CREATE DATABASE beepbeep_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
mysql -u root -p beepbeep_db < database/schema.sql
```

## Environment Configuration

Copy `.env.example` to `.env` and set DB credentials. `includes/config.php` loads `.env` automatically. Key variables: `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`, `SITE_URL`, `MAIL_TRANSPORT` (`mail` or `smtp`), and SMTP settings when using smtp transport.

Set `DEBUG_MODE` to `false` in `includes/config.php` for production.

## Architecture

**No framework** — plain PHP 8+, MySQL (PDO), Tailwind CSS via CDN, vanilla JS.

**Request flow:** Browser → `*.php` (root pages) → includes config/functions/auth → `database/db.php` (PDO singleton via `getDB()`) → response.

**Key layers:**

- `includes/config.php` — constants for DB, mail, paths, session. Always loaded first.
- `includes/functions.php` — `e()` for XSS-safe output, `redirect()`, `setFlash()`/`getFlash()`, `isLoggedIn()`, `currentUser()`, `initSession()`, CSRF helpers.
- `database/db.php` — `Database` singleton; use `getDB()` to get PDO connection everywhere.
- `auth/middleware.php` — `requireAuth()`, `requireAdmin()`, `requireInstructor()`, `redirectIfAuth()`. Include at top of protected pages.
- `api/*.php` — AJAX endpoints for contact and booking form submissions.
- `emails/*.php` — Email templates (welcome, booking confirmation, password reset).

**User roles:** `student`, `instructor`, `admin` — checked via `currentUser()['role']`.

**CSRF:** Tokens generated/verified via helpers in `functions.php` — apply to all state-changing forms.

**Uploads:** User files go to `uploads/` (e.g. licence photos).

## Conventions

- Always use `e($var)` / `htmlspecialchars()` when outputting user data.
- Use prepared statements via PDO for all DB queries — never interpolate user input into SQL.
- Flash messages passed between pages via `setFlash()`/`getFlash()` stored in `$_SESSION`.
- Brand colors: primary orange `#FF6B00`, dark bg `#1A1A2E`, card bg `#16213E`.
