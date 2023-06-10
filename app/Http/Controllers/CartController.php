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
    public function cart()
    {
        $profile = Auth::user();

        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        $user_addresses = Address::all()->where('user_id','=',$profile->id);

        $cart = CartHeader::join('categories', 'categories.id', '=', 'cart_headers.category_id')
            ->select('cart_headers.id','user_id','category_id','category_name','quantity')
            ->where('user_id','=',$profile->id)
            ->get();
                            
        return view('cart', compact([
            'categories','cart','user_addresses'
        ]));
    }
    
    public function goToPayment(Request $request){
        if(request()->deliveryAddress == "null"){
            return redirect()->back()
                ->withErrors('
                    You must set your delivery address first to continue to payment.
                    Go to Profile to Add Your Delivery Address.
                ')
                ->withInput();
        }
        
        return redirect('payment');
    }
}