<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('js-css')
</head>
<body>
    @yield('nav')
    @yield('content')
    <footer>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <img alt="" src="{{asset('images/endorsement.svg')}}">
                </div>
                <div class="col-md-6">
                    <div class="last_update">
                        Last update: {{date('d-M-Y')}} <span class="on_off"><img alt="" src="{{asset('images/on.svg')}}"></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @include('assets.js.main')
</body>
</html>
