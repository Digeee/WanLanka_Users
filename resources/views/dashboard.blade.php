<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white">
<div class="container mt-5">
    <h2 class="text-success">Welcome to Wan Lanka Dashboard!</h2>
    <form action="{{ route('logout') }}" method="POST" class="mt-3">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>
</div>
</body>
</html>
