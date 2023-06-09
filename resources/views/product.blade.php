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
    {{$product_id == "add" ? "ADD NEW " : "EDIT "}}  
    PRODUCT in
    {{ DB::table('attributes')->where('id','=',$attribute_id)->get()[0]->attribute_name }}'s Product
  </h1>
  <div>
    <form method="POST" action="{{ url($attribute_id.'/product/'.$product_id) }}" class="form-control-lg" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="product_name" class="form-control" id="product_name" aria-describedby="product_name_Help"
         name="product_name" value= @if (old('product_name')) {{old('product_name')}} @elseif(count($product) > 0) "{{ $product[0]->product_name }}" @endif
        >
        <div id="product_name_Help" class="form-text">Please do not insert existing product name.</div>
      </div>
      <div class="mb-3">
        <label for="product_description" class="form-label">Product Description</label>
        <textarea name="product_description" class="form-control" aria-label="With textarea" id="product_description" aria-describedby="product_description_Help">@if(old('product_description')) {{ old('product_description') }}  @elseif(count($product) > 0) {{ $product[0]->product_description }}  @endif</textarea>
        <div id="product_name_Help" class="form-text">Product Description will be showed in Customized Order Product's Card. Thus please keep it short. *ex: Servings: 4</div>
      </div>
      <div class="mb-3">
        <label for="product_image_path" class="form-label">Product Image</label>
        <br/>
        <img name="show_product_image" id="show_product_image" src="
            @if (count($product) > 0) 
              @if(old('product_image')!=null){
                old('product_image')
              }
              @elseif($product[0]->product_image_path != null)
                {{ $product[0]->product_image_path }}
              @else
                http://127.0.0.1:8000/products/product_image/default_product_image.png
              @endif 
            @else
              http://127.0.0.1:8000/products/product_image/default_product_image.png
            @endif
          "
          alt="@if (count($product) > 0) {{$product[0]->product_name}} @endif Product Image" class="mb-1" style="height: 250px;"
        >
        <input type="file" class="form-control" id="product_image" name="product_image"
         onchange="
          if(this.files[0]) document.getElementById('show_product_image').src = window.URL.createObjectURL(this.files[0])
         "
        >
      </div>
      <div class="mb-3">
        <label for="product_price" class="form-label">Product Price</label>
        <div class="input-group">
          <span class="input-group-text">Rp.</span>
          <input type="number" class="form-control" id="product_price" aria-describedby="product_price_Help"
           name="product_price" value= @if(old('product_price')) {{ old('product_price') }}  @elseif(count($product) > 0) "{{ $product[0]->product_price }}" @endif
          >
          <span class="input-group-text">.00</span>
        </div>
      </div>
      <div class="mb-3">
        <label for="product_stock" class="form-label">Product Stock</label>
        <div class="input-group">
          <span class="input-group-text">Qty</span>
          <input name="product_stock" min="0" type="number" class="form-control" id="product_stock" aria-describedby="product_stock_Help"
            value=@if(old('product_stock')) {{ old('product_stock') }}  @elseif(count($product) > 0) "{{ $product[0]->product_quantity }}" @endif
          >
          <span class="input-group-text">Pcs</span>
        </div>
      </div>
      <div class="mb-3">
        <label for="product_status" class="form-label">Product Status</label>
        <div class="form-check">
          <input name="product_status" type="checkbox" class="form-check-input" id="product_status" 
           @checked((count($product) > 0 && Str::lower($product[0]->product_status) == "active" ) || old('product_status') != null)
          >
          <label class="form-check-label" for="product_status">Active</label>
        </div>
        <div id="product_status_Help" class="form-text">Inactive Product won't be showed in Customer's Customized Order Page</div>
      </div>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary px-4">Submit</button>
      </div>

      <br/>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul class="mb-0">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    </form>
  </div>
</div>
@endsection