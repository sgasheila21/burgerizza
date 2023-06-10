@extends('template/layout-two')
@section('title', 'CART')

<style>
    h1{
        text-align: center;
        padding-bottom: 15px;
    }
</style>
  
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

@section('content')
  <section class="h-100" id="cart">
      <div class="container py-5">
        <div class="row my-4">
          <h1>Your Cart</h1>
          @if (count($cart) > 0)
            <form action="/checkout" method="POST" class="d-flex">
              @csrf
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header py-3">
                    <h4 class="mb-0">Cart</h4>
                  </div>
                  <div class="card-body">
                    <?php 
                      $total = 0;
                      $totalItems = 0
                    ?>
                    @foreach ($cart as $currproduct)
                      <div class="row pt-4 w-100">
                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                          <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                            <img src="{{ $currproduct->product_image }}"
                              class="w-100" alt="{{ $currproduct->product_name }}" 
                            />
                          </div>
                        </div>
            
                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                          <p><strong>{{ $currproduct->product_name }}</strong></p>
                          <p><strong>Price : {{ $currproduct->product_price }}</strong></p>
  
                          <div class="d-flex mb-4" style="max-width: 300px">
                            <button class="btn btn-primary px-3 me-2"
                              type="button"
                              onclick="
                                this.parentNode.querySelector('input[type=number]').stepDown();
                                updateQuantity( {{ $currproduct->cart_id }}, this.parentNode.querySelector('input[type=number]').value);
                              "
                            >
                              <i>-</i>
                            </button>
            
                            <div class="form-outline">
                              <input class="form-control"
                                id="form1" 
                                min="0" 
                                name="quantity" 
                                value={{ $currproduct->quantity }} 
                                type="number"
                                onchange=
                                "
                                  if (this.value > 0) {
                                    updateQuantity( {{ $currproduct->cart_id }}, this.value);
                                  }
                                  else
                                  {
                                    this.value = 1;
                                  }
                                "
                              />
                            </div>
            
                            <button class="btn btn-primary px-3 ms-2"
                              type="button"
                              onclick="
                                this.parentNode.querySelector('input[type=number]').stepUp(); 
                                updateQuantity( {{ $currproduct->cart_id }}, this.parentNode.querySelector('input[type=number]').value);
                              "
                            >
                              <i>+</i>
                            </button>
  
                            <button 
                              type="button" 
                              class="btn btn-danger btn-sm px-3 ms-2" 
                              data-mdb-toggle="tooltip"
                              title="Remove item"
                              onclick="updateQuantity( {{ $currproduct->cart_id }}, 0 )"
                            >
                            <i>
                              <span class="material-symbols-outlined"> delete </span>
                            </i>
                            </button>
                          </div>
                        </div>
                        <hr class="my-2 w-100" />
                      </div>

                      <?php 
                        $total += $currproduct->subtotal ;
                        $totalItems += $currproduct->quantity 
                      ?>
                    @endforeach
                  </div>
                </div>
              </div>
  
              <div class="col-md-4">
                <div class="card mb-4">
                  <div class="card-header py-3">
                    <h4 class="mb-0">Cart Summary</h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-group">
                      <li
                        class="list-group-item border-0 px-0 pb-1">
                        Total Price : 
                        <span>
                          Rp. 
                          {{ $total }}
                        </span>
                      </li>
                      <li class="list-group-item border-0 px-0 pb-4">
                        Total Item : 
                        <span> 
                          {{ $totalItems }}
                           Item(s)
                        </span>
                      </li>
                    </ul>
                  
                    <hr class="my-2" />
  
                    @if(count($user_addresses) > 0)
                      <div class="py-3">
                        <h4 class="mb-0">Choose Delivery Address</h4>
                      </div>
                      <div class="list-group-item border-0 px-0 pb-4">
                        <select 
                          class="form-select" 
                          aria-label="Choose Your Address"
                          name="deliveryAddress"
                          id="deliveryAddress"
                        >
                          @foreach ($user_addresses as $address)
                            <option value={{$address->id}} 
                              @if ($address->is_main)
                                @checked(true)
                              @endif
                            >
                              {{$address->name}}, {{$address->phone_number}}, {{$address->address}}
                            </option>
                          @endforeach
                        </select>
                        <div class="text-danger mb-4">
                            @error('deliveryAddress') {{ $message }} @enderror
                        </div>
                      
                      @else
                      <div class="py-3 text-center">
                        <h4 class="mb-0 text-danger">You have no Delivery Address.</h4>
                        <h4 class="mb-0">Click <a href="{{ url('profile') }}">here</a> to Add Delivery Address.</h4>
                      </div>
                      @endif
  
                    <button 
                      type="submit" 
                      class="btn btn-primary btn-lg btn-block mt-4"
                    >
                      Go to checkout
                    </button>
                  
                  </div>
                </div>
              </div>
            </form>

          @else 
            <div class="card-body mt-3">
              <div class="card mb-4">
                <div class="card-header p-4 text-center">
                  <p class="p-0 m-0"> 
                    There is no item in your cart.<br>
                    Click <a href="{{ url('home') }}">here</a> to back to home. 
                  </p>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="{{ asset('assets/js/cart_script.js') }}"></script>
@endsection
  