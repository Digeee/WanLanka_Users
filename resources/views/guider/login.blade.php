<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guider Login - WanLanka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #1a3a8f;
            --primary-light: #4a90e2;
            --secondary: #f8f9fa;
            --accent: #00b894;
            --text: #333;
            --text-light: #6c757d;
            --border: #e0e6ef;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --radius: 12px;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #f2f6ff 0%, #e6eeff 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: var(--text);
        }
        
        /* Header Styles */
        .main-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        /* Main Content Area */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
        
        .login-container {
            width: 100%;
            max-width: 420px;
        }
        
        .login-card {
            background: #fff;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(30deg);
        }
        
        .logo {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            position: relative;
            z-index: 2;
        }
        
        .logo i {
            font-size: 36px;
        }
        
        .card-header h2 {
            font-weight: 600;
            margin-bottom: 5px;
            position: relative;
            z-index: 2;
        }
        
        .card-header p {
            opacity: 0.9;
            font-size: 14px;
            position: relative;
            z-index: 2;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--text);
            display: flex;
            align-items: center;
        }
        
        .form-label i {
            margin-right: 8px;
            color: var(--primary-light);
        }
        
        .form-control {
            border: 2px solid var(--border);
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 15px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 40px;
            color: var(--text-light);
        }
        
        .btn-login {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            border: none;
            color: white;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            width: 100%;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.4);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .otp-info {
            background: #f0f7ff;
            border-left: 4px solid var(--primary-light);
            padding: 12px 15px;
            border-radius: 4px;
            margin: 20px 0;
            font-size: 14px;
            display: flex;
            align-items: center;
        }
        
        .otp-info i {
            color: var(--primary-light);
            margin-right: 10px;
            font-size: 16px;
        }
        
        .error-message {
            background: #ffe6e6;
            color: #d63031;
            padding: 10px 15px;
            border-radius: 6px;
            margin: 15px 0;
            font-size: 14px;
            display: flex;
            align-items: center;
        }
        
        .error-message i {
            margin-right: 8px;
        }
        
        .success-message {
            background: #e6f7ee;
            color: #00b894;
            padding: 10px 15px;
            border-radius: 6px;
            margin: 15px 0;
            font-size: 14px;
            display: flex;
            align-items: center;
        }
        
        .success-message i {
            margin-right: 8px;
        }
        
        .step-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
        }
        
        .step {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin: 0 10px;
            position: relative;
        }
        
        .step.active {
            background: var(--primary);
            color: white;
        }
        
        .step.inactive {
            background: var(--border);
            color: var(--text-light);
        }
        
        .step-line {
            position: absolute;
            height: 2px;
            width: 40px;
            background: var(--border);
            top: 50%;
            right: -40px;
        }
        
        .step:last-child .step-line {
            display: none;
        }
        
        .step-label {
            position: absolute;
            top: 35px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            font-size: 12px;
            color: var(--text-light);
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            color: var(--primary-light);
            font-size: 14px;
            margin-top: 15px;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .back-link:hover {
            color: var(--primary);
        }
        
        .back-link i {
            margin-right: 5px;
        }
        
        /* Footer Styles */
        .main-footer {
            background: #1a1f36;
            color: #a0a7b8;
            padding: 30px 0 20px;
        }
        
        @media (max-width: 480px) {
            .card-body {
                padding: 25px 20px;
            }
            
            .card-header {
                padding: 25px 15px;
            }
            
            .main-content {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Include -->
    @include('include.header')
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="login-container">
            <div class="login-card">
                <div class="card-header">
                    <div class="logo">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h2>Guider Login</h2>
                    <p>Secure access to your account</p>
                </div>
                
                <div class="card-body">
                    <!-- Step Indicator -->
                    <div class="step-indicator">
                        <div class="step {{ !session('otp_sent') ? 'active' : 'inactive' }}">
                            1
                            <div class="step-line"></div>
                            <span class="step-label">Email</span>
                        </div>
                        <div class="step {{ session('otp_sent') ? 'active' : 'inactive' }}">
                            2
                            <span class="step-label">OTP</span>
                        </div>
                    </div>
                    
                    <!-- Error Message -->
                    @if(session('error'))
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="success-message">
                            <i class="fas fa-check-circle"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if(session('otp_sent') && !session('success'))
                        <div class="success-message">
                            <i class="fas fa-check-circle"></i>
                            Verification code sent to your email.
                        </div>
                    @endif
                    
                    <!-- Step 1: Enter Email -->
                    @if(!session('otp_sent'))
                        <form action="{{ route('guider.sendOtp') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="email">
                                    <i class="fas fa-envelope"></i>Email Address
                                </label>
                                <input type="email" name="email" id="email" class="form-control" 
                                       placeholder="Enter your registered email" value="{{ old('email') }}" required>
                                <div class="input-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                @error('email') 
                                    <div class="error-message mt-2">
                                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                    </div> 
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn-login">
                                <i class="fas fa-paper-plane me-2"></i>Send OTP
                            </button>
                        </form>
                    @endif
                    
                    <!-- Step 2: Enter OTP -->
                    @if(session('otp_sent'))
                        <div class="otp-info">
                            <i class="fas fa-info-circle"></i>
                            We've sent a 6-digit verification code to your email. It will expire in 5 minutes.
                        </div>
                        
                        <form action="{{ route('guider.verifyOtp') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="otp">
                                    <i class="fas fa-key"></i>Verification Code
                                </label>
                                <input type="text" name="otp" id="otp" class="form-control" 
                                       placeholder="Enter 6-digit OTP" required maxlength="6">
                                <div class="input-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                @error('otp') 
                                    <div class="error-message mt-2">
                                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                    </div> 
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn-login">
                                <i class="fas fa-sign-in-alt me-2"></i>Verify & Login
                            </button>
                            
                            <a href="{{ route('guider.login') }}" class="back-link">
                                <i class="fas fa-arrow-left"></i>Back to email entry
                            </a>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Include -->
    @include('include.footer')

    <script>
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-control');
            
            inputs.forEach(input => {
                // Add focus effect
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    if (this.value === '') {
                        this.parentElement.classList.remove('focused');
                    }
                });
                
                // For OTP input, auto-tab between digits
                if (input.id === 'otp') {
                    input.addEventListener('input', function() {
                        if (this.value.length === 6) {
                            this.form.submit();
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>