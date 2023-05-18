<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    // index
    public function index(){
        return view('about-us');
    }
}
