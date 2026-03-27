<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'beepbeep_driving');

// Create database connection
function getDbConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8mb4");
    return $conn;
}

// Site configuration
define('SITE_NAME', 'Beep Beep Driving School');
define('SITE_URL', 'http://localhost/beepbeep/');
define('ADMIN_EMAIL', 'admin@beepbeepdriving.co.uk');
define('PHONE_NUMBER', '01234 567 890');
define('ADDRESS', '123 Driving Street, London, UK');
