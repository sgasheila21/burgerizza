<?php

namespace App\Http\Controllers;

use App\Models\CartHeader;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function quantityUpdate(Request $request, $id){
        $cart = CartHeader::find($id);
        if($request->has('decrementBtn') || $request->has('incrementBtn')){
            $cart->quantity = $request->quantity;
            $cart->save();
        }
        else if($request->has('trashBtn')){
            $cart->delete();
        }

        return redirect()->back();
    }

    public function checkoutCart(Request $request){
        $carts = CartHeader::where('member_id',auth()->user()->id)->get();
        
        foreach($carts as $cart){
            $inserted = ChartHeader::create([
                'User_id' => auth()->user()->id,
                'product_id' => $cart->products->id,
                'quantity' => $cart->quantity
            ]);

            $deleted = $cart->delete();
        }
        if($inserted && $deleted){
            return redirect('/products')->with('success', 'Checkout Successfully!');
        }
        else{
            return redirect('/products')->with('failure', 'Failed to Checkout!');
        }
    }
}
