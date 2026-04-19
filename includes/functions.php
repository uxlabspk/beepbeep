<?php
/**
 * Helper Functions
 * Common utility functions used across the site.
 */

/**
 * Initialize session
 */
function initSession() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

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
 * Build full URL from local path.
 */
function buildUrl($path = '') {
    return rtrim(SITE_URL, '/') . '/' . ltrim($path, '/');
}






/**
 * Validate password complexity.
 */
function isStrongPassword($password) {
    return strlen($password) >= 8
        && preg_match('/[A-Z]/', $password)
        && preg_match('/[0-9]/', $password)
        && preg_match('/[^a-zA-Z0-9]/', $password);
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
