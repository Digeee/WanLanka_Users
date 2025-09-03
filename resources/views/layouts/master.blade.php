<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WanLanka</title>
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-contact.css') }}" rel="stylesheet">
    <link href="{{ asset('css/provinces.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-about.css') }}" rel="stylesheet"> {{-- About Section CSS --}}
    <link href="{{ asset('css/home-packages.css') }}" rel="stylesheet"> <!-- New CSS for packages section -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <script src="{{ asset('js/home-slider.js') }}"></script>
</head>
<body>
{{-- Page Content --}}
    <div class="content">
        @yield('content')
    </div>
    
</body>
</html>
