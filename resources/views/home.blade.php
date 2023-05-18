@extends('template/layout-two')
@section('title', 'HOME')

<style>
    body { 
      background: url("/assets/bg.jpg") no-repeat fixed center; 
      background-size: 100%;
    }
</style>

@section('sub-content')
    <div class="form-03-main">
        <div>
            <p>
                <a class="red-text" href="{{ url('home') }}">Burgerizza</a> 
                is a company engaged in the field of food and beverage. 
                Customers from 
                <a class="red-text" href="{{ url('home') }}">Burgerizza</a> 
                can customize their own food.
            </p>
            <br/>
            <p>
                Let's custom your 
                <a class="brown-text" href="{{ url('home') }}">order now!</a>
            </p>
        </div>
        <div class="button-home-page">
            <button>CUSTOM PIZZA</button>
            <button>CUSTOM BURGER</button>
            <button>ORDER DRINK</button>
        </div>
    </div>
@endsection {{-- end of sub-content section--}}