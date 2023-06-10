<?php
namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartHeader;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function cart()
    {
        $profile = Auth::user();

        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        $user_addresses = Address::all()->where('user_id','=',$profile->id);

        $cart = CartHeader::join('categories', 'categories.id', '=', 'cart_headers.category_id')
            ->select('cart_headers.id','user_id','category_id','category_name','quantity')
            ->where('user_id','=',$profile->id)->get();
                            
        return view('cart', compact([
            'categories','cart','user_addresses'
        ]));
    }

    public function addToCart($id)
    {

        $cart = Cart::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {
            $cart[$id] = [
                "name" => $cart->name,
                "quantity" => 1,
                "price" => $cart->price,
                "image" => $cart->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

}