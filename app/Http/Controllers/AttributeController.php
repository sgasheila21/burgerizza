<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(Request $request){
        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        $category_id = $request->category_id;
        $attribute_id = $request->attribute_id;

        $category = Category::select(
            'id',
            'category_name',
            'category_description',
            'category_status'
        )->where('id', '=', $category_id)
        ->get();
        
        $attribute = Attribute::select(
                        'id',
                        'category_id',
                        'attribute_name',
                        'attribute_description',
                        'attribute_order',
                        'attribute_status',
                        'multiple_choice'
                     )->where('category_id', '=', $category_id)
                     ->where('id', '=', $attribute_id)
                     ->get();

        if($attribute_id != "add" && ($category->count() < 1 || $attribute->count() < 1)){
            session()->put('error', 'Page not found!');
            return redirect('home');
        }

        return view('attribute')
                ->with('categories',$categories)
                ->with('attribute_id',$attribute_id);
    }
}
