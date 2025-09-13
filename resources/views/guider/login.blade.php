<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Guider Login</title>
<style>
body { font-family: Arial; background: #f2f6ff; display:flex; justify-content:center; align-items:center; height:100vh; }
.login-container { background:white; padding:40px; border-radius:12px; width:350px; text-align:center; box-shadow:0 8px 25px rgba(0,0,0,0.1); }
input { width:100%; padding:12px; margin:10px 0; border:1px solid #ccc; border-radius:8px; }
button { width:100%; padding:12px; background:#4a90e2; color:white; border:none; border-radius:8px; cursor:pointer; }
button:hover { background:#357abd; }
.error { color:red; font-size:13px; }
</style>
</head>
<body>
<div class="login-container">
    <h2>Guider Login</h2>
    <form action="{{ route('guider.login.submit') }}" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
        <input type="password" name="password" placeholder="Password" required>
        @error('username')
            <div class="error">{{ $message }}</div>
        @enderror
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
