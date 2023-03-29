<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('/css/kyoto.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <div class="wrapper">
        @include('header')
        @include('sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('footer')
    </div>
</div>
</body>
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="{{asset('/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/js/moment.min.js')}}"></script>
    <script src="{{asset('/js/daterangepicker.js')}}"></script>
    <script src="{{asset('/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('/js/style.js')}}"></script>
    <script src="{{ asset('/js/sweetalert2.all.js') }}"></script>
    @yield('script')
</html>
