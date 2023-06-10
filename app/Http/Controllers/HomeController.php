<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    // index
    public function index(){
        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        return view('home')->with('categories',$categories);
    }
}
