<?php
/**
 * Forgot Password Handler
 * Generates reset token and sends reset email.
 */

require_once dirname(__DIR__) . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';
require_once DATABASE_PATH . '/db.php';

initSession();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/forgot-password.php');
}

if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
    setFlash('error', 'Invalid request. Please try again.');
    redirect('/forgot-password.php');
}

$email = strtolower(sanitize($_POST['email'] ?? ''));

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setFlash('error', 'Please enter a valid email address.');
    redirect('/forgot-password.php');
}

try {
    $db = getDB();
    $stmt = $db->prepare("SELECT id, first_name FROM users WHERE email = :email LIMIT 1");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    // Always show generic success message to avoid user enumeration
    if (!$user) {
        setFlash('success', 'If an account exists for this email, a reset link has been sent.');
        redirect('/forgot-password.php');
    }

    $resetToken = bin2hex(random_bytes(32));
    $resetExpires = date('Y-m-d H:i:s', time() + 3600);

    $stmt = $db->prepare(
        "UPDATE users
         SET password_reset_token = :token,
             password_reset_expires = :expires,
             updated_at = NOW()
         WHERE id = :id"
    );
    $stmt->execute([
        'token' => $resetToken,
        'expires' => $resetExpires,
        'id' => $user['id'],
    ]);

    sendPasswordResetEmail($email, $user['first_name'], $resetToken);

    setFlash('success', 'If an account exists for this email, a reset link has been sent.');
    redirect('/forgot-password.php');
} catch (PDOException $e) {
    error_log('Forgot password error: ' . $e->getMessage());
    setFlash('error', 'An error occurred. Please try again later.');
    redirect('/forgot-password.php');
}
