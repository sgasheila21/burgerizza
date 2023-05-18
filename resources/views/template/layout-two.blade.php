@extends('template/main-layout')

<link href="{{ asset('assets/css/layout-two-style.css') }}" rel="stylesheet">

@section('content')
    @include('template/navbar')
    @yield('sub-content')
@endsection

@include('template/footer')