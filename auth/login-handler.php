<?php
/**
 * Login Handler
 * Processes user login and sets session variables.
 */

require_once dirname(__DIR__) . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';
require_once DATABASE_PATH . '/db.php';

initSession();

// If already logged in, redirect to dashboard
if (isLoggedIn()) {
    redirect('/dashboard.php');
}

// Only process on POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/login.php');
}

// Validate CSRF token
if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
    setFlash('error', 'Invalid request. Please try again.');
    redirect('/login.php');
}

$email = strtolower(sanitize($_POST['email'] ?? ''));
$password = $_POST['password'] ?? '';

// Validation
if (empty($email) || empty($password)) {
    setFlash('error', 'Please enter both email and password.');
    redirect('/login.php');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setFlash('error', 'Please enter a valid email address.');
    redirect('/login.php');
}

try {
    $db = getDB();
    $stmt = $db->prepare("SELECT id, first_name, last_name, email, password_hash, role, email_verified FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password_hash'])) {
        setFlash('error', 'Invalid email or password.');
        redirect('/login.php');
    }

    // Require verified email before login
    if (!(int)$user['email_verified']) {
        setFlash('error', 'Please verify your email before logging in.');
        redirect('/verify-email.php?email=' . urlencode($user['email']));
    }

    // Set secure login session
    loginUser($user);

    setFlash('success', 'Welcome back, ' . $user['first_name'] . '!');
    redirect('/dashboard.php');

} catch (PDOException $e) {
    error_log("Login error: " . $e->getMessage());
    setFlash('error', 'An error occurred. Please try again later.');
    redirect('/login.php');
}
