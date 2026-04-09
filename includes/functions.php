<?php
/**
 * Helper Functions
 * Common utility functions used across the site.
 */

/**
 * Initialize session with secure cookie settings.
 */
function initSession() {
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    $isSecure = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';

    if (defined('SESSION_COOKIE_NAME')) {
        session_name(SESSION_COOKIE_NAME);
    }

    session_set_cookie_params([
        'lifetime' => SESSION_LIFETIME,
        'path' => '/',
        'domain' => '',
        'secure' => $isSecure,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);

    session_start();

    // Refresh cookie expiry for active sessions
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), session_id(), [
            'expires' => time() + SESSION_LIFETIME,
            'path' => '/',
            'domain' => '',
            'secure' => $isSecure,
            'httponly' => true,
            'samesite' => 'Lax',
        ]);
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
 * Log a user into the current session.
 */
function loginUser(array $user) {
    session_regenerate_id(true);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_first_name'] = $user['first_name'];
    $_SESSION['user_last_name'] = $user['last_name'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_role'] = $user['role'] ?? 'student';
}

/**
 * Clear auth session data and destroy session.
 */
function logoutUser() {
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', [
            'expires' => time() - 42000,
            'path' => $params['path'] ?? '/',
            'domain' => $params['domain'] ?? '',
            'secure' => $params['secure'] ?? false,
            'httponly' => $params['httponly'] ?? true,
            'samesite' => $params['samesite'] ?? 'Lax',
        ]);
    }

    session_destroy();
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
 * Build full URL from local path.
 */
function buildUrl($path = '') {
    return rtrim(SITE_URL, '/') . '/' . ltrim($path, '/');
}

/**
 * Render a PHP email template into HTML.
 */
function renderEmailTemplate($templateFile, array $data = []) {
    if (!file_exists($templateFile)) {
        return null;
    }

    extract($data, EXTR_SKIP);
    ob_start();
    require $templateFile;
    return ob_get_clean();
}

/**
 * Send HTML email using built-in PHP mail().
 */
function sendHtmlEmail($to, $subject, $htmlContent) {
    $from = SITE_NAME . ' <' . SITE_EMAIL . '>';
    $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=UTF-8',
        'From: ' . $from,
        'Reply-To: ' . SITE_EMAIL,
        'X-Mailer: PHP/' . phpversion(),
    ];

    return mail($to, $subject, $htmlContent, implode("\r\n", $headers));
}

/**
 * Send verification email to user.
 */
function sendVerificationEmail($email, $firstName, $token) {
    $verificationUrl = buildUrl('auth/verify-email-handler.php?token=' . urlencode($token));
    $template = ROOT_PATH . '/emails/welcome.php';

    $html = renderEmailTemplate($template, [
        'firstName' => $firstName,
        'email' => $email,
        'verificationUrl' => $verificationUrl,
    ]);

    if ($html === null) {
        return false;
    }

    return sendHtmlEmail($email, 'Verify Your Email - ' . SITE_NAME, $html);
}

/**
 * Send password reset email to user.
 */
function sendPasswordResetEmail($email, $firstName, $token) {
    $resetUrl = buildUrl('change-password.php?token=' . urlencode($token));
    $template = ROOT_PATH . '/emails/password-reset.php';

    $html = renderEmailTemplate($template, [
        'firstName' => $firstName,
        'resetUrl' => $resetUrl,
    ]);

    if ($html === null) {
        return false;
    }

    return sendHtmlEmail($email, 'Reset Your Password - ' . SITE_NAME, $html);
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
