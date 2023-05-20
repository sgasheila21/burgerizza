@extends('template/layout-two')
@section('title', 'CUSTOMIZE ORDER')

<style>
    body { 
      background: linear-gradient(180deg, #D82911 16.8%, rgba(230, 149, 138, 0.453125) 81.25%, rgba(216, 41, 17, 0) 100%);
    }
</style>

@section('sub-content')
@for ($i = 0; $i < 5; $i++)
<div class="accordion m-1 p-2" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading{{$i}}">
      <button class="accordion-button collapsed p-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$i}}" aria-expanded="false" aria-controls="collapse{{$i}}">
        Select Your Dough 
      </button>
    </h2>
    <div id="collapse{{$i}}" class="accordion-collapse collapse" aria-labelledby="heading{{$i}}" data-bs-parent="#accordionExample">
      @for ($i2 = 0; $i2 < 5; $i2++)
      
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
    </div>
  </div>
</div>
@endfor

<div class="add-to-cart-div">
  <button>Add To Cart</button>
</div>

@endsection