<?php
/**
 * Helper Functions
 * Common utility functions used across the site.
 */

/**
 * Initialize session with secure cookie settings.
 */
function initSession() {
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    $isSecure = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';

    if (defined('SESSION_COOKIE_NAME')) {
        session_name(SESSION_COOKIE_NAME);
    }

    session_set_cookie_params([
        'lifetime' => SESSION_LIFETIME,
        'path' => '/',
        'domain' => '',
        'secure' => $isSecure,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);

    session_start();

    // Refresh cookie expiry for active sessions
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), session_id(), [
            'expires' => time() + SESSION_LIFETIME,
            'path' => '/',
            'domain' => '',
            'secure' => $isSecure,
            'httponly' => true,
            'samesite' => 'Lax',
        ]);
    }
}

/**
 * Safely echo a variable
 */
function e($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Redirect to a URL
 */
function redirect($url, $statusCode = 303) {
    header('Location: ' . $url, true, $statusCode);
    exit;
}

/**
 * Set a flash message (stored in session)
 */
function setFlash($type, $message) {
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

/**
 * Get and clear the flash message
 */
function getFlash() {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}



/**
 * Generate a CSRF token
 */
function generateCsrfToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify a CSRF token
 */
function verifyCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Build full URL from local path.
 */
function buildUrl($path = '') {
    return rtrim(SITE_URL, '/') . '/' . ltrim($path, '/');
}

/**
 * Render a PHP email template into HTML.
 */
function renderEmailTemplate($templateFile, array $data = []) {
    if (!file_exists($templateFile)) {
        return null;
    }

    extract($data, EXTR_SKIP);
    ob_start();
    require $templateFile;
    return ob_get_clean();
}

/**
 * Remove header-breaking characters from email header values.
 */
function sanitizeEmailHeader($value) {
    return trim(str_replace(["\r", "\n"], '', (string) $value));
}

/**
 * Encode header values that may contain non-ASCII characters.
 */
function encodeEmailHeader($value) {
    $value = sanitizeEmailHeader($value);
    if ($value === '') {
        return '';
    }

    return preg_match('/[^\x20-\x7E]/', $value)
        ? '=?UTF-8?B?' . base64_encode($value) . '?='
        : $value;
}

/**
 * Read SMTP response (supports multi-line replies).
 */
function smtpReadResponse($socket) {
    $response = '';

    while (($line = fgets($socket, 515)) !== false) {
        $response .= $line;

        if (preg_match('/^\d{3}\s/', $line)) {
            break;
        }
    }

    return $response;
}

/**
 * Send SMTP command and validate response code.
 */
function smtpSendCommand($socket, $command, array $expectedCodes) {
    if ($command !== null) {
        fwrite($socket, $command . "\r\n");
    }

    $response = smtpReadResponse($socket);
    $code = (int) substr($response, 0, 3);

    if (!in_array($code, $expectedCodes, true)) {
        throw new RuntimeException('SMTP command failed: ' . trim($response));
    }

    return $response;
}

/**
 * Send HTML email through SMTP when configured.
 */
function sendHtmlEmailViaSmtp($to, $subject, $htmlContent, $fromEmail, $fromName, $replyTo) {
    if (empty(SMTP_HOST)) {
        throw new RuntimeException('SMTP host is not configured.');
    }

    $port = SMTP_PORT > 0 ? SMTP_PORT : 587;
    $connectHost = SMTP_ENCRYPTION === 'ssl' ? 'ssl://' . SMTP_HOST : SMTP_HOST;
    $socket = @stream_socket_client($connectHost . ':' . $port, $errno, $errstr, 15, STREAM_CLIENT_CONNECT);

    if (!$socket) {
        throw new RuntimeException('SMTP connection failed: ' . $errstr . ' (' . $errno . ')');
    }

    stream_set_timeout($socket, 15);

    try {
        smtpSendCommand($socket, null, [220]);

        $ehloHost = sanitizeEmailHeader($_SERVER['SERVER_NAME'] ?? 'localhost');
        smtpSendCommand($socket, 'EHLO ' . $ehloHost, [250]);

        if (SMTP_ENCRYPTION === 'tls') {
            smtpSendCommand($socket, 'STARTTLS', [220]);

            $tlsEnabled = stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
            if ($tlsEnabled !== true) {
                throw new RuntimeException('SMTP STARTTLS negotiation failed.');
            }

            smtpSendCommand($socket, 'EHLO ' . $ehloHost, [250]);
        }

        if (SMTP_AUTH) {
            if (SMTP_USERNAME === '' || SMTP_PASSWORD === '') {
                throw new RuntimeException('SMTP auth is enabled but credentials are missing.');
            }

            smtpSendCommand($socket, 'AUTH LOGIN', [334]);
            smtpSendCommand($socket, base64_encode(SMTP_USERNAME), [334]);
            smtpSendCommand($socket, base64_encode(SMTP_PASSWORD), [235]);
        }

        smtpSendCommand($socket, 'MAIL FROM:<' . $fromEmail . '>', [250]);
        smtpSendCommand($socket, 'RCPT TO:<' . $to . '>', [250, 251]);
        smtpSendCommand($socket, 'DATA', [354]);

        $encodedSubject = encodeEmailHeader($subject);
        $encodedFromName = encodeEmailHeader($fromName);

        $payload = [
            'Date: ' . date(DATE_RFC2822),
            'From: ' . $encodedFromName . ' <' . $fromEmail . '>',
            'To: <' . $to . '>',
            'Reply-To: <' . $replyTo . '>',
            'Subject: ' . $encodedSubject,
            'MIME-Version: 1.0',
            'Content-Type: text/html; charset=UTF-8',
            'Content-Transfer-Encoding: 8bit',
            '',
            $htmlContent,
        ];

        $message = implode("\r\n", $payload);
        $message = preg_replace('/^\./m', '..', $message);

        fwrite($socket, $message . "\r\n.\r\n");
        smtpSendCommand($socket, null, [250]);
        smtpSendCommand($socket, 'QUIT', [221]);

        return true;
    } finally {
        if (is_resource($socket)) {
            fclose($socket);
        }
    }
}

/**
 * Send HTML email using PHP mail().
 */
function sendHtmlEmailViaMail($to, $subject, $htmlContent, $fromEmail, $fromName, $replyTo) {
    $encodedSubject = encodeEmailHeader($subject);
    $encodedFromName = encodeEmailHeader($fromName);

    $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=UTF-8',
        'From: ' . $encodedFromName . ' <' . $fromEmail . '>',
        'Reply-To: ' . $replyTo,
        'Return-Path: ' . $fromEmail,
        'X-Mailer: PHP/' . phpversion(),
    ];

    $mailError = null;
    set_error_handler(function ($severity, $message) use (&$mailError) {
        $mailError = $message;
        return true;
    });

    $sent = mail($to, $encodedSubject, $htmlContent, implode("\r\n", $headers), '-f' . $fromEmail);
    restore_error_handler();

    if (!$sent) {
        error_log('mail() failed to send email.' . ($mailError ? ' ' . $mailError : ''));
    }

    return $sent;
}

/**
 * Send HTML email using configured transport (SMTP or PHP mail()).
 */
function sendHtmlEmail($to, $subject, $htmlContent) {
    $to = sanitizeEmailHeader($to);
    $fromEmail = sanitizeEmailHeader(MAIL_FROM_EMAIL);
    $fromName = sanitizeEmailHeader(MAIL_FROM_NAME);
    $replyTo = sanitizeEmailHeader(MAIL_REPLY_TO);

    if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
        error_log('Email send aborted: invalid recipient address.');
        return false;
    }

    if (!filter_var($fromEmail, FILTER_VALIDATE_EMAIL)) {
        error_log('Email send aborted: invalid MAIL_FROM_EMAIL configuration.');
        return false;
    }

    if (!filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
        $replyTo = $fromEmail;
    }

    if (MAIL_TRANSPORT === 'smtp') {
        try {
            return sendHtmlEmailViaSmtp($to, $subject, $htmlContent, $fromEmail, $fromName, $replyTo);
        } catch (Throwable $e) {
            error_log('SMTP send failed, falling back to mail(): ' . $e->getMessage());
        }
    }

    return sendHtmlEmailViaMail($to, $subject, $htmlContent, $fromEmail, $fromName, $replyTo);
}

