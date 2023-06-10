<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
                ->with('category_id',$category_id)
                ->with('attribute',$attribute)
                ->with('attribute_id',$attribute_id);
    }

    public function postAttribute(Request $request){
        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        $category_id = $request->category_id;
        $attribute_id = $request->attribute_id;
    
        // dd($request->product_image);
        $validateData = $request->validate([
            'attribute_name' => 'required|max:100',
        ],
        [
            'attribute_name.required' => 'The Product Name field is required',
            'attribute_name.max' => 'The maximum length of Product Name field is 100 characters.',
        ]);

        
        if($attribute_id == "add"){
            $attribute = Attribute::create([
                'category_id' => $category_id,
                'attribute_name' => $request->attribute_name,
                'attribute_description' => $request->attribute_description,
                'attribute_order' => 99,
                'attribute_status' => $request->attribute_status == null ? "inactive" : "active",
                'multiple_choice' => $request->multiple_choice == null ? false : true,
            ]);
            
            session()->put("success", "Success to add the attribute!");
        }
        else {
            $attribute = Attribute::findOrFail($attribute_id);

            if($attribute){
                $attribute->attribute_name =  $request->attribute_name;
                $attribute->attribute_description =  $request->attribute_description;
                $attribute->attribute_order = 99;
                $attribute->attribute_status = $request->attribute_status == null ? "inactive" : "active";
                $attribute->multiple_choice = $request->multiple_choice == null ? false : true;
    
                $attribute->save();
                session()->put("success", "Success to update the attribute!");
            }
            else {
                session()->put("error", "Attribute not found!");
            }
        }
        
        
        $attribute = Attribute::findOrFail($attribute_id);
        $category = Category::findOrFail($attribute->category_id);
        
        return redirect( "customize-order/". Str::lower(str_replace(' ', '', $category->category_name)) )
                            ->with('categories',$categories)
                            ->with('attribute_id',$attribute_id)
                            ;
    }
    public function deleteAttribute(Request $request){
        $category_id = $request->category_id;
        $attribute_id = $request->attribute_id;

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
                     ->delete();
        
        session()->put('success','Success to delete attribute!');

        return redirect()->back();
    }
}
