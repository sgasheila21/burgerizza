@extends('template/main-layout')

<link href="{{ asset('assets/css/layout-two-style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

@section('content')
    @include('template/navbar')
    @yield('sub-content')
@endsection

@include('template/footer')