<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;

class CustomizeOrderController extends Controller
{
    // index
    public function index(Request $request){
        // dd($request->category_name);
        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');

        $selectedCategory = Category::join('attributes','attributes.category_id','=','categories.id')
                            ->join('products','products.attribute_id','=','attributes.id')
                            ->where( str_replace(' ','',strtolower('categories.category_name')), 
                                     '=', $request->category_name )
                            ->selectRaw('
                                    categories.category_name,

                                    attributes.attribute_name,
                                    attributes.multiple_choice,

                                    products.product_name,
                                    products.product_price,
                                    products.product_quantity,
                              ')
                            ->get();

        // $attributes = Attribute::
        dd($selectedCategory);
        return view('customize-order')
                ->with('categories',$categories);
    }
}
