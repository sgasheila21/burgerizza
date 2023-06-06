@extends('template/layout-one')
@section('title', 'REGISTER')

@section('sub-content')
  <div class="_lk_de">
    <div class="form-03-main bg_burgerizza"></div>
    <form class="h-100 form-03-main overflow-auto" action="{{ route('register-validation') }}" method="POST">
      @csrf
      <div class="form-group">
          <label for="username">USERNAME</label>
          <input type="text" name="username" class="form-control _ge_de_ol" placeholder="Input your username here" required="" aria-required="true" value="{{ old('username') }}">
      </div>
      <div class="form-group">
        <label for="email">EMAIL</label>
        <input type="email" name="email" class="form-control _ge_de_ol" placeholder="Input your email here" required="" aria-required="true" value="{{ old('email') }}">
      </div>
      <div class="form-group">
          <label for="phone_number">PHONE NUMBER</label>
          <input type="text" name="phone_number" class="form-control _ge_de_ol" placeholder="Input your phone number here" required="" aria-required="true" value="{{ old('phone_number') }}">
      </div>
      <div class="form-group">
          <label for="password">PASSWORD</label>
          <input type="password" name="password" class="form-control _ge_de_ol" placeholder="Input your password here" required="" aria-required="true">
      </div>
      <div class="form-group">
          <label for="c_password">CONFIRM PASSWORD</label>
          <input type="password" name="c_password" class="form-control _ge_de_ol" placeholder="Input your confirm password here" required="" aria-required="true">
      </div>
      <div class="form-group">
        <button class="_btn_04" type="submit">
          <a href="#">REGISTER</a>
        </button>

        @if ($errors->any())
          <div class="alert alert-danger">
              <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <p>Already have an account ? 
          <a href="{{ url('login') }}">Login Here</a>   
        </p>
      </div>
    </form>
  </div>
@endsection {{-- end of sub-content section--}}