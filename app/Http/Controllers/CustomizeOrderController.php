<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomizeOrderController extends Controller
{
    // index
    public function index(Request $request){
        $profile = Auth::user();
        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        $category_id = Category::select('id')
                        ->where( str_replace(' ','',strtolower('categories.category_name')), 
                                 '=', $request->category_name )
                        ->get()[0]->id;
        
        $selectedCategory = Category::leftJoin('attributes','attributes.category_id','=','categories.id')
                            ->where( str_replace(' ','',strtolower('categories.category_name')), 
                                     '=', $request->category_name )
                            ->selectRaw('
                                    categories.id as category_id,
                                    categories.category_name,

                                    attributes.id as attribute_id,
                                    attributes.attribute_name,
                                    attributes.multiple_choice,
                                    attributes.attribute_order
                              ')
                            ->orderBy('attribute_order','asc')
                            ->get();

        return view('customize-order')
                ->with('category_id',$category_id)
                ->with('categories',$categories)
                ->with('selectedCategory',$selectedCategory)
                ->with('profile',$profile);
    }
}
