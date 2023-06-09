@extends('template/layout-two')
@section('title', 'CUSTOMIZE ORDER')

<style>
    body { 
      background: linear-gradient(180deg, #D82911 16.8%, rgba(230, 149, 138, 0.453125) 81.25%, rgba(216, 41, 17, 0) 100%);
    }
</style>

@section('sub-content')
<div class="form-03-main mb-5">
  <h1 class="text-center">
    {{$attribute_id == "add" ? "ADD " : "EDIT "}}  
    ATTRIBUTE
  </h1>
</div>
@endsection