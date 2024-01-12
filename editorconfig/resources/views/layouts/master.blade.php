<!doctype html>
<html class="h-full bg-white scroll-pt-14 scroll-smooth" lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- FAVICON -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png')}}">

  <!-- GOOGLE FONT / PUBLIC SANS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="{{ asset('css/main.css')}}">
  <!-- JQUERY -->
  <script src="{{ asset('plugins/jquery-3.4.1.min.js')}}"></script>

  <!-- PAGE TITLE -->
  <title>
    @yield('title', 'Home') | {{ env('APP_NAME')}}
  </title>

</head>

<!-- Header -->
@include('layouts.header')

<!-- content -->
@yield('content')

<!-- footer  -->
@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- CUSTOM SCRIPT -->
<script src="{{ asset('js/main.js')}}"></script>
@if(session('error'))
<script>
  toastr.error("{{session('error')}}");
</script>
@endif
@if (session('success'))
<script>
  toastr.success("{!! \session('success') !!}");
</script>
@endif
</body>

</html>