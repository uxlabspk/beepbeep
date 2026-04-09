<?php
/**
 * Signup Handler
 * Registers a new user and sends a verification email.
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
    redirect('/signup.php');
}

// Validate CSRF token
if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
    setFlash('error', 'Invalid request. Please try again.');
    redirect('/signup.php');
}

$firstName = sanitize($_POST['firstName'] ?? '');
$lastName = sanitize($_POST['lastName'] ?? '');
$email = strtolower(sanitize($_POST['email'] ?? ''));
$phone = formatPhone($_POST['phone'] ?? '');
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';
$agreeTerms = isset($_POST['terms']);

// Validation
$errors = [];

if (empty($firstName)) $errors[] = 'First name is required.';
if (empty($lastName)) $errors[] = 'Last name is required.';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';
if (empty($phone)) $errors[] = 'Phone number is required.';
if (!isStrongPassword($password)) $errors[] = 'Password must be at least 8 characters and include an uppercase letter, a number, and a special character.';
if ($password !== $confirmPassword) $errors[] = 'Passwords do not match.';
if (!$agreeTerms) $errors[] = 'You must agree to the Terms & Conditions.';

if (!empty($errors)) {
    setFlash('error', implode(' ', $errors));
    redirect('/signup.php');
}

try {
    $db = getDB();

    // Check if email already exists
    $stmt = $db->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    if ($stmt->fetch()) {
        setFlash('error', 'An account with this email already exists.');
        redirect('/signup.php');
    }

    // Hash password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Generate email verification token
    $verificationToken = bin2hex(random_bytes(32));

    // Insert user
    $stmt = $db->prepare(
        "INSERT INTO users (first_name, last_name, email, phone, password_hash, email_verification_token)
         VALUES (:first_name, :last_name, :email, :phone, :password_hash, :token)"
    );
    $stmt->execute([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'phone' => $phone,
        'password_hash' => $passwordHash,
        'token' => $verificationToken,
    ]);

    // Send verification email
    $emailSent = sendVerificationEmail($email, $firstName, $verificationToken);

    if ($emailSent) {
        setFlash('success', 'Account created successfully! Please check your email to verify your account.');
    } else {
        setFlash('error', 'Account created, but we could not send the verification email. Please request a new verification email.');
    }

    redirect('/verify-email.php?email=' . urlencode($email));

} catch (PDOException $e) {
    error_log("Signup error: " . $e->getMessage());
    setFlash('error', 'An error occurred during registration. Please try again later.');
    redirect('/signup.php');
}
