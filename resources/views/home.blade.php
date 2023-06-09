@extends('template/layout-two')
@section('title', 'HOME')

<style>
    body { 
      background: url("/assets/bg.jpg") no-repeat fixed center; 
      background-size: 100%;
    }
</style>

@section('sub-content')
    <div class="form-03-main mb-5">
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
        <div class="button-home-page d-block text-center">
            @foreach ($categories as $category )
            <button type="button" onclick="window.location='{{ url('customize-order/'.Str::lower(str_replace(' ', '', $category->category_name))) }}'">
                CUSTOM 
                {{ Str::upper($category->category_name) }}
            </button>
            @endforeach
        </div>
    </div>
@endsection {{-- end of sub-content section--}}