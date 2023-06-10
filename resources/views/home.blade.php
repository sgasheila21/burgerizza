@extends('template/layout-two')
@section('title', 'HOME')

<style>
    body { 
      background: url("/assets/bg.jpg") no-repeat fixed center; 
      background-size: 100%;
    }
</style>

@section('sub-content')
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="form-03-main mb-5" style="font-size: 50px;">
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

    <!-- POP UP ADDRESS -->
    @if(auth()->user()->addresses->isEmpty())
    <div class="form-03-main mb-5">
    <button id="showModal" style="display:none" data-bs-toggle="modal" data-bs-target="#popUpAddress">Show Modal</button>

    <form action="{{ route('add-address') }}" method="POST">
        @csrf
        <div class="modal fade" id="popUpAddress" tabindex="-1" aria-labelledby="popUpAddress" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popUpAddress">Main Address</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">NAME:</label>
                            <input type="text" name="name" id="name" placeholder="Input recipient's name here" class="form-control _ge_de_ol" aria-required="true">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">PHONE NUMBER:</label>
                            <input type="text" name="phone_number" id="phone_number" placeholder="Input recipient's phone number here" class="form-control _ge_de_ol" aria-required="true">
                        </div>
                        <div class="form-group">
                            <label for="address">ADDRESS:</label>
                            <input type="text" name="address" id="address" placeholder="Input recipient's address here" class="form-control _ge_de_ol" aria-required="true" style="height:15vh">
                        </div>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="btnSave">Save</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" name="btnSkip" data-bs-dismiss="modal">Skip</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myButton = document.getElementById('showModal');
            myButton.click();
        });
    </script>
    @endif
@endsection {{-- end of sub-content section--}}