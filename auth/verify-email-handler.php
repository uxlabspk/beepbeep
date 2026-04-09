<?php
/**
 * Verify Email Handler
 * Verifies email based on token sent to user.
 */

require_once dirname(__DIR__) . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';
require_once DATABASE_PATH . '/db.php';

initSession();

$token = sanitize($_GET['token'] ?? '');

if (empty($token)) {
    setFlash('error', 'Invalid verification link.');
    redirect('/verify-email.php?status=error');
}

try {
    $db = getDB();
    $stmt = $db->prepare("SELECT id, email_verified FROM users WHERE email_verification_token = :token LIMIT 1");
    $stmt->execute(['token' => $token]);
    $user = $stmt->fetch();

    if (!$user) {
        setFlash('error', 'This verification link is invalid or has already been used.');
        redirect('/verify-email.php?status=error');
    }

    if ((int)$user['email_verified'] === 1) {
        setFlash('success', 'Your email is already verified. Please log in.');
        redirect('/login.php');
    }

    $stmt = $db->prepare(
        "UPDATE users
         SET email_verified = 1, email_verification_token = NULL, updated_at = NOW()
         WHERE id = :id"
    );
    $stmt->execute(['id' => $user['id']]);

    setFlash('success', 'Email verified successfully. You can now log in.');
    redirect('/verify-email.php?status=success');
} catch (PDOException $e) {
    error_log('Email verification error: ' . $e->getMessage());
    setFlash('error', 'An error occurred while verifying your email.');
    redirect('/verify-email.php?status=error');
}
