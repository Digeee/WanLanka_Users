<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verify OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-success mb-4">Enter OTP</h2>

    @if(session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('verify.otp') }}">
        @csrf
        <div class="mb-3">
            <label for="otp">OTP Code</label>
            <input type="text" class="form-control" name="otp" required>
        </div>
        <button type="submit" class="btn btn-success">Verify</button>
    </form>
</div>
<div class="container mt-5 col-md-6">
    <h2 class="text-success mb-4">Enter OTP</h2>

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
            <input type="text" class="form-control" name="otp" id="otp" maxlength="6" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Verify</button>
    </form>
</div>

</body>
</html>
