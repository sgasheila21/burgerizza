<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\CartDetail;
use App\Models\CartHeader;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function addToCart(Request $request){
        $profile = Auth::user();
        $data = request()->all();

        //Validate Radio button
        foreach ($data as $key => $value) {
            if(Str::contains($key, 'attribute_id_')){
                if($value == "null"){
                    return redirect()->back()
                    ->withErrors('The Pick 1 Product field is required.')
                    ->withInput();
                }
            }
            else if($value == end($data) && !Str::contains($key, 'attribute_id_')){
                return redirect()->back()
                ->withErrors('Can not add empty product into cart!')
                ->withInput();
            }
        }

        $cart_header = CartHeader::create([
            'user_id' => $profile->id,
            'category_id' => $data['category_id'],
            'quantity' => 1,
        ]);

        foreach ($data as $key => $value) {
            if(Str::contains($key, 'attribute_id_')){
                if(is_string($value)){
                    CartDetail::create([
                        'cart_header_id' => $cart_header->id,
                        'product_id' => $value,
                        'quantity' => 1,
                    ]);

                }
                else {
                    foreach ($value as $key_prod => $value_prod) {
                        if($value_prod != "0"){
                            CartDetail::create([
                                'cart_header_id' => $cart_header->id,
                                'product_id' => $key_prod,
                                'quantity' => $value_prod,
                            ]);
                        }
                    }
                }
            }
        }

        session()->put('success','Success Added Into Cart');
        return redirect('cart');
    }
}
