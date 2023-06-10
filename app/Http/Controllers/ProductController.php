<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request){
        $profile = Auth::user();
        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        $attribute_id = $request->attribute_id;
        $product_id = $request->product_id;

        $attribute = Attribute::findOrFail($attribute_id);

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
        
        if(is_null($request['product_image'])){
            unset($request['product_image']);
        }
    
        // dd($request->product_image);
        $validateData = $request->validate([
            'product_name' => 'required|max:100',
            'product_image' => 'sometimes|required|image|mimes:jpeg,jpg,png|max:10240',
            'product_price' => 'required',
            'product_stock' => 'required|min:0',
        ],
        [
            'product_name.required' => 'The Product Name field is required',
            'product_name.max' => 'The maximum length of Product Name field is 100 characters.',
            'product_image.image' => 'The product image must be an image file.',
            'product_image.max' => 'The product image file size must be under 10MB.',
            'product_price.required' => 'The Product Price field is required.',
            'product_stock.required' => 'The Product Stock field is required',
            'product_stock.min' => 'The Product Stock field can not negative',
        ]);

        
        if($product_id == "add"){
            $product = Product::create([
                'attribute_id' => $attribute_id,
                // 'product_image' => $attribute_id,
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
        
        if($request->product_image != null){
            $path = $request->product_image->move('products/images/product_id/', $product->id);
            $link=url('products/images/product_id/'.$product->id);
            
            $product->product_image_path = $link;
        }
        
        $product->save();
        
        $attribute = Attribute::findOrFail($attribute_id);
        $category = Category::findOrFail($attribute->category_id);
        
        return redirect( "customize-order/". Str::lower(str_replace(' ', '', $category->category_name)) )
                            ->with('categories',$categories)
                            ->with('product_id',$product_id)
                            ->with('attribute_id',$attribute_id)
                            ->with('product',$product)
        ;
    }
    public function deleteProduct(Request $request){
        $attribute_id = $request->attribute_id;
        $product_id = $request->product_id;

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
                    ->delete();

                    session()->put('success','Success to delete product!');
                    
        // $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        // $attribute = Attribute::findOrFail($attribute_id);
        // $category = Category::findOrFail($attribute->category_id);
        
        // return redirect( "customize-order/". Str::lower(str_replace(' ', '', $category->category_name)) )
        //                      ->with('categories',$categories)
        //                      ->with('product_id',$product_id)
        //                      ->with('attribute_id',$attribute_id)
        //                      ->with('product',$product)
        // ;

        return redirect()->back();
    }
}
