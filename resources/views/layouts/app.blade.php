<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ritz Tours</title>
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
    <script src="{{ asset('js/slider.js') }}"></script>
</head>
<body>
</br>
</br>
</br>
</br>

    @include('include.header') <!-- Your header blade component -->

    <!-- Home Slider Component -->
    @include('components.home-slider')

    <!-- Content goes here -->
    @yield('content')
</body>
</html>
