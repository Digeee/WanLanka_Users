<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Wan Lanka OTP Code</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 20px;
            line-height: 1.6;
            color: #333;
        }
        
        /* Email container */
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
        
        /* Header section */
        .header {
            background: linear-gradient(135deg, #1a3a8f 0%, #4a90e2 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }
        
        .logo {
            margin-bottom: 15px;
        }
        
        .logo img {
            max-width: 150px;
            height: auto;
        }
        
        .header h1 {
            font-size: 24px;
            font-weight: 600;
            margin: 10px 0;
        }
        
        /* Content section */
        .content {
            padding: 40px 30px;
        }
        
        .greeting {
            font-size: 18px;
            margin-bottom: 20px;
            color: #444;
        }
        
        .message {
            font-size: 16px;
            margin-bottom: 30px;
            color: #555;
            line-height: 1.7;
        }
        
        /* OTP box */
        .otp-container {
            margin: 30px 0;
            text-align: center;
        }
        
        .otp-label {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .otp-box {
            display: inline-block;
            padding: 18px 30px;
            background: linear-gradient(135deg, #4a90e2 0%, #1a3a8f 100%);
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 6px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.3);
            margin: 10px 0;
        }
        
        /* Instructions */
        .instructions {
            background: #f8f9fa;
            border-left: 4px solid #4a90e2;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 30px 0;
        }
        
        .instructions p {
            margin-bottom: 10px;
            font-size: 14px;
            color: #555;
        }
        
        .instructions strong {
            color: #1a3a8f;
        }
        
        /* Footer */
        .footer {
            padding: 25px 30px;
            background: #f5f7fa;
            text-align: center;
            border-top: 1px solid #eaeaea;
            color: #777;
            font-size: 13px;
        }
        
        .footer p {
            margin-bottom: 10px;
        }
        
        .company-info {
            margin-top: 15px;
            font-size: 12px;
            color: #999;
        }
        
        /* Responsive adjustments */
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            
            .email-container {
                margin: 20px auto;
            }
            
            .header {
                padding: 20px;
            }
            
            .content {
                padding: 30px 20px;
            }
            
            .otp-box {
                font-size: 24px;
                padding: 15px 25px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="header">
            <div class="logo">
                <!-- Replace with your company logo -->
                <img src="{{ asset('images/logo.png') }}" alt="WanLanka Logo">
            </div>
            <h1>Guider Login Verification</h1>
        </div>
        
        <!-- Content Section -->
        <div class="content">
            <p class="greeting">Hello,</p>
            
            <p class="message">
                You've requested to log in to your WanLanka account. To complete your login, 
                please use the following One-Time Password (OTP) to verify your identity.
            </p>
            
            <div class="otp-container">
                <div class="otp-label">Your Verification Code</div>
                <div class="otp-box">{{ $otp }}</div>
            </div>
            
            <div class="instructions">
                <p>This OTP is valid for <strong>5 minutes</strong>.</p>
                <p>For security reasons, please do not share this code with anyone.</p>
                <p>If you did not request this verification, please ignore this email or contact our support team.</p>
            </div>
            
            <p class="message">
                Thank you for choosing WanLanka.
            </p>
        </div>
        
        <!-- Footer Section -->
        <div class="footer">
            <p>© {{ date('Y') }} WanLanka. All rights reserved.</p>
            <div class="company-info">
                WanLanka Company | support@wanlanka.com | +94 11 123 4567
            </div>
        </div>
    </div>
</body>
</html>