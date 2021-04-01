<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="Standarde Ursus Breweries">
    @guest
     <link rel="manifest" href="{{asset('manifest.webmanifest')}}">
    <meta name="theme-color" content="#004391">
    @endguest

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @include('assets.scripts')

    <!-- Styles -->
{{--    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('css/toastr.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >

    @stack('js-css')
    <link rel="apple-touch-icon" href="images/icon-512.png">

    @guest
    <script type="text/javascript">
        // Initialize the service worker
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/service-worker.js', {
                scope: '.'
            }).then(function (registration) {
                // Registration was successful
                console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
            }, function (err) {
                // registration failed :(
                console.log('Laravel PWA: ServiceWorker registration failed: ', err);
            });
        }
    </script>
    @endguest


<body>
    @include('resources.modal')
    @include('resources.modal_lg')
    @yield('content')


</body>
</html>
