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

@if (count($selectedCategory) > 0)
  @for ($i = 0; $i < count($selectedCategory); $i++)
  <div class="accordion m-1 p-2 d-flex" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading{{$i}}">
        <button class="accordion-button collapsed p-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$i}}" aria-expanded="false" aria-controls="collapse{{$i}}">
          Select Your {{$selectedCategory[$i]->attribute_name}}
        </button>
      </h2>
      <div id="collapse{{$i}}" class="accordion-collapse collapse" aria-labelledby="heading{{$i}}" data-bs-parent="#accordionExample">
        <?php $attributes = DB::table('products')->select('product_name','product_price','product_quantity')->where('attribute_id', '=', $selectedCategory[$i]->attribute_id)->get() ?>
        @if (count($attributes)>0)
          @for ($i2 = 0; $i2 < count($attributes); $i2++)
            <div class="accordion-body">
              <div class="card" >
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Item Name</p>
                  <div class="qty ">
                    <input type="number" class="count" name="qty" value="1">
                </div>
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
      <div class="d-flex justify-content-end mx-4 my-2">
        <button onclick="window.location='{{ url($selectedCategory[$i]->attribute_id.'/product/add') }}'">
          + Add New Product
        </button>
      </div>
    </div>
    @if ($profile->role_id == 2) {{-- if Role = Admin --}}
      <div class="d-flex flex-column justify-content-start">
        <a class="text-decoration-none text-black-50" href="{{ url($category_id.'/attribute/'.$selectedCategory[$i]->attribute_id)}}">
          <span class="material-symbols-outlined m-1">
            border_color
          </span>
        </a>
        <a class="text-decoration-none text-black-50" href="{{ url($category_id.'/attribute/'.$selectedCategory[$i]->attribute_id)}}">
          <span class="material-symbols-outlined m-1"> delete </span>
        </a>
      </div>
    @endif
  </div>
  @endfor
  @else
  <div class="accordion m-1 p-2 d-flex" id="accordionExample">
    <div class="accordion-item p-4 text-center">
      No Attributes Available for this Category
    </div>
  </div>
@endif

@if ($profile->role_id == 1) {{-- if Role = Customer --}}
  <div class="add-to-cart-div">
    <button>Add To Cart</button>
  </div>
@elseif ($profile->role_id == 2) {{-- if Role = Admin --}}
  <div class="mx-4">
    <button onclick="window.location='{{ url($category_id.'/attribute/add') }}'">
      Add New Attribute
    </button>
  </div>
@endif

@endsection