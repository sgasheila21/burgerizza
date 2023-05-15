@extends('template/main-layout')

<link href="assets/css/layout-one-style.css" rel="stylesheet">
<link rel="icon" href="assets/images/LOGO_BURGERIZZA_NO_BG.png" type="image/png">

<style>
body { 
  background: url("/assets/bg.jpg") no-repeat fixed center; 
  background-size: 100%;
}
</style>

@section('content')
  @yield('sub-content')
@endsection