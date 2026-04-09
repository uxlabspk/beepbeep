-- Beep Beep Driving School Database Schema
-- Run this SQL to create the initial database structure.
-- CREATE DATABASE beepbeep_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- USE beepbeep_db;

-- --------------------------------------------
-- USERS TABLE
-- --------------------------------------------
CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('student', 'instructor', 'admin') DEFAULT 'student',
    email_verified TINYINT(1) DEFAULT 0,
    email_verification_token VARCHAR(255) DEFAULT NULL,
    password_reset_token VARCHAR(255) DEFAULT NULL,
    password_reset_expires DATETIME DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_role (role)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------
-- INSTRUCTORS TABLE
-- --------------------------------------------
CREATE TABLE IF NOT EXISTS instructors (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    ad_number VARCHAR(50) UNIQUE COMMENT 'ADI/ADI registration number',
    bio TEXT,
    specialties JSON COMMENT 'e.g. ["beginner","refresher","intensive"]',
    rating DECIMAL(2,1) DEFAULT 0.0,
    total_reviews INT UNSIGNED DEFAULT 0,
    years_experience INT UNSIGNED DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_active (is_active)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------
-- COURSES TABLE
-- --------------------------------------------
CREATE TABLE IF NOT EXISTS courses (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    level ENUM('beginner','intermediate','advanced') DEFAULT 'beginner',
    transmission ENUM('manual','automatic','either') DEFAULT 'either',
    min_hours DECIMAL(4,1) DEFAULT 10.0,
    price_per_lesson DECIMAL(8,2) NOT NULL,
    package_price DECIMAL(8,2) DEFAULT NULL,
    package_hours INT UNSIGNED DEFAULT NULL,
    is_active TINYINT(1) DEFAULT 1,
    sort_order INT UNSIGNED DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_slug (slug),
    INDEX idx_active (is_active)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------
-- BOOKINGS TABLE
-- --------------------------------------------
CREATE TABLE IF NOT EXISTS bookings (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    instructor_id INT UNSIGNED DEFAULT NULL,
    course_id INT UNSIGNED DEFAULT NULL,
    booking_type ENUM('single_lesson','package','intensive') DEFAULT 'single_lesson',
    status ENUM('pending','confirmed','completed','cancelled','no_show') DEFAULT 'pending',
    lesson_date DATE DEFAULT NULL,
    start_time TIME DEFAULT NULL,
    duration_minutes INT UNSIGNED DEFAULT 60,
    pickup_location VARCHAR(255) DEFAULT NULL,
    notes TEXT,
    total_amount DECIMAL(8,2) DEFAULT 0.00,
    amount_paid DECIMAL(8,2) DEFAULT 0.00,
    payment_status ENUM('unpaid','partial','paid','refunded') DEFAULT 'unpaid',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (instructor_id) REFERENCES instructors(id) ON DELETE SET NULL,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE SET NULL,
    INDEX idx_user (user_id),
    INDEX idx_status (status),
    INDEX idx_lesson_date (lesson_date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------
-- LESSON PROGRESS (for tracking skills)
-- --------------------------------------------
CREATE TABLE IF NOT EXISTS lesson_progress (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    instructor_id INT UNSIGNED DEFAULT NULL,
    booking_id INT UNSIGNED DEFAULT NULL,
    lesson_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    duration_minutes INT UNSIGNED DEFAULT 60,
    skills_covered JSON COMMENT 'List of skills practised',
    notes TEXT,
    readiness_score TINYINT UNSIGNED DEFAULT NULL COMMENT '1-10 instructor assessment',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (instructor_id) REFERENCES instructors(id) ON DELETE SET NULL,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE SET NULL,
    INDEX idx_user (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------
-- CONTACT FORM SUBMISSIONS
-- --------------------------------------------
CREATE TABLE IF NOT EXISTS contact_submissions (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    service VARCHAR(50) DEFAULT NULL,
    instructor_preference VARCHAR(50) DEFAULT NULL,
    message TEXT NOT NULL,
    status ENUM('new','read','replied','archived') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_status (status),
    INDEX idx_created (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------
-- TESTIMONIALS / REVIEWS
-- --------------------------------------------
CREATE TABLE IF NOT EXISTS testimonials (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED DEFAULT NULL,
    instructor_id INT UNSIGNED DEFAULT NULL,
    student_name VARCHAR(100) NOT NULL,
    rating TINYINT UNSIGNED NOT NULL CHECK (rating BETWEEN 1 AND 5),
    testimonial TEXT NOT NULL,
    is_approved TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (instructor_id) REFERENCES instructors(id) ON DELETE SET NULL,
    INDEX idx_approved (is_approved)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------
-- PAYMENTS TABLE
-- --------------------------------------------
CREATE TABLE IF NOT EXISTS payments (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    booking_id INT UNSIGNED DEFAULT NULL,
    amount DECIMAL(8,2) NOT NULL,
    method ENUM('cash','card','bank_transfer','online') DEFAULT 'cash',
    status ENUM('pending','completed','failed','refunded') DEFAULT 'pending',
    transaction_reference VARCHAR(100) DEFAULT NULL,
    notes TEXT,
    paid_at DATETIME DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE SET NULL,
    INDEX idx_user (user_id),
    INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------
-- SEED DATA - Courses
-- --------------------------------------------
INSERT INTO courses (name, slug, description, level, transmission, min_hours, price_per_lesson, package_price, package_hours, sort_order) VALUES
('Beginner Driving Lessons', 'beginner-lessons', 'Perfect for complete beginners. Start from scratch with patient, professional instruction.', 'beginner', 'either', 20.0, 35.00, 350.00, 10, 1),
('Refresher Course', 'refresher-course', 'Already have your license but need to regain confidence? Brush up on your skills.', 'intermediate', 'either', 10.0, 35.00, 165.00, 5, 2),
('Test Preparation', 'test-preparation', 'Intensive preparation for your DVSA practical driving test with mock tests included.', 'advanced', 'either', 10.0, 40.00, 650.00, 20, 3),
('Intensive 1 Week', 'intensive-1-week', 'Fast-track your learning with an intensive one-week course designed to get you test-ready quickly.', 'beginner', 'either', 30.0, NULL, 1450.00, 30, 4),
('Intensive 2 Weeks', 'intensive-2-weeks', 'A two-week intensive programme covering all aspects of driving for rapid progression.', 'beginner', 'either', 40.0, NULL, 1950.00, 40, 5);
