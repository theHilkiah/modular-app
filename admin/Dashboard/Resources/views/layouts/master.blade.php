@extends('layouts.admin')
@section('head')
    <title>Dashboard {{ isset($title)? " :: $title": '' }}</title>
@endsection
@section('styles')
{{-- <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}"> --}}
@endsection
@section('layout')
<div id="dashboard" class="dashboard">
    @yield('content')
</div>
@endsection
@section('scripts')
{{-- <script src="{{ mix('js/dashboard.js') }}"></script> --}}
@endsection
