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

@if (count($selectedCategory) > 0)
  <form action="{{ route('add-to-cart') }}" method="POST">
    @csrf
    <input type="text" hidden name="category_id" value="{{$selectedCategory[0]->category_id}}">
    @for ($i = 0; $i < count($selectedCategory); $i++)
    <div class="accordion m-1 p-2 d-flex" id="accordionExample">
      <div class="accordion-item">
          <h2 class="accordion-header" id="heading{{$i}}">
            <button class="accordion-button collapsed p-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$i}}" aria-expanded="false" aria-controls="collapse{{$i}}">
              Select Your {{$selectedCategory[$i]->attribute_name}}
              @if ($selectedCategory[$i]->multiple_choice) <sub>&nbsp; (Pick 0 or more)</sub>
              @else <sub>&nbsp; (Pick 1)</sub>
              @endif
            </button>
          </h2>
          <div id="collapse{{$i}}" class="accordion-collapse collapse" aria-labelledby="heading{{$i}}" data-bs-parent="#accordionExample">
            <?php 
              $products = DB::table('products')->select('id','product_name','product_image_path','product_description','product_price','product_quantity','product_status')->where('attribute_id', '=', $selectedCategory[$i]->attribute_id);
              if($profile->role_id == "1"){ //Customer - shown active product only
                  $products=$products->where('product_status','=','active')->get();
              }
              else if ($profile->role_id == "2"){ //Staff
                  $products=$products->get();
              }
            ?>
            

        @if (count($products)>0)
            @if (!$selectedCategory[$i]->multiple_choice)  
              <input name="attribute_id_{{ $selectedCategory[$i]->attribute_id }}" type="radio" class="form-check-input" value=null checked hidden>
            @endif
            @for ($i2 = 0; $i2 < count($products); $i2++) {{-- looping each products inside an attribute--}}
                <div class="accordion-body" style="width: 40vh;">
                  <div class="card p-2">
                    <img src="@if ($products[$i2]->product_image_path != null)
                      {{ $products[$i2]->product_image_path }}
                    @else
                      http://127.0.0.1:8000/products/product_image/default_product_image.png
                    @endif" class="card-img-top pb-0 mb-0" alt="{{$products[$i2]->product_name}} Picture" style="height: 140px">
                    <div class="card-body py-0 mt-0">
                      <p class="card-text text-danger my-0 py-0">
                        @if ($products[$i2]->product_status == "inactive")
                        Inactive
                        @else
                          &nbsp; {{-- Active --}}
                        @endif
                      </p>
                      <p class="card-text mb-0 pb-0">
                        {{$products[$i2]->product_name}}
                      </p>
                      <p class="card-text my-0 py-0">
                        {{$products[$i2]->product_description}}
                      </p>
                      <p class="card-text my-0 py-0">
                        Rp. {{$products[$i2]->product_price}} / qty
                      </p>
                      <p class="card-text text-danger my-0 py-0 pb-2">
                        @if ($products[$i2]->product_quantity < 1 )
                          Out Of Stock
                        @else
                          &nbsp; {{-- In Stock --}}
                        @endif
                      </p>
                      @if ($profile->role_id == 1) {{-- if Role = Customer --}}
                        @if ($selectedCategory[$i]->multiple_choice)  
                          <div class="qty ">
                            <button class="btn btn-primary count py-1 px-3 me-2"
                              type="button"
                              onclick="
                                this.parentNode.querySelector('input[type=number]').stepDown();
                              "
                            >-</button>
                            <input name="attribute_id_{{ $selectedCategory[$i]->attribute_id }} [{{ $products[$i2]->id }}] " min="0" max="{{$products[$i2]->product_quantity}}" 
                              type="number" class="py-1 count w-80" name="qty" 
                              value="{{ old('product_quantity') ?? 0 }}"
                            >
                            <button class="btn btn-primary count py-1 px-3 ms-2"
                              type="button"
                              onclick="
                                this.parentNode.querySelector('input[type=number]').stepUp(); 
                              "
                            >+</button>
                          </div>
                        @else {{-- if radio button --}}
                          <div class="qty " style="text-align-last:center;">
                            <input name="attribute_id_{{ $selectedCategory[$i]->attribute_id }}" type="radio" class="form-check-input" value="{{ $products[$i2]->id }}"
                             @checked(old('attribute_id_'.$selectedCategory[$i]->attribute_id) == $products[$i2]->id)
                            >
                          </div>
                        @endif
                      @elseif($profile->role_id == 2) {{-- if Role = Admin --}}
                        <div class="qty ">
                          <button class="btn btn-primary count py-1 px-3 me-2" type="button"
                            onclick="window.location='{{ url($selectedCategory[$i]->attribute_id.'/product/'.$products[$i2]->id) }}'">Edit</button>
                          <button class="btn btn-danger count py-1 px-3 ms-2" type="button"
                            onclick="window.location='{{ url($selectedCategory[$i]->attribute_id.'/product/'.$products[$i2]->id).'/delete' }}'">Delete</button>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
              @endfor
            @else
              <div class="accordion-body">
                <div class="card" >
                  <div class="card-body">
                    <p class="card-text">No Products</p>
                  </div>
                </div>
              </div>
            @endif
          </div>
          @if ($profile->role_id == 2) {{-- if Role = Admin --}}
            <div class="d-flex justify-content-end mx-4 my-2">
              <button onclick="window.location='{{ url($selectedCategory[$i]->attribute_id.'/product/add') }}'">
                + Add New Product
              </button>
            </div>
          @endif
        </div>
        @if ($profile->role_id == 2) {{-- if Role = Admin --}}
          <div class="d-flex flex-column justify-content-start">
            <a class="text-decoration-none text-black-50" href="{{ url($category_id.'/attribute/'.$selectedCategory[$i]->attribute_id)}}">
              <span class="material-symbols-outlined m-1">
                border_color
              </span>
            </a>
            <a class="text-decoration-none text-black-50" href="{{ url($category_id.'/attribute/'.$selectedCategory[$i]->attribute_id).'/delete'}}">
              <span class="material-symbols-outlined m-1"> delete </span>
            </a>
          </div>
        @endif
      </div>
    @endfor
    @if ($profile->role_id == 1) {{-- if Role = Customer --}}
      {{-- <div class="p-3 text-left">
        <p><span style="font-weight: bold">Total: </span>Rp. <span id="total_cart_price"> 0 </span> </p>
      </div> --}}
      <div class="add-to-cart-div" style="margin-bottom: 60px;">
        <button type="submit">Add To Cart</button>
      </div>
    @endif
  </form>
@else
  <div class="accordion m-1 p-2 d-flex" id="accordionExample">
    <div class="accordion-item p-4 text-center">
      No Attributes Available for this Category
    </div>
  </div>
@endif

@if($profile->role_id == 2) {{-- if Role = Admin --}}
  <div class="mx-4">
    <button onclick="window.location='{{ url($category_id.'/attribute/add') }}'">
      Add New Attribute
    </button>
  </div>
@endif

<div style="margin-bottom: 60px;"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>
  jQuery(document).ready(function($){
      
  });
</script>

@endsection