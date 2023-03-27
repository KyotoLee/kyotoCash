<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('/css/kyoto.css')}}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <div class="wrapper">
        @yield('content')
    </div>
</div>
</body>
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/js/moment.min.js')}}"></script>
<script src="{{asset('/js/daterangepicker.js')}}"></script>
<script src="{{asset('/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('/js/style.js')}}"></script>
</html>
