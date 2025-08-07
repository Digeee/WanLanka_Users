<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | Wan Lanka</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            margin: 0;
            background: #e6f0fa;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            gap: 40px;
            padding-top: 80px;
            position: relative;
        }

        /* Logo in the top-left corner */
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

        .image-container,
        .login-container {
            width: 400px;
            height: 600px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 128, 128, 0.1);
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            animation: fadeInLeft 1s ease-in-out;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            animation: fadeInRight 1s ease-in-out;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-container h2 {
            color: #0072ff;
            font-weight: 600;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #ced4da;
            padding: 15px;
            font-size: 1rem;
        }

        .btn-custom {
            background: #00aaff;
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 12px;
            padding: 15px;
            transition: 0.3s;
            width: 100%;
            font-size: 1.1rem;
        }

        .btn-custom:hover {
            background: #00cc88;
            transform: scale(1.02);
        }

        .link-text {
            font-size: 0.9rem;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .link-text a {
            color: #0072ff;
            text-decoration: none;
        }

        .link-text a:hover {
            text-decoration: underline;
        }

        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                padding: 20px;
                padding-top: 100px;
            }

            .image-container,
            .login-container {
                width: 100%;
                height: auto;
            }

            .logo img {
                height: 160px;
                width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- Logo -->
<div class="logo">
    <img src="/images/dark logo.png" alt="Wan Lanka Logo">
</div>

<!-- Login Page Layout -->
<div class="container">
    <!-- Left Image -->
    <div class="image-container">
        <img src="/images/login.jpg" alt="Login Background">
    </div>

    <!-- Right Login Form -->
    <div class="login-container">
        <h2>Login to Wan Lanka</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required placeholder="Enter your email">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-custom mb-4">Login</button>

            <div class="link-text">
                <a href="{{ route('register') }}">Create Account</a>
                <a href="{{ route('password.request') }}">Forgot Password?</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
