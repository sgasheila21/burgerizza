<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand m-0 p-0" href="{{ url('home') }}">
      <img src="{{ asset('assets/images/navbar_logo_img_no_bg.png') }}" alt="Burgerizza Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" aria-current="page" href="{{ url('home') }}">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ (request()->is('customize-order')) ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{-- <a class="nav-link dropdown-toggle {{ (request()->is('customize-order/*')) ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> --}}
            Customize Order
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ url('customize-order') }}">Pizza</a></li>
            <li><a class="dropdown-item" href="{{ url('customize-order') }}">Burger</a></li>
            <li><a class="dropdown-item" href="{{ url('customize-order') }}">Drink</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('about-us')) ? 'active' : '' }}" href="{{ url('about-us') }}">About Us</a>
        </li>
        <li class="nav-item ms-4">
          <a class="nav-link me-2 pe-0" href="#">
            <img src="{{ asset('assets/icon/user_icon.svg') }}" alt="user">
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link ms-0 ps-0" href="#">
            <img src="{{ asset('assets/icon/shopping_cart_icon.svg') }}" alt="shopping cart">
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>