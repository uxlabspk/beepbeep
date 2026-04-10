<?php
/**
 * Site-wide Configuration
 * Update these values as needed for your environment.
 */

// Load .env file if it exists (for local development)
$envFile = dirname(__DIR__) . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        // Parse key=value
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            
            // Only set if not already set by the system
            if (getenv($key) === false) {
                putenv("$key=$value");
                $_ENV[$key] = $value;
            }
        }
    }
}

// Site settings
define('SITE_NAME', 'Beep Beep Driving School');
// Prefer SITE_URL from environment; otherwise infer from current request.
$siteUrl = getenv('SITE_URL');
if (!$siteUrl && isset($_SERVER['HTTP_HOST'])) {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $siteUrl = $scheme . '://' . $_SERVER['HTTP_HOST'];
}
define('SITE_URL', $siteUrl ?: 'http://localhost:8000');
define('SITE_EMAIL', 'info@beepbeepdriving.co.uk');
define('SITE_PHONE', '01234 567 890');
define('SITE_ADDRESS', '123 High Street, Manchester, M1 1AA');

// Paths (absolute)
define('ROOT_PATH', dirname(__DIR__));
define('INCLUDES_PATH', ROOT_PATH . '/includes');
define('DATABASE_PATH', ROOT_PATH . '/database');
define('AUTH_PATH', ROOT_PATH . '/auth');
define('UPLOADS_PATH', ROOT_PATH . '/uploads');

// Database credentials (use environment variables in production)
define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1');
define('DB_NAME', getenv('DB_NAME') ?: 'driving');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('DB_CHARSET', getenv('DB_CHARSET') ?: 'utf8mb4');

// Session settings
define('SESSION_LIFETIME', 60 * 60 * 24 * 30); // 30 days
define('SESSION_COOKIE_NAME', 'beepbeep_session');

// Email settings (can be overridden by environment variables)
define('MAIL_FROM_NAME', getenv('MAIL_FROM_NAME') ?: SITE_NAME);
define('MAIL_FROM_EMAIL', getenv('MAIL_FROM_EMAIL') ?: SITE_EMAIL);
define('MAIL_REPLY_TO', getenv('MAIL_REPLY_TO') ?: MAIL_FROM_EMAIL);
define('MAIL_TRANSPORT', strtolower(getenv('MAIL_TRANSPORT') ?: 'mail')); // mail|smtp

// SMTP settings (used when MAIL_TRANSPORT=smtp)
define('SMTP_HOST', getenv('SMTP_HOST') ?: '');
define('SMTP_PORT', (int) (getenv('SMTP_PORT') ?: 587));
define('SMTP_ENCRYPTION', strtolower(getenv('SMTP_ENCRYPTION') ?: 'tls')); // tls|ssl|none
define('SMTP_USERNAME', getenv('SMTP_USERNAME') ?: '');
define('SMTP_PASSWORD', getenv('SMTP_PASSWORD') ?: '');
define('SMTP_AUTH', filter_var(getenv('SMTP_AUTH') ?: 'true', FILTER_VALIDATE_BOOLEAN));

// Error reporting (set to false on production)
define('DEBUG_MODE', true);

if (defined('DEBUG_MODE') && DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Timezone
date_default_timezone_set('Europe/London');
