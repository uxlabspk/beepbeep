<?php
/**
 * Login Handler
 * Processes user login and sets session variables.
 */

session_start();
require_once dirname(__DIR__) . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';
require_once DATABASE_PATH . '/db.php';

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

$email = sanitize($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']);

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

    // Check email verification (optional: remove if you don't require it)
    // if (!$user['email_verified']) {
    //     setFlash('error', 'Please verify your email before logging in. Check your inbox.');
    //     redirect('/verify-email.php');
    // }

    // Set session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_first_name'] = $user['first_name'];
    $_SESSION['user_last_name'] = $user['last_name'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_role'] = $user['role'];

    // Remember me (extend session lifetime)
    if ($remember) {
        ini_set('session.cookie_lifetime', 30 * 24 * 3600); // 30 days
    }

    setFlash('success', 'Welcome back, ' . $user['first_name'] . '!');
    redirect('/dashboard.php');

} catch (PDOException $e) {
    error_log("Login error: " . $e->getMessage());
    setFlash('error', 'An error occurred. Please try again later.');
    redirect('/login.php');
}
