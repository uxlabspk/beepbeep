<?php
/**
 * Authentication Middleware
 * Include this at the top of protected pages to require login.
 * 
 * Usage:
 *   require_once __DIR__ . '/../auth/middleware.php';
 * 
 * Or for admin-only pages:
 *   require_once __DIR__ . '/../auth/middleware.php';
 *   requireAdmin();
 */

session_start();
require_once dirname(__DIR__) . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';

/**
 * Require user to be logged in.
 * Redirects to login if not authenticated.
 */
function requireAuth() {
    if (!isLoggedIn()) {
        setFlash('error', 'Please log in to access this page.');
        redirect('/login.php');
    }
}

/**
 * Require user to be an admin.
 * Redirects to dashboard if not admin.
 */
function requireAdmin() {
    requireAuth();
    if (currentUser()['role'] !== 'admin') {
        setFlash('error', 'You do not have permission to access this page.');
        redirect('/dashboard.php');
    }
}

/**
 * Require user to be an instructor.
 * Redirects to dashboard if not instructor or admin.
 */
function requireInstructor() {
    requireAuth();
    $role = currentUser()['role'];
    if ($role !== 'instructor' && $role !== 'admin') {
        setFlash('error', 'You do not have permission to access this page.');
        redirect('/dashboard.php');
    }
}

/**
 * Redirect if already logged in.
 * Use on login/signup pages to prevent double-authenticated access.
 */
function redirectIfAuth() {
    if (isLoggedIn()) {
        redirect('/dashboard.php');
    }
}
