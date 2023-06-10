<?php

namespace App\Http\Controllers;

use App\Models\CartHeader;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\TransactionHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    
    //
    
    public function viewTransaction(){
        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        $profile = Auth::user();
        
        $transactionHeader = 
        TransactionHeader::join('users', 'users.id', '=', 'transaction_headers.user_id')
        ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transaction_headers.id')
        ->join('products', 'products.id', '=', 'transaction_details.product_id')
        ->join('addresses', 'addresses.id', '=', 'transaction_headers.address_id')
        ->selectRaw('
        users.username,
        
        transaction_headers.user_id,
        transaction_headers.id,
        transaction_headers.transaction_date,
        transaction_headers.transaction_status,
        transaction_headers.payment_date,
        transaction_headers.payment_date,
        
        addresses.name,
        addresses.address,
        
        SUM(transaction_details.quantity) as total_quantity,
        SUM(transaction_details.quantity * products.product_price) as total_price
        ') 
        
        ->orderBy('transaction_date')
        
                ->groupBy('username')
                ->groupBy('user_id')
                ->groupBy('transaction_headers.id')
                ->groupBy('transaction_date')
                ->groupBy('transaction_status')
                ->groupBy('payment_date')
                ->groupBy('payment_status')
                ->groupBy('name')
                ->groupBy('address')
                
                ->get();
                
                return view('transaction', ['profile' => $profile, 'transactionHeader' => $transactionHeader])->with('categories',$categories);
            }
            
            public function viewTransactionDetail($transaction_id){
                $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
                $profile = Auth::user();
                
                $transactionDetail = 
                CartHeader::join('users', 'users.id', '=', 'transaction_headers.user_id')
                ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transaction_headers.id')
                ->join('products', 'products.id', '=', 'transaction_details.product_id')
                ->join('addresses', 'addresses.id', '=', 'transaction_headers.address_id')
                ->selectRaw('
                users.username,
                
                transaction_headers.user_id,
                transaction_headers.id,
                transaction_headers.transaction_date,
                transaction_headers.transaction_status,
                transaction_headers.payment_date,
                transaction_headers.payment_status,
                
                addresses.name,
                addresses.address,
                
                products.product_name,
                products.product_price,
                
                SUM(transaction_details.quantity) as sub_total_quantity,
                SUM(transaction_details.quantity * products.product_price) as sub_total
                ') 
                
                ->where('transaction_headers.id', '=', $transaction_id)  
                ->orderBy('transaction_date')
                
                ->groupBy('username')
                ->groupBy('user_id')
                ->groupBy('transaction_headers.id')
                ->groupBy('transaction_date')
                ->groupBy('transaction_status')
                ->groupBy('product_name')
                ->groupBy('product_price')
                ->groupBy('payment_date')
                ->groupBy('payment_status')
                ->groupBy('name')
                ->groupBy('address')
                
                ->get();
                
                return view('transactiondetail', ['profile' => $profile, 'transactionDetail' => $transactionDetail])->with('categories',$categories);
            }
            
            public function payTransaction(Request $request){
                $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
                $validate = $request->validate([
                    'transaction_id'  => ['required'],
                ]);
                
                if($validate){
                    $transactionHeader = CartHeader::findOrFail($request->transaction_id);
                    
                    if($transactionHeader){
                        $transactionHeader->payment_status = "Paid";
                        $transactionHeader->payment_date = Carbon::now()->toDateTimeString();
                        $transactionHeader->transaction_status = "Completed";

                $transactionHeader->save();
                
                session()->put('success','Success to paid Transaction!');
                return redirect('/manage-transactions')->with('categories',$categories);
            }
            else {
                session()->put('error','Failed to paid Transaction!');
                return redirect('/manage-transactions')->with('categories',$categories);
            }
        }
        else {
            session()->put('error','Failed to paid Transaction!');
            return redirect('/manage-transactions')->with('categories',$categories);
        }
    }
}
