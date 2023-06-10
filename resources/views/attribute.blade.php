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
    {{$attribute_id == "add" ? "ADD NEW " : "EDIT "}}  
    ATTRIBUTE in
    {{ DB::table('categories')->where('id','=',$category_id)->get()[0]->category_name }}'s Attribute
  </h1>
  <div>
    <form method="POST" action="{{ url($category_id.'/attribute/'.$attribute_id) }}" class="form-control-lg">
      @csrf
      <div class="mb-3">
        <label for="attribute_name" class="form-label">Attribute Name</label>
        <input type="attribute_name" class="form-control" id="attribute_name" aria-describedby="attribute_name_Help"
         name="attribute_name" value= @if (count($attribute) > 0) "{{ $attribute[0]->attribute_name }}" @elseif(old('attribute_name')) "{{old('attribute_name')}}" @endif
        >
        <div id="attribute_name_Help" class="form-text">Please do not insert existing attribute name.</div>
      </div>
      <div class="mb-3">
        <label for="attribute_description" class="form-label">Attribute Description</label>
        <textarea name="attribute_description" class="form-control" aria-label="With textarea" id="attribute_description" aria-describedby="attribute_description_Help">@if (count($attribute) > 0) {{ $attribute[0]->attribute_description }} @elseif(old('attribute_description')) "{{ old('attribute_description') }}" @endif</textarea>
        <div id="attribute_name_Help" class="form-text">Attribute Description won't be showed in Customized Order. Thus you can skip this field.</div>
      </div>
      <div class="mb-3">
        <label for="attribute_multiple_choice" class="form-label">Attribute allow pick more than one products</label>
        <div class="form-check">
          <input name="attribute_multiple_choice" type="checkbox" class="form-check-input" id="attribute_multiple_choice" 
           @checked((count($attribute) > 0 && Str::lower($attribute[0]->multiple_choice) == true ) || old('attribute_multiple_choice') != null)
          >
          <label class="form-check-label" for="attribute_multiple_choice">Allowed</label>
        </div>
      </div>
      <div class="mb-3">
        <label for="attribute_status" class="form-label">Attribute Status</label>
        <div class="form-check">
          <input name="attribute_status" type="checkbox" class="form-check-input" id="attribute_status" 
           @checked((count($attribute) > 0 && Str::lower($attribute[0]->attribute_status) == "active" ) || old('attribute_status') != null)
          >
          <label class="form-check-label" for="attribute_status">Active</label>
          <div id="attribute_status_Help" class="form-text">Inactive Attribute won't be showed in Customer's Customized Order Page</div>
        </div>
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