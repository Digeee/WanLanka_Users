<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password | Wan Lanka</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #e6f0fa;
            margin: 0;
            padding: 0;
        }

        .forgot-container {
            max-width: 400px;
            margin: 100px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 128, 128, 0.1);
            animation: slideFadeIn 0.5s ease-in-out;
        }

        .forgot-container h2 {
            text-align: center;
            color: #0072ff;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 12px;
            padding: 14px;
            font-size: 1rem;
            border: 1px solid #ced4da;
        }

        .btn-send {
            background: #00aaff;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px;
            width: 100%;
            font-weight: 600;
            font-size: 1rem;
            transition: 0.3s ease;
        }

        .btn-send:hover {
            background: #00cc88;
            transform: scale(1.03);
        }

        @keyframes slideFadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 576px) {
            .forgot-container {
                margin: 60px 20px;
                padding: 25px;
            }
        }
    </style>
</head>
<body>

<div class="forgot-container">
    <h2>Forgot Password</h2>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
        </div>
        <button type="submit" class="btn btn-send">Send OTP</button>
    </form>
</div>

</body>
</html>
