<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Beep Beep Driving School</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background: #FF6B00; padding: 30px; text-align: center; border-radius: 8px 8px 0 0;">
        <h1 style="color: white; margin: 0;">Booking Confirmed! 🎉</h1>
    </div>
    
    <div style="background: white; padding: 30px; border: 1px solid #e0e0e0; border-top: none;">
        <p>Hi <?php echo $firstName; ?>,</p>
        
        <p>Great news! Your driving lesson booking has been confirmed.</p>
        
        <div style="background: #f9f9f9; padding: 20px; border-radius: 5px; margin: 20px 0;">
            <h3 style="margin-top: 0; color: #FF6B00;">Booking Details</h3>
            <p><strong>Booking Reference:</strong> #<?php echo $bookingId; ?></p>
            <p><strong>Service:</strong> <?php echo $serviceType; ?></p>
            <p><strong>Instructor:</strong> <?php echo $instructorName; ?></p>
            <p><strong>Start Date:</strong> <?php echo $startDate; ?></p>
            <p><strong>Pick-up Location:</strong> <?php echo $location; ?></p>
            <p><strong>Amount:</strong> £<?php echo number_format($amount, 2); ?></p>
        </div>
        
        <p>We'll be in touch closer to your lesson date with further details.</p>
        
        <p>If you need to reschedule or have any questions, please don't hesitate to contact us.</p>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="<?php echo $dashboardUrl; ?>" 
               style="background: #FF6B00; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
                View My Dashboard
            </a>
        </div>
        
        <hr style="border: none; border-top: 1px solid #e0e0e0; margin: 30px 0;">
        
        <p style="color: #666; font-size: 14px;">
            Questions? Contact us at:<br>
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
