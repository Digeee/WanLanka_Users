<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wan</title>
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-contact.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <script src="{{ asset('js/home-slider.js') }}"></script>
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
    <!-- Home Contact Component -->
    @include('components.home-contact')
    <!-- Footer Component -->
    @include('include.footer')
</body>
</html>
