<?php
/**
 * Resend Verification Email Handler
 */

require_once dirname(__DIR__) . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';
require_once DATABASE_PATH . '/db.php';

initSession();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/verify-email.php');
}

if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
    setFlash('error', 'Invalid request. Please try again.');
    redirect('/verify-email.php');
}

$email = strtolower(sanitize($_POST['resend_email'] ?? ''));

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setFlash('error', 'Please enter a valid email address.');
    redirect('/verify-email.php');
}

try {
    $db = getDB();
    $stmt = $db->prepare("SELECT id, first_name, email_verified FROM users WHERE email = :email LIMIT 1");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if (!$user) {
        setFlash('error', 'No account was found for that email address.');
        redirect('/verify-email.php?email=' . urlencode($email));
    }

    if ((int)$user['email_verified'] === 1) {
        setFlash('success', 'Your email is already verified. You can log in now.');
        redirect('/login.php');
    }

    $token = bin2hex(random_bytes(32));
    $stmt = $db->prepare("UPDATE users SET email_verification_token = :token, updated_at = NOW() WHERE id = :id");
    $stmt->execute([
        'token' => $token,
        'id' => $user['id'],
    ]);

    $sent = sendVerificationEmail($email, $user['first_name'], $token);

    if ($sent) {
        setFlash('success', 'A new verification email has been sent.');
    } else {
        setFlash('error', 'Could not send verification email right now. Please try again later.');
    }

    redirect('/verify-email.php?email=' . urlencode($email));
} catch (PDOException $e) {
    error_log('Resend verification error: ' . $e->getMessage());
    setFlash('error', 'An error occurred. Please try again later.');
    redirect('/verify-email.php');
}
