<?php
/**
 * Booking Form API Endpoint
 * Handles AJAX booking form submissions.
 */

require_once dirname(__DIR__) . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';
require_once DATABASE_PATH . '/db.php';

initSession();

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
    'dob' => sanitize($_POST['dob'] ?? ''),
    'address' => sanitize($_POST['address'] ?? ''),
    'licenseStatus' => sanitize($_POST['licenseStatus'] ?? ''),
    'licenseNumber' => sanitize($_POST['licenseNumber'] ?? ''),
    'serviceType' => sanitize($_POST['serviceType'] ?? ''),
    'transmission' => sanitize($_POST['transmission'] ?? ''),
    'experience' => sanitize($_POST['experience'] ?? ''),
    'instructor' => sanitize($_POST['instructor'] ?? ''),
    'location' => sanitize($_POST['location'] ?? ''),
    'availability' => $_POST['availability'] ?? [], // array
    'startDate' => sanitize($_POST['startDate'] ?? ''),
    'message' => sanitize($_POST['message'] ?? ''),
    'hearing' => sanitize($_POST['hearing'] ?? ''),
];

// Validation
$errors = [];
if (empty($data['firstName'])) $errors[] = 'First name is required';
if (empty($data['lastName'])) $errors[] = 'Last name is required';
if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required';
if (empty($data['phone'])) $errors[] = 'Phone number is required';
if (empty($data['dob'])) $errors[] = 'Date of birth is required';
if (empty($data['serviceType'])) $errors[] = 'Service type is required';
if (empty($data['transmission'])) $errors[] = 'Transmission type is required';
if (empty($data['experience'])) $errors[] = 'Experience level is required';
if (empty($data['location'])) $errors[] = 'Pick-up location is required';
if (empty($data['startDate'])) $errors[] = 'Preferred start date is required';

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

try {
    $db = getDB();

    // Check if user exists by email
    $stmt = $db->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $data['email']]);
    $existingUser = $stmt->fetch();

    $userId = $existingUser['id'] ?? null;

    // If no account, create one with a temporary password
    if (!$userId) {
        $tempPassword = bin2hex(random_bytes(16));
        $passwordHash = password_hash($tempPassword, PASSWORD_DEFAULT);
        $verificationToken = bin2hex(random_bytes(32));

        $stmt = $db->prepare(
            "INSERT INTO users (first_name, last_name, email, phone, password_hash, email_verification_token)
             VALUES (:first_name, :last_name, :email, :phone, :password_hash, :token)"
        );
        $stmt->execute([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password_hash' => $passwordHash,
            'token' => $verificationToken,
        ]);
        $userId = $db->lastInsertId();

        // TODO: Send account credentials email
    }

    // Find instructor ID if specified
    $instructorId = null;
    if (!empty($data['instructor'])) {
        $stmt = $db->prepare("SELECT id FROM instructors WHERE user_id = (SELECT id FROM users WHERE email LIKE :instructor) LIMIT 1");
        // This is a simplification - you'd map instructor names to IDs properly
        $instructorMap = [
            'max' => 1,
            'jenifer' => 2,
            'henry' => 3,
        ];
        $instructorId = $instructorMap[$data['instructor']] ?? null;
    }

    // Create booking
    $stmt = $db->prepare(
        "INSERT INTO bookings (user_id, instructor_id, booking_type, status, pickup_location, notes)
         VALUES (:user_id, :instructor_id, :booking_type, 'pending', :location, :notes)"
    );
    $stmt->execute([
        'user_id' => $userId,
        'instructor_id' => $instructorId,
        'booking_type' => $data['serviceType'],
        'location' => $data['location'],
        'notes' => "Experience: {$data['experience']}, Transmission: {$data['transmission']}, Availability: " . implode(', ', $data['availability']) . ", Start Date: {$data['startDate']}, Message: {$data['message']}",
    ]);

    // TODO: Send booking confirmation email

    echo json_encode([
        'success' => true,
        'message' => 'Booking request submitted successfully! We\'ll confirm your lesson within 24 hours.',
        'bookingId' => $db->lastInsertId(),
    ]);

} catch (PDOException $e) {
    error_log("Booking error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'An error occurred. Please try again later.']);
}
