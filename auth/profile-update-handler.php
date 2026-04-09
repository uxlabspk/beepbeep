<?php
/**
 * Profile Update Handler
 * Updates the logged-in user's basic profile settings.
 */

require_once dirname(__DIR__) . '/auth/middleware.php';
require_once DATABASE_PATH . '/db.php';

requireAuth();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/profile.php');
}

if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
    setFlash('error', 'Invalid request. Please try again.');
    redirect('/profile.php');
}

$userId = (int) (currentUser()['id'] ?? 0);
if ($userId <= 0) {
    setFlash('error', 'Please log in to continue.');
    redirect('/login.php');
}

$firstName = sanitize($_POST['first_name'] ?? '');
$lastName = sanitize($_POST['last_name'] ?? '');
$phone = formatPhone($_POST['phone'] ?? '');

$errors = [];

if ($firstName === '') {
    $errors[] = 'First name is required.';
}

if ($lastName === '') {
    $errors[] = 'Last name is required.';
}

if ($phone === '') {
    $errors[] = 'Phone number is required.';
}

if (!empty($errors)) {
    setFlash('error', implode(' ', $errors));
    redirect('/profile.php');
}

try {
    $db = getDB();
    $stmt = $db->prepare(
        'UPDATE users
         SET first_name = :first_name,
             last_name = :last_name,
             phone = :phone,
             updated_at = NOW()
         WHERE id = :id'
    );

    $stmt->execute([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'phone' => $phone,
        'id' => $userId,
    ]);

    // Keep session identity in sync with saved profile values.
    $_SESSION['user_first_name'] = $firstName;
    $_SESSION['user_last_name'] = $lastName;

    setFlash('success', 'Profile updated successfully.');
    redirect('/profile.php');
} catch (PDOException $e) {
    error_log('Profile update error: ' . $e->getMessage());
    setFlash('error', 'Could not update profile right now. Please try again.');
    redirect('/profile.php');
}
