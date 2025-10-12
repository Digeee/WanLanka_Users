<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','WanLanka')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Header CSS -->
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">

  <!-- Provinces CSS -->
  <link href="{{ asset('css/provinces.css') }}" rel="stylesheet">

  <!-- Footer CSS -->
  <link href="{{ asset('css/footer.css') }}" rel="stylesheet">

  {{-- Component styles - only load on pages that need them --}}
  @yield('component-styles')

  {{-- Page-specific styles --}}
  @yield('styles')
</head>
<body>
  @include('include.header')

  <main>
    @yield('content')
  </main>

  @include('include.footer')

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  {{-- Component scripts - only load on pages that need them --}}
  @yield('component-scripts')

  {{-- Page-specific scripts --}}
  @yield('scripts')
</body>
</html>
