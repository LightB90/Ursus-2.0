@extends('layouts.app')
@push('js-css')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/5buttons.css')}}">
    <link href="{{asset('css/summernote-bs4.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/summernote-bs4.min.js')}}"></script>
@endpush
@section('content')
    <div class="main-content">

    </div>
    @include('components.footer')
@endsection


