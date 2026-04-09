<?php
/**
 * Helper Functions
 * Common utility functions used across the site.
 */

/**
 * Safely echo a variable
 */
function e($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Redirect to a URL
 */
function redirect($url, $statusCode = 303) {
    header('Location: ' . $url, true, $statusCode);
    exit;
}

/**
 * Set a flash message (stored in session)
 */
function setFlash($type, $message) {
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

/**
 * Get and clear the flash message
 */
function getFlash() {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

/**
 * Check if user is logged in
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

/**
 * Require user to be logged in
 */
function requireAuth($redirectUrl = '/login.php') {
    if (!isLoggedIn()) {
        redirect($redirectUrl);
    }
}

/**
 * Get current user data from session
 */
function currentUser() {
    return [
        'id' => $_SESSION['user_id'] ?? null,
        'first_name' => $_SESSION['user_first_name'] ?? '',
        'last_name' => $_SESSION['user_last_name'] ?? '',
        'email' => $_SESSION['user_email'] ?? '',
        'role' => $_SESSION['user_role'] ?? 'student',
    ];
}

/**
 * Generate a CSRF token
 */
function generateCsrfToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify a CSRF token
 */
function verifyCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Sanitize input string
 */
function sanitize($input) {
    return trim(strip_tags(stripslashes($input)));
}

/**
 * Format a UK phone number
 */
function formatPhone($phone) {
    return preg_replace('/[^0-9+]/', '', $phone);
}

/**
 * Format a UK postcode
 */
function formatPostcode($postcode) {
    return strtoupper(trim($postcode));
}

/**
 * Calculate age from date of birth
 */
function calculateAge($dob) {
    $birthDate = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($birthDate);
    return $age->y;
}
