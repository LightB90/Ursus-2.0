@extends('layouts.app')
@push('js-css')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/5buttons.css')}}">
    @auth
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    @endauth
@endpush
@section('content')
    <div class="main-content">

    </div>
    @include('components.footer')
@endsection
