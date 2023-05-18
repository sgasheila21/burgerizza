@extends('template/layout-one')
@section('title', 'LOGIN')

@section('sub-content')
  <div class="_lk_de">
    <div class="form-03-main bg_burgerizza"></div>
    <form class="form-03-main">
      <div class="form-group">
          <label for="email">EMAIL</label>
          <input type="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="Input your email here" required="" aria-required="true">
      </div>
      
      <div class="form-group">
          <label for="password">PASSWORD</label>
          <input type="password" name="password" class="form-control _ge_de_ol" type="text" placeholder="Input your password here" required="" aria-required="true">
      </div>
      <div class="form-group">
        <button class="_btn_04">
          <a href="#">LOGIN</a>
        </button>
        <p>Doesn’t have an account ? 
          <a href="{{ url('register') }}">Register Here</a>  
        </p>
      </div>
    </form>
  </div>
@endsection {{-- end of sub-content section--}}