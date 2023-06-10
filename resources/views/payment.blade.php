@extends('template/layout-two')
@section('title', 'CUSTOMIZE ORDER')

<style>
    body { 
      background: linear-gradient(180deg, #D82911 16.8%, rgba(230, 149, 138, 0.453125) 81.25%, rgba(216, 41, 17, 0) 100%);
    }
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

@section('sub-content')

@if ($errors->any())
  <div class="alert alert-danger">
      <ul class="mb-0">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif


<div class="accordion m-1 p-2 d-flex" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading">
        <button class="accordion-button collapsed p-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapse">
          Select Your Payment Method
      </h2>
      <div id="collapse" class="accordion-collapse collapse" aria-labelledby="heading" data-bs-parent="#accordionExample">
        <form method="POST">
            @csrf
            @if (count($paymentMethods)>0)
          <input name="payment_method" type="radio" class="form-check-input" value=null checked hidden>
            @for ($i2 = 0; $i2 < count($paymentMethods); $i2++) {{-- looping each paymentMethods --}}
                <div class="accordion-body" style="width: 40vh;">
                  <div class="card p-2">
                    <img src="
                    @if ($paymentMethods[$i2]->payment_methods_image_path != null)
                      {{ $paymentMethods[$i2]->payment_methods_image_path }}
                    @endif" class="card-img-top pb-0 mb-0" alt="{{$paymentMethods[$i2]->payment_methods_name}} Picture" style="height: 140px">
                    <div class="card-body py-0 mt-0">
                      <p class="card-text mb-0 pb-0">
                        {{$paymentMethods[$i2]->payment_methods_name}}
                      </p>
                      <p class="card-text my-0 py-0">
                        {{$paymentMethods[$i2]->payment_methods_description}}
                      </p>

                      <input name="payment_method" type="radio" class="form-check-input" value="{{ $paymentMethods[$i2]->id }}"
                        @checked(old('payment_method') == $paymentMethods[$i2]->id)
                      >
                    </div>
                  </div>
                </div>
            @endfor
          @else
              <div class="accordion-body">
                <div class="card" >
                  <div class="card-body">
                    <p class="card-text">No paymentMethods</p>
                  </div>
                </div>
              </div>
          @endif
          </div>
          <div class="add-to-cart-div" style="margin-bottom: 60px;">
            <button type="button" onclick="window.location='{{ url('home')}}'">Create Transaction</button>
          </div>
        </form>
      </div>   
    </div>
 </div>



<div style="margin-bottom: 60px;"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>
  jQuery(document).ready(function($){
      
  });
</script>

@endsection