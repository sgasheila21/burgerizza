@extends('template/main-layout')

<link href="{{ asset('assets/css/layout-one-style.css') }}" rel="stylesheet">

<style>
  body { 
    background: url("/assets/bg.jpg") no-repeat fixed center; 
    background-size: 100%;
  }
</style>

@section('content')
  @yield('sub-content')
@endsection