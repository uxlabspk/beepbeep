# Project Guidelines

## Code Style
- Follow the existing PHP style: small procedural helpers, clear file boundaries, and minimal abstraction.
- Use `includes/config.php` for shared constants and environment loading, `includes/functions.php` for reusable helpers, and `database/db.php` for database access.
- Use prepared statements through `getDB()` for all database work.
- Escape user-facing output with `e()` and keep session/auth changes inside the existing helper functions.

## Architecture
- The web server document root must point at `public/`; do not assume the project root is web-accessible.
- `public/` contains the pages and assets, `includes/` contains shared layout/config helpers, `auth/` contains login and guard logic, `api/` contains form endpoints, `database/` contains schema and PDO setup, and `emails/` contains HTML email templates.
- Protected pages should load `auth/middleware.php` and call the appropriate guard (`requireAuth()`, `requireAdmin()`, or `requireInstructor()`).
- For setup and feature context, link to [README.md](README.md) instead of duplicating it.

## Build and Test
- There is no automated build pipeline or test suite in this repository.
- For local development, run `cd public && php -S localhost:8000`.
- Set up the database from `database/schema.sql` and verify changes manually in the browser.

## Conventions
- Keep `.env` local and uncommitted; the repository already ignores it.
- Preserve the existing config chain where `.env` is read by `includes/config.php` and environment variables take precedence over defaults.
- When adding or changing forms, keep CSRF token generation and verification wired through the existing helpers.
- Update `database/schema.sql` when schema or seed data changes, and keep email templates consistent with the helper functions that render them.