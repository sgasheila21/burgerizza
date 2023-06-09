<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        $attribute_id = $request->attribute_id;
        $product_id = $request->product_id;

        $attribute = Attribute::select(
                        'id',
                        'category_id',
                        'attribute_name',
                        'attribute_description',
                        'attribute_order',
                        'attribute_status',
                        'multiple_choice'
                     )->where('id', '=', $attribute_id)
                     ->get();

        $product = Product::select(
                        'id',
                        'attribute_id',
                        'product_name',
                        'product_image_path',
                        'product_description',
                        'product_price',
                        'product_quantity',
                        'product_status'
                    )->where('attribute_id', '=', $attribute_id)
                    ->where('id', '=', $product_id)
                    ->get();

        if($product_id != "add" && ($attribute->count() < 1 || $product->count() < 1)){
            session()->put('error', 'Page not found!');
            return redirect('home');
        }

        return view('product')
        ->with('categories',$categories)
                ->with('attribute_id',$attribute_id)
                ->with('product',$product)
                ->with('product_id',$product_id);
    }

    public function postProduct(Request $request){
        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        $attribute_id = $request->attribute_id;
        $product_id = $request->product_id;

        $validateData = $request->validate([
            'product_name' => 'required|max:100',
            // 'product_image' => 'required',
            'product_price' => 'required',
            'product_stock' => 'required',
        ],
        [
            'product_name.required' => 'The Product Name field is required',
            'product_name.max' => 'The maximum length of Product Name field is 100 characters.',
            // 'product_image.required' => 'The product image field is required.',
            'product_price.required' => 'The Product Price field is required.',
            'product_stock.required' => 'The Product Stock field is required',
        ]);
        
        if($product_id == "add"){
            // dd($request);

            Product::insert([
                    'attribute_id' => $attribute_id,
                    // 'product_image_path' => $attribute_id,
                    'product_name' => $request->product_name,
                    'product_description' => $request->product_description,
                    'product_price' => $request->product_price,
                    'product_quantity' => $request->product_stock,
                    'product_status' => $request->product_status == null ? "inactive" : "active",
                ]);

            session()->put("success", "Success to add the product!");
        }
        else {
            $product = Product::findOrFail($product_id);

            if($product){
                $product->product_name =  $request->product_name;
                $product->product_description =  $request->product_description;
                $product->product_price =  $request->product_price;
                $product->product_quantity =  $request->product_stock;
                $product->product_status =  $request->product_status == null ? "inactive" : "active";
    
                $product->save();
    
                session()->put("success", "Success to update the product!");
            }
            else {
                session()->put("error", "Product not found!");
            }
        }

        $product=[];
        return view('product')
                ->with('categories',$categories)
                ->with('product_id',$product_id)
                ->with('attribute_id',$attribute_id)
                ->with('product',$product)
                ;
    }
}
