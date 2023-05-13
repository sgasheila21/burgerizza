@extends('template/main-layout')
<style>
body { 
  background: url("/assets/bg.jpg") no-repeat fixed center; 
  background-size: 100%;
}
</style>

@section('content')
        @yield('sub-content')
    @endsection