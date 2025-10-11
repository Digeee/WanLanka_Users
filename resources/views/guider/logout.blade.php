<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - WanLanka</title>
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
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--text);
        }
        
        .logout-container {
            width: 100%;
            max-width: 500px;
        }
        
        .logout-card {
            background: #fff;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .logout-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            padding: 40px 20px;
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
        
        .logout-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            position: relative;
            z-index: 2;
        }
        
        .logout-icon i {
            font-size: 36px;
        }
        
        .card-header h2 {
            font-weight: 600;
            margin-bottom: 10px;
            position: relative;
            z-index: 2;
        }
        
        .card-header p {
            opacity: 0.9;
            font-size: 16px;
            position: relative;
            z-index: 2;
        }
        
        .card-body {
            padding: 40px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
        }
        
        .user-details h4 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }
        
        .user-details p {
            margin: 0;
            font-size: 14px;
            color: var(--text-light);
        }
        
        .logout-message {
            font-size: 16px;
            margin-bottom: 30px;
            color: var(--text);
            line-height: 1.6;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-logout {
            background: linear-gradient(135deg, #d63031 0%, #ff7675 100%);
            color: white;
        }
        
        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(214, 48, 49, 0.4);
        }
        
        .btn-cancel {
            background: #f8f9fa;
            color: var(--text);
            border: 1px solid var(--border);
        }
        
        .btn-cancel:hover {
            background: #e9ecef;
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .countdown {
            margin-top: 20px;
            font-size: 14px;
            color: var(--text-light);
        }
        
        .countdown-number {
            font-weight: 600;
            color: var(--primary);
        }
        
        .footer {
            text-align: center;
            margin-top: 30px;
            color: var(--text-light);
            font-size: 14px;
        }
        
        /* Animation for logout */
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
        
        .logging-out {
            animation: fadeOut 1.5s ease forwards;
        }
        
        /* Responsive adjustments */
        @media (max-width: 576px) {
            .card-body {
                padding: 30px 20px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <div class="logout-card">
            <div class="card-header">
                <div class="logout-icon">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
                <h2>Logout</h2>
                <p>Are you sure you want to logout?</p>
            </div>
            
            <div class="card-body">
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-details">
                        <h4>John Guider</h4>
                        <p>Professional Tour Guide</p>
                    </div>
                </div>
                
                <div class="logout-message">
                    You will be redirected to the login page after logout. 
                    Any unsaved changes will be lost.
                </div>
                
                <div class="action-buttons">
                    <button class="btn btn-logout" id="logoutBtn">
                        <i class="fas fa-sign-out-alt"></i>Yes, Logout
                    </button>
                    <button class="btn btn-cancel" id="cancelBtn">
                        <i class="fas fa-times"></i>Cancel
                    </button>
                </div>
                
                <div class="countdown" id="countdown" style="display: none;">
                    Redirecting in <span class="countdown-number" id="countdownNumber">5</span> seconds...
                </div>
            </div>
        </div>
        
        <div class="footer">
            <p>&copy; 2023 WanLanka. All rights reserved.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoutBtn = document.getElementById('logoutBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const countdown = document.getElementById('countdown');
            const countdownNumber = document.getElementById('countdownNumber');
            
            let countdownValue = 5;
            let countdownInterval;
            
            // Logout button click handler
            logoutBtn.addEventListener('click', function() {
                // Show countdown
                countdown.style.display = 'block';
                
                // Disable buttons
                logoutBtn.disabled = true;
                cancelBtn.disabled = true;
                
                // Add logging out class for animation
                document.querySelector('.logout-card').classList.add('logging-out');
                
                // Start countdown
                countdownInterval = setInterval(function() {
                    countdownValue--;
                    countdownNumber.textContent = countdownValue;
                    
                    if (countdownValue <= 0) {
                        clearInterval(countdownInterval);
                        // Redirect to login page
                        window.location.href = '/guider/login';
                    }
                }, 1000);
            });
            
            // Cancel button click handler
            cancelBtn.addEventListener('click', function() {
                // Redirect back to dashboard
                window.location.href = '/guider/dashboard';
            });
            
            // Auto-logout after 30 seconds of inactivity (optional feature)
            let inactivityTimer;
            function resetInactivityTimer() {
                clearTimeout(inactivityTimer);
                // Logout after 30 seconds of inactivity
                inactivityTimer = setTimeout(function() {
                    if (!logoutBtn.disabled) {
                        logoutBtn.click();
                    }
                }, 30000);
            }
            
            // Reset timer on any user activity
            document.addEventListener('mousemove', resetInactivityTimer);
            document.addEventListener('keypress', resetInactivityTimer);
            document.addEventListener('click', resetInactivityTimer);
            
            // Start the inactivity timer
            resetInactivityTimer();
        });
    </script>
</body>
</html>