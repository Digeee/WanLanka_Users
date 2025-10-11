<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WanLanka</title>






<link href="{{ asset('css/provinces.css') }}" rel="stylesheet">





    <script src="https://cdn.botpress.cloud/webchat/v3.2/inject.js"></script>
<script src="https://files.bpcontent.cloud/2025/09/09/18/20250909182527-FY195H05.js" defer></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


@yield('styles')
    <script src="{{ asset('js/home-slider.js') }}"></script>
</head>
<body>

    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
