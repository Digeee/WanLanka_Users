<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verify OTP | Wan Lanka</title>
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

        .otp-container {
            max-width: 400px;
            margin: 100px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 128, 128, 0.1);
            animation: fadeSlideIn 0.5s ease-in-out;
        }

        .otp-container h2 {
            text-align: center;
            color: #00aaff;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 12px;
            padding: 14px;
            font-size: 1rem;
            border: 1px solid #ced4da;
        }

        .btn-verify {
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

        .btn-verify:hover {
            background: #00cc88;
            transform: scale(1.03);
        }

        @keyframes fadeSlideIn {
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
            .otp-container {
                margin: 60px 20px;
                padding: 25px;
            }
        }
    </style>
</head>
<body>

<div class="otp-container">
    <h2>Verify OTP</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form method="POST" action="{{ route('password.otp.verify') }}">
        @csrf
        <div class="mb-3">
            <label for="otp" class="form-label">Enter OTP Code</label>
            <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter OTP" maxlength="6" required>
        </div>
        <button type="submit" class="btn btn-verify">Verify OTP</button>
    </form>
</div>

</body>
</html>
