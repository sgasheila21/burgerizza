@extends('template/layout-one')
@section('title', 'LOGIN')

@section('sub-content')
  <div class="_lk_de">
    <div class="form-03-main bg_burgerizza"></div>
    <form class="form-03-main overflow-auto" action="{{ route('login-validation') }}" method="POST">
      @csrf
      <div class="form-group">
          <label for="email">EMAIL</label>
          <input type="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="Input your email here" required="" aria-required="true" value="{{ old('email') }}">
      </div>
      
      <div class="form-group">
          <label for="password">PASSWORD</label>
          <input type="password" name="password" class="form-control _ge_de_ol" type="text" placeholder="Input your password here" required="" aria-required="true" value="{{ old('password') }}">
      </div>
      
      <div class="form-group">
        <button class="_btn_04" type="submit" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
          LOGIN
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

        <p>Doesn’t have an account ? 
          <a href="{{ url('register') }}">Register Here</a>  
        </p>
      </div>
    </form>
  </div>
@endsection {{-- end of sub-content section--}}