<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomizeOrderController extends Controller
{
    // index
    public function index(){
        return view('customize-order');
    }
}
