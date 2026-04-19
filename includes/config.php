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
define('UPLOADS_PATH', ROOT_PATH . '/uploads');





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
