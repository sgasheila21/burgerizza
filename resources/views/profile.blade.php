@extends('template/layout-two')
@section('title', 'Profile')


<style>
    body { 
        background: url("/assets/bg.jpg") no-repeat fixed center; 
        background-size: 100%;
    }
    </style>

@section('sub-content')
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('failure'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('failure') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->edit_errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Update Failed! Validation Incorect!</strong>
        <ul class="mb-0">
        @foreach ($errors->edit_errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

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
        @if ($errors->errors_profile->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->errors_profile->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif  
        <div class="form-group">
        <button class="_btn_04" type="submit">
            Edit Profile
        </button>
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

        @if ($errors->errors_password->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->errors_password->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        </div>
    </form>

    @if(auth()->user()->role->name == "Customer")
    <br>

    <div class="form-03-main overflow-auto">
        <h1>Address</h1>
        <!-- ADD ADDRESS -->
        <button id="showModal" data-bs-toggle="modal" data-bs-target="#popUpAddress">Add Address</button>
        <form action="{{ route('add-address') }}" method="POST">
        @csrf
        <div class="modal fade" id="popUpAddress" tabindex="-1" aria-labelledby="popUpAddress" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popUpAddress">Main Address</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">NAME:</label>
                            <input type="text" name="name" id="name" placeholder="Input recipient's name here" class="form-control _ge_de_ol" aria-required="true">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">PHONE NUMBER:</label>
                            <input type="text" name="phone_number" id="phone_number" placeholder="Input recipient's phone number here" class="form-control _ge_de_ol" aria-required="true">
                        </div>
                        <div class="form-group">
                            <label for="address">ADDRESS:</label>
                            <input type="text" name="address" id="address" placeholder="Input recipient's address here" class="form-control _ge_de_ol" aria-required="true" style="height:15vh">
                        </div>
                    </div>
                    @if ($errors->add_errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->add_errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="btnSave">Save</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" name="btnCancel" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        </form>

        @foreach($addresses as $address)
        <div class="form-group">
            @if($address->is_main == 1)
            <label style="color:red">MAIN ADDRESS</label>
            <br>
            @endif
            <label for="name">NAME:</label>
            <span name="name" class="form-control _ge_de_ol">{{ $address->name }}</span>
        </div>
        <div class="form-group">
            <label for="phone_number">PHONE NUMBER:</label>
            <span name="phone_number" class="form-control _ge_de_ol">{{ $address->phone_number }}</span>
        </div>
        <div class="form-group">
            <label for="address">ADDRESS:</label>
            <span name="address" class="form-control _ge_de_ol">{{ $address->address }}</span>
        </div>
        <div class="my-1 d-flex">
            <!-- EDIT ADDRESS -->
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmUpdateModal{{ $address->id }}">Edit</a>
            <form action="{{ route('edit-address', ['id' => $address->id]) }}" method="POST">
                @csrf
                <div class="modal fade" id="confirmUpdateModal{{ $address->id }}" tabindex="-1" aria-labelledby="confirmUpdateModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmUpdateModalLabel">Update Address</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">NAME:</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $address->name) }}" class="form-control _ge_de_ol" aria-required="true">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">PHONE NUMBER:</label>
                                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $address->phone_number) }}" class="form-control _ge_de_ol" aria-required="true">
                                </div>
                                <div class="form-group">
                                    <label for="address">ADDRESS:</label>
                                    <input type="text" name="address" id="address" value="{{ old('address', $address->address) }}" class="form-control _ge_de_ol" aria-required="true" style="height:15vh">
                                </div>
                                <div class="form-group mt-1">
                                    <input type="checkbox" name="isMain" id="flexCheckDefault{{ $address->id }}" @if(old('isMain', $address->is_main)) checked @endif>
                                    <label for="flexCheckDefault{{ $address->id }}">
                                        Main Address
                                    </label>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="btnSave">Save</button>
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="btnCancel">Cancel</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- DELETE ADDRESS -->
            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $address->id }}">Delete</a>
            <form action="{{ route('delete-address', ['id' => $address->id]) }}" method="POST">
                @csrf
                <div class="modal fade" id="confirmDeleteModal{{ $address->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Delete Confirmation</h5>
                            </div>
                            <div class="modal-body">
                                Are you sure want to delete this address?
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" data-bs-dismiss="modal" name="btnYes">Yes</button>
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="btnCancel">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <hr>
        @endforeach
    </div>
    @endif
@endsection {{-- end of sub-content section--}}