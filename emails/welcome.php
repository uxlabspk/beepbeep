<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Beep Beep Driving School</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background: #FF6B00; padding: 30px; text-align: center; border-radius: 8px 8px 0 0;">
        <h1 style="color: white; margin: 0;">Welcome to Beep Beep! 🚗</h1>
    </div>
    
    <div style="background: white; padding: 30px; border: 1px solid #e0e0e0; border-top: none;">
        <p>Hi <?php echo $firstName; ?>,</p>
        
        <p>Thank you for signing up with <strong>Beep Beep Driving School</strong>! We're excited to help you on your journey to becoming a confident, safe driver.</p>
        
        <p style="background: #f5f5f5; padding: 15px; border-left: 4px solid #FF6B00;">
            <strong>Your account details:</strong><br>
            Email: <?php echo $email; ?><br>
        </p>
        
        <p>To verify your email address, please click the link below:</p>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="<?php echo $verificationUrl; ?>" 
               style="background: #FF6B00; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
                Verify My Email
            </a>
        </div>
        
        <p>If the button doesn't work, copy and paste this link into your browser:</p>
        <p style="word-break: break-all; color: #666; font-size: 14px;"><?php echo $verificationUrl; ?></p>
        
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
