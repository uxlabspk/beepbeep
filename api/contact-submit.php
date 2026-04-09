<?php
/**
 * Contact Form API Endpoint
 * Handles AJAX contact form submissions.
 */

session_start();
require_once dirname(__DIR__) . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';
require_once DATABASE_PATH . '/db.php';

header('Content-Type: application/json');

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Validate CSRF token
if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Invalid CSRF token']);
    exit;
}

// Collect and sanitize input
$data = [
    'firstName' => sanitize($_POST['firstName'] ?? ''),
    'lastName' => sanitize($_POST['lastName'] ?? ''),
    'email' => sanitize($_POST['email'] ?? ''),
    'phone' => formatPhone($_POST['phone'] ?? ''),
    'service' => sanitize($_POST['service'] ?? ''),
    'instructor' => sanitize($_POST['instructor'] ?? ''),
    'message' => sanitize($_POST['message'] ?? ''),
];

// Validation
$errors = [];
if (empty($data['firstName'])) $errors[] = 'First name is required';
if (empty($data['lastName'])) $errors[] = 'Last name is required';
if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required';
if (empty($data['phone'])) $errors[] = 'Phone number is required';
if (empty($data['message'])) $errors[] = 'Message is required';

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

try {
    $db = getDB();

    // Save to database
    $stmt = $db->prepare(
        "INSERT INTO contact_submissions (first_name, last_name, email, phone, service, instructor_preference, message)
         VALUES (:first_name, :last_name, :email, :phone, :service, :instructor, :message)"
    );
    $stmt->execute([
        'first_name' => $data['firstName'],
        'last_name' => $data['lastName'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'service' => $data['service'],
        'instructor' => $data['instructor'],
        'message' => $data['message'],
    ]);

    // TODO: Send email notification to admin
    // TODO: Send confirmation email to user

    echo json_encode(['success' => true, 'message' => 'Message sent successfully! We\'ll get back to you within 24 hours.']);

} catch (PDOException $e) {
    error_log("Contact form error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'An error occurred. Please try again later.']);
}
