<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password | Wan Lanka</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #e6f0fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .reset-container {
            background: #fff;
            padding: 35px 30px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 128, 128, 0.15);
            max-width: 400px;
            width: 100%;
            animation: fadeSlideIn 0.5s ease-in-out;
        }

        .reset-container h2 {
            color: #0072ff;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
        }

        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            margin-bottom: 20px;
            border-radius: 12px;
            border: 1px solid #ced4da;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="password"]:focus {
            outline: none;
            border-color: #00aaff;
            box-shadow: 0 0 8px rgba(0, 170, 255, 0.3);
        }

        button {
            width: 100%;
            background-color: #00aaff;
            border: none;
            padding: 14px;
            border-radius: 12px;
            color: #fff;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #00cc88;
            transform: scale(1.05);
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
    </style>
</head>
<body>

<div class="reset-container">
    <h2>Reset Password</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="password" name="password" placeholder="New Password" required />
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
        <button type="submit">Reset Password</button>
    </form>
</div>

</body>
</html>
