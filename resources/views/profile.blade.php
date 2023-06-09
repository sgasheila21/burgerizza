@extends('template/layout-two')
@section('title', 'Profile')


<style>
    body { 
        background: url("/assets/bg.jpg") no-repeat fixed center; 
        background-size: 100%;
    }
    </style>

@section('sub-content')
    <div class="form-03-main overflow-auto">
        <form action="{{ url('logout') }}" method="POST">
            @csrf
            <button class="_btn_04" type="submit">
                Logout
            </button>
        </form>
    </div>
    <br>
    <form class="form-03-main overflow-auto" action="{{ route('edit-profile') }}" method="POST">
        @csrf
        <h1>Edit Profile</h1>
        <div class="form-group">
            <label for="username">USERNAME</label>
            <input type="text" name="username" class="form-control _ge_de_ol" placeholder="{{$user->username}}"  >
        </div>
        <div class="form-group">
        <label for="email">EMAIL</label>
        <input type="email" name="email" class="form-control _ge_de_ol" placeholder="{{$user->email}}" >
        </div>
        <div class="form-group">
            <label for="phone_number">PHONE NUMBER</label>
            <input type="text" name="phone_number" class="form-control _ge_de_ol" placeholder="{{$user->phone_number}}">
        </div>
        <br>
        <div class="form-group">
        <button class="_btn_04" type="submit">
            Edit Profile
        </button>

       
        @if(session('successprofile'))
            <div class="alert alert-success">
                {{ session('successprofile') }}
            </div>
        @endif




        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        </div>
    </form>

    <br>

    <form class="form-03-main overflow-auto" action="{{ route('update-password') }}" method="POST">
        <h1>Update Password</h1>
        @csrf
        <div class="form-group">
            <label for="o_password">OLD PASSWORD</label>
            <input type="password" name="o_password" class="form-control _ge_de_ol" placeholder="Input your password here" required="" aria-required="true">
        </div>
        <div class="form-group">
            <label for="n_password">NEW PASSWORD</label>
            <input type="password" name="n_password" class="form-control _ge_de_ol" placeholder="Input your password here" required="" aria-required="true">
        </div>
        <div class="form-group">
            <label for="cn_password">CONFIRM NEW PASSWORD</label>
            <input type="password" name="cn_password" class="form-control _ge_de_ol" placeholder="Input your confirm password here" required="" aria-required="true">
        </div>
        <br>
        <div class="form-group">
        <button class="_btn_04" type="submit">
            Change Password
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

        @if(session('successpass'))
            <div class="alert alert-success">
                {{ session('successpass') }}
            </div>
        @endif

        </div>
    </form>






@endsection {{-- end of sub-content section--}}