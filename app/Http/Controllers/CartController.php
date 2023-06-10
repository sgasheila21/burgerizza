<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartHeader;
use App\Models\Category;

class CartController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function index()
    {
        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        $carts = CartHeader::all();
        return view('cart', compact('carts'))->with('categories',$categories);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function cart()
    {

        return view('cart');

    }

    /**
     * Write code on Method
     *
     * @return response()
     */

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

  
    /**

     * Write code on Method

     *

     * @return response()

     */

    public function update(Request $request)

    {

        if($request->id && $request->quantity){

            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');

        }

    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function remove(Request $request)

    {

        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);

            }

            session()->flash('success', 'Product removed successfully');

        }

    }

}