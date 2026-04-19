<?php
/**
 * Site-wide Configuration
 * Update these values as needed for your environment.
 */



// Site settings
define('SITE_NAME', 'Beep Beep Driving School');
// Site URL - change this to your domain
define('SITE_URL', 'http://localhost:8000');
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
