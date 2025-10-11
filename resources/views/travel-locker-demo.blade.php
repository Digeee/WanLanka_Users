<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Locker Demo - WanLanka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }
        .demo-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .demo-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        .demo-header {
            text-align: center;
            color: white;
            margin-bottom: 2rem;
        }
        .demo-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        .feature-list {
            list-style: none;
            padding: 0;
        }
        .feature-list li {
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .feature-list i {
            color: #667eea;
            width: 20px;
        }
        .btn-demo {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.2s ease;
        }
        .btn-demo:hover {
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }
        .step {
            background: #f8fafc;
            border-left: 4px solid #667eea;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 0 8px 8px 0;
        }
        .step h5 {
            color: #667eea;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="demo-container">
            <!-- Header -->
            <div class="demo-header">
                <h1><i class="fas fa-lock me-3"></i>Travel Locker Demo</h1>
                <p>See how the Digital Travel Locker works</p>
            </div>

            <!-- Features -->
            <div class="demo-card">
                <h3><i class="fas fa-star me-2"></i>Features</h3>
                <ul class="feature-list">
                    <li><i class="fas fa-check"></i> Secure file upload with encryption</li>
                    <li><i class="fas fa-check"></i> 7 different document categories</li>
                    <li><i class="fas fa-check"></i> Drag & drop file upload</li>
                    <li><i class="fas fa-check"></i> Search and filter documents</li>
                    <li><i class="fas fa-check"></i> Document preview and details</li>
                    <li><i class="fas fa-check"></i> Secure download with decryption</li>
                    <li><i class="fas fa-check"></i> Mobile-responsive design</li>
                    <li><i class="fas fa-check"></i> Expiry date tracking</li>
                </ul>
            </div>

            <!-- How to Use -->
            <div class="demo-card">
                <h3><i class="fas fa-play me-2"></i>How to Use</h3>
                
                <div class="step">
                    <h5>Step 1: Access Travel Locker</h5>
                    <p>Login to your account and click on "Travel Locker" in your profile dropdown menu.</p>
                </div>
                
                <div class="step">
                    <h5>Step 2: Upload Document</h5>
                    <p>Click "Upload New Document" and select a file. You can drag and drop files or click to browse.</p>
                </div>
                
                <div class="step">
                    <h5>Step 3: Fill Details</h5>
                    <p>Enter a title, description, select a category, and optionally set an expiry date.</p>
                </div>
                
                <div class="step">
                    <h5>Step 4: Secure Storage</h5>
                    <p>Your document will be encrypted and stored securely. Only you can access it.</p>
                </div>
                
                <div class="step">
                    <h5>Step 5: Manage Documents</h5>
                    <p>View, edit, download, or delete your documents anytime from the main dashboard.</p>
                </div>
            </div>

            <!-- Document Categories -->
            <div class="demo-card">
                <h3><i class="fas fa-folder me-2"></i>Document Categories</h3>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="feature-list">
                            <li><i class="fas fa-passport"></i> Passport/ID Documents</li>
                            <li><i class="fas fa-file-contract"></i> Visa & Travel Insurance</li>
                            <li><i class="fas fa-plane"></i> Flight & Hotel Bookings</li>
                            <li><i class="fas fa-heartbeat"></i> Medical Records</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="feature-list">
                            <li><i class="fas fa-phone"></i> Emergency Contacts</li>
                            <li><i class="fas fa-camera"></i> Valuables Photos</li>
                            <li><i class="fas fa-file"></i> Other Documents</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Security -->
            <div class="demo-card">
                <h3><i class="fas fa-shield-alt me-2"></i>Security Features</h3>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="feature-list">
                            <li><i class="fas fa-lock"></i> File encryption before storage</li>
                            <li><i class="fas fa-user-shield"></i> User ownership validation</li>
                            <li><i class="fas fa-database"></i> Private storage (not web-accessible)</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="feature-list">
                            <li><i class="fas fa-key"></i> Secure download with decryption</li>
                            <li><i class="fas fa-history"></i> Activity logging for audit trails</li>
                            <li><i class="fas fa-check-circle"></i> CSRF protection on all forms</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="demo-card text-center">
                <h3><i class="fas fa-rocket me-2"></i>Ready to Try?</h3>
                <p>Experience the Digital Travel Locker for yourself!</p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="/travel-locker" class="btn-demo">
                        <i class="fas fa-lock"></i>Open Travel Locker
                    </a>
                    <a href="/travel-locker/create" class="btn-demo">
                        <i class="fas fa-upload"></i>Upload Document
                    </a>
                    <a href="/" class="btn-demo">
                        <i class="fas fa-home"></i>Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
