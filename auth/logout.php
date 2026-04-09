<?php
/**
 * Logout Handler
 * Destroys the user session and redirects to login.
 */

session_start();

// Clear all session data
$_SESSION = [];

// Delete session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Destroy the session
session_destroy();

// Redirect to login page
header('Location: /login.php');
exit;
