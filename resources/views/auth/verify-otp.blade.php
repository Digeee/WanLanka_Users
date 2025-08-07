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

        body, html {
            height: 100%;
            margin: 0;
            background: #e6f0fa;
        }

        .otp-container {
            width: 400px;
            margin: auto;
            margin-top: 100px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 128, 128, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        h2 {
            color: #0072ff;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 12px;
            padding: 14px;
            font-size: 1rem;
            border: 1px solid #ced4da;
        }

        .btn-custom {
            background: #00aaff;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: 0.3s;
            width: 100%;
        }

        .btn-custom:hover {
            background: #00cc88;
            transform: scale(1.02);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 576px) {
            .otp-container {
                width: 90%;
                margin-top: 60px;
            }
        }
    </style>
</head>
<body>

<div class="otp-container">
    <h2>Verify OTP</h2>

    @if(session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('verify.otp') }}">
        @csrf
        <div class="mb-3">
            <label for="otp" class="form-label">OTP Code</label>
            <input type="text" class="form-control" name="otp" id="otp" maxlength="6" required placeholder="Enter 6-digit OTP">
        </div>
        <button type="submit" class="btn btn-custom mt-3">Verify</button>
    </form>
</div>

</body>
</html>
