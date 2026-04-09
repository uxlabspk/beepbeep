<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password - Beep Beep Driving School</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background: #FF6B00; padding: 30px; text-align: center; border-radius: 8px 8px 0 0;">
        <h1 style="color: white; margin: 0;">Reset Your Password 🔐</h1>
    </div>
    
    <div style="background: white; padding: 30px; border: 1px solid #e0e0e0; border-top: none;">
        <p>Hi <?php echo $firstName; ?>,</p>
        
        <p>We received a request to reset your password. Click the button below to create a new password:</p>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="<?php echo $resetUrl; ?>" 
               style="background: #FF6B00; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
                Reset My Password
            </a>
        </div>
        
        <p>If the button doesn't work, copy and paste this link into your browser:</p>
        <p style="word-break: break-all; color: #666; font-size: 14px;"><?php echo $resetUrl; ?></p>
        
        <div style="background: #fff3cd; padding: 15px; border-left: 4px solid #ffc107; margin: 20px 0;">
            <strong>⚠️ Security Notice:</strong> This link will expire in 1 hour. If you didn't request a password reset, please ignore this email or contact support.
        </div>
        
        <hr style="border: none; border-top: 1px solid #e0e0e0; margin: 30px 0;">
        
        <p style="color: #666; font-size: 14px;">
            Need help? Contact us at:<br>
            📞 01234 567 890<br>
            ✉️ info@beepbeepdriving.co.uk
        </p>
    </div>
    
    <div style="background: #f5f5f5; padding: 20px; text-align: center; border-radius: 0 0 8px 8px; font-size: 12px; color: #666;">
        <p>© 2026 Beep Beep Driving School. All rights reserved.</p>
        <p>123 High Street, Manchester, M1 1AA</p>
    </div>
</body>
</html>
