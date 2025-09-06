<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WanLanka</title>

</head>
<body>
    @yield('content')
    @include('include.header')


    @include('components.home-slider')


    @include('components.home-cta')


    @include('components.home-about')


    @include('components.home-package')

    @include('components.home-feedback')


    @include('components.home-contact')


    @include('include.footer')


</body>
</html>
