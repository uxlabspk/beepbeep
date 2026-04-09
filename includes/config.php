<?php
/**
 * Site-wide Configuration
 * Update these values as needed for your environment.
 */

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

// Database credentials (change for production)
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'driving');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_CHARSET', 'utf8mb4');

// Session settings
define('SESSION_LIFETIME', 3600); // 1 hour in seconds

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
