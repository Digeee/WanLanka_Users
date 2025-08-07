<!DOCTYPE html>
<html>
<head>
    <title>OTP for Password Reset</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f9ff; padding: 30px; margin: 0; color: #333;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        <h2 style="color: #0072ff; margin-bottom: 20px;">Wan Lanka - Password Reset OTP</h2>

        <p style="font-size: 16px;">Hello,</p>

        <p style="font-size: 16px; line-height: 1.6;">
            Your OTP code for resetting your <strong>Wan Lanka</strong> password is:
        </p>

        <div style="text-align: center; margin: 30px 0;">
            <h1 style="background-color: #0072ff; color: white; display: inline-block; padding: 12px 25px; border-radius: 8px; font-size: 32px; letter-spacing: 4px;">
                {{ $otp }}
            </h1>
        </div>

        <p style="font-size: 15px; color: #555;">
            This code will expire in <strong>10 minutes</strong>. Please do not share it with anyone.
        </p>

        <p style="margin-top: 30px; font-size: 15px;">Thank you,<br><strong>Wan Lanka Team</strong></p>
    </div>
</body>
</html>
