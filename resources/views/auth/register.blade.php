<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register | Wan Lanka</title>
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

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 10;
        }

        .logo img {
            height: 50px;
            width: auto;
            animation: fadeInDown 1s ease-in-out;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.95);
            width: 400px;
            margin: auto;
            margin-top: 80px;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 128, 128, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        .register-container h2 {
            color: #0072ff;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #ced4da;
            padding: 14px;
            font-size: 1rem;
        }

        .btn-custom {
            background: #00aaff;
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 12px;
            padding: 14px;
            transition: 0.3s;
            width: 100%;
            font-size: 1.1rem;
        }

        .btn-custom:hover {
            background: #00cc88;
            transform: scale(1.02);
        }

        .btn-outline {
            border-radius: 12px;
            padding: 12px;
            font-weight: 500;
        }

        .link-text {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
        }

        .link-text a {
            color: #0072ff;
            text-decoration: none;
        }

        .link-text a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 576px) {
            .register-container {
                width: 90%;
                margin-top: 60px;
            }

            .logo img {
                height: 40px;
            }
        }
    </style>
</head>
<body>


<!-- Registration Form -->
<div class="register-container">
    <h2>Create Your Account</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required placeholder="Enter your name">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" required placeholder="Enter your email">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Create a password">
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required placeholder="Confirm password">
        </div>

        <button type="submit" class="btn btn-custom mt-3">Register</button>
        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-outline mt-3 w-100">Back to Login</a>
    </form>

    <div class="link-text">
        Already have an account? <a href="{{ route('login') }}">Login here</a>
    </div>
</div>

</body>
</html>
