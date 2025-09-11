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
    <link href="{{ asset('css/home-about.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-packages.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-cta.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-feedback.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://cdn.botpress.cloud/webchat/v3.2/inject.js"></script>
<script src="https://files.bpcontent.cloud/2025/09/09/18/20250909182527-FY195H05.js" defer></script>



    <script src="{{ asset('js/home-slider.js') }}"></script>
</head>
<body>
{{-- Page Content --}}
    <div class="content">
        @yield('content')
    </div>


</body>
</html>
