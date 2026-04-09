<?php
/**
 * Delete Profile Handler
 * Permanently deletes the logged-in user's account.
 */

require_once dirname(__DIR__) . '/auth/middleware.php';
require_once DATABASE_PATH . '/db.php';

requireAuth();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/profile.php');
}

if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
    setFlash('error', 'Invalid request. Please try again.');
    redirect('/profile.php#danger-zone');
}

$userId = (int) (currentUser()['id'] ?? 0);
if ($userId <= 0) {
    setFlash('error', 'Please log in to continue.');
    redirect('/login.php');
}

$confirmDelete = strtoupper(trim($_POST['confirm_delete'] ?? ''));
$currentPassword = $_POST['current_password'] ?? '';

if ($confirmDelete !== 'DELETE') {
    setFlash('error', 'Type DELETE to confirm account deletion.');
    redirect('/profile.php#danger-zone');
}

if ($currentPassword === '') {
    setFlash('error', 'Current password is required to delete your account.');
    redirect('/profile.php#danger-zone');
}

try {
    $db = getDB();

    $stmt = $db->prepare('SELECT password_hash FROM users WHERE id = :id LIMIT 1');
    $stmt->execute(['id' => $userId]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($currentPassword, $user['password_hash'])) {
        setFlash('error', 'Current password is incorrect.');
        redirect('/profile.php#danger-zone');
    }

    $db->beginTransaction();

    $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
    $stmt->execute(['id' => $userId]);

    $db->commit();

    logoutUser();
    initSession();
    setFlash('success', 'Your profile has been deleted.');
    redirect('/signup.php');
} catch (Throwable $e) {
    if (isset($db) && $db instanceof PDO && $db->inTransaction()) {
        $db->rollBack();
    }

    error_log('Delete profile error: ' . $e->getMessage());
    setFlash('error', 'Could not delete profile right now. Please try again.');
    redirect('/profile.php#danger-zone');
}
