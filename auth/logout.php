<?php
/**
 * Logout Handler
 * Destroys the user session and redirects to login.
 */

require_once dirname(__DIR__) . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';

initSession();
logoutUser();

header('Location: /login.php', true, 303);
exit;
