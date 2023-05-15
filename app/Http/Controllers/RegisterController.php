<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // index
    public function index(){
        return view('register');
    }
}
