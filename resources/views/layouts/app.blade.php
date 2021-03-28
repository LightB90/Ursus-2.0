<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="Standarde Ursus Breweries">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >

    @stack('js-css')
</head>
<body>
    @include('resources.modal')
    @include('resources.modal_lg')
    @yield('content')
</body>
</html>
