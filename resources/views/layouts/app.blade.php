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
    <link href="{{ asset('css/home-provinces.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-cta.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-about.css') }}" rel="stylesheet">

    <link href="{{ asset('css/home-feedback.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="{{ asset('js/home-slider.js') }}"></script>
</head>
<body>
    @include('include.header')

    <!-- Home Slider Component -->
    @include('components.home-slider')

    <!-- New Call-to-Action Section -->
    @include('components.home-cta')

    <!-- New Call-to-Action Section -->
    @include('components.home-about')

    <!-- Special Packages Section -->
    @include('components.home-package')

    <!-- Content goes here -->
    @yield('content')


    @include('components.home-feedback')

    <!-- Home Contact Component -->
    @include('components.home-contact')

    <!-- Footer Component -->
    @include('include.footer')

   `
</body>
</html>
