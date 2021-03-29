<!doctype html>
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
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >

    @stack('js-css')
    <link rel="apple-touch-icon" href="images/icon-512.png">


</head>
<body>
    @include('resources.modal')
    @include('resources.modal_lg')
    @yield('content')

@guest
<script>
    window.addEventListener('load', e => {
        registerSW();
    });

    async function registerSW() {
        if ('serviceWorker' in navigator) {
            try {
                await navigator.serviceWorker.register('{{asset('sw.js')}}');
            } catch (e) {
                alert('ServiceWorker registration failed. Sorry about that.');
            }
        } else {
            document.querySelector('.alert').removeAttribute('hidden');
        }
    }
    </script>
@endguest
</body>
</html>
