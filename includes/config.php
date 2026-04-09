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
define('SITE_URL', 'http://localhost/beepbeep'); // Change to your live URL
define('SITE_EMAIL', 'info@beepbeepdriving.co.uk');
define('SITE_PHONE', '01234 567 890');
define('SITE_ADDRESS', '123 High Street, Manchester, M1 1AA');

// Paths (absolute)
define('ROOT_PATH', dirname(__DIR__));
define('INCLUDES_PATH', ROOT_PATH . '/includes');
define('DATABASE_PATH', ROOT_PATH . '/database');
define('AUTH_PATH', ROOT_PATH . '/auth');
define('UPLOADS_PATH', ROOT_PATH . '/public/uploads');

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
