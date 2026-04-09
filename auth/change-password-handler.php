<?php
/**
 * Change/Reset Password Handler
 * Supports:
 * - Logged-in password change with current password check
 * - Token-based password reset
 */

require_once dirname(__DIR__) . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';
require_once DATABASE_PATH . '/db.php';

initSession();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/change-password.php');
}

if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
    setFlash('error', 'Invalid request. Please try again.');
    redirect('/change-password.php');
}

$newPassword = $_POST['newPassword'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';
$resetToken = sanitize($_POST['reset_token'] ?? '');

if (!isStrongPassword($newPassword)) {
    setFlash('error', 'Password must be at least 8 characters and include an uppercase letter, a number, and a special character.');
    redirect('/change-password.php' . (!empty($resetToken) ? '?token=' . urlencode($resetToken) : ''));
}

if ($newPassword !== $confirmPassword) {
    setFlash('error', 'Passwords do not match.');
    redirect('/change-password.php' . (!empty($resetToken) ? '?token=' . urlencode($resetToken) : ''));
}

try {
    $db = getDB();

    // Token-based reset flow
    if (!empty($resetToken)) {
        $stmt = $db->prepare(
            "SELECT id, password_reset_expires
             FROM users
             WHERE password_reset_token = :token
             LIMIT 1"
        );
        $stmt->execute(['token' => $resetToken]);
        $user = $stmt->fetch();

        if (!$user || empty($user['password_reset_expires']) || strtotime($user['password_reset_expires']) < time()) {
            setFlash('error', 'This reset link is invalid or has expired.');
            redirect('/forgot-password.php');
        }

        $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

        $stmt = $db->prepare(
            "UPDATE users
             SET password_hash = :password_hash,
                 password_reset_token = NULL,
                 password_reset_expires = NULL,
                 updated_at = NOW()
             WHERE id = :id"
        );
        $stmt->execute([
            'password_hash' => $passwordHash,
            'id' => $user['id'],
        ]);

        setFlash('success', 'Your password has been reset successfully. Please log in.');
        redirect('/change-password.php?status=success');
    }

    // Authenticated change flow
    if (!isLoggedIn()) {
        setFlash('error', 'Please log in to change your password.');
        redirect('/login.php');
    }

    $currentPassword = $_POST['currentPassword'] ?? '';

    if (empty($currentPassword)) {
        setFlash('error', 'Current password is required.');
        redirect('/change-password.php');
    }

    $stmt = $db->prepare("SELECT id, password_hash FROM users WHERE id = :id LIMIT 1");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($currentPassword, $user['password_hash'])) {
        setFlash('error', 'Current password is incorrect.');
        redirect('/change-password.php');
    }

    if (password_verify($newPassword, $user['password_hash'])) {
        setFlash('error', 'New password must be different from your current password.');
        redirect('/change-password.php');
    }

    $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

    $stmt = $db->prepare(
        "UPDATE users
         SET password_hash = :password_hash,
             updated_at = NOW()
         WHERE id = :id"
    );
    $stmt->execute([
        'password_hash' => $passwordHash,
        'id' => $user['id'],
    ]);

    setFlash('success', 'Password changed successfully.');
    redirect('/change-password.php?status=success');
} catch (PDOException $e) {
    error_log('Change password error: ' . $e->getMessage());
    setFlash('error', 'An error occurred. Please try again later.');
    redirect('/change-password.php' . (!empty($resetToken) ? '?token=' . urlencode($resetToken) : ''));
}
