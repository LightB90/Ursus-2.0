@extends('layouts.app')
@push('js-css')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/5buttons.css')}}">
@endpush
@section('content')
    <div class="main-content">

    </div>
    @include('components.footer')
@endsection