/**
 * Send verification email to user.
 */
function sendVerificationEmail($email, $firstName, $token) {
    $verificationUrl = buildUrl('auth/verify-email-handler.php?token=' . urlencode($token));
    $template = ROOT_PATH . '/emails/welcome.php';

    $html = renderEmailTemplate($template, [
        'firstName' => $firstName,
        'email' => $email,
        'verificationUrl' => $verificationUrl,
    ]);

    if ($html === null) {
        return false;
    }

    return sendHtmlEmail($email, 'Verify Your Email - ' . SITE_NAME, $html);
}

/**
 * Send password reset email to user.
 */
function sendPasswordResetEmail($email, $firstName, $token) {
    $resetUrl = buildUrl('change-password.php?token=' . urlencode($token));
    $template = ROOT_PATH . '/emails/password-reset.php';

    $html = renderEmailTemplate($template, [
        'firstName' => $firstName,
        'resetUrl' => $resetUrl,
    ]);

    if ($html === null) {
        return false;
    }

    return sendHtmlEmail($email, 'Reset Your Password - ' . SITE_NAME, $html);
}

/**
 * Validate password complexity.
 */
function isStrongPassword($password) {
    return strlen($password) >= 8
        && preg_match('/[A-Z]/', $password)
        && preg_match('/[0-9]/', $password)
        && preg_match('/[^a-zA-Z0-9]/', $password);
}

/**
 * Sanitize input string
 */
function sanitize($input) {
    return trim(strip_tags(stripslashes($input)));
}

/**
 * Format a UK phone number
 */
function formatPhone($phone) {
    return preg_replace('/[^0-9+]/', '', $phone);
}

/**
 * Format a UK postcode
 */
function formatPostcode($postcode) {
    return strtoupper(trim($postcode));
}

/**
 * Calculate age from date of birth
 */
function calculateAge($dob) {
    $birthDate = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($birthDate);
    return $age->y;
}
