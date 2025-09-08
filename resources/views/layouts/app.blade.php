<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','WanLanka')</title>
  {{-- add your global CSS/JS here --}}
</head>
<body>
  @include('include.header')

  <main>
    @yield('content')
  </main>

  @include('include.footer')
</body>
</html>
