<?php

namespace App\Http\Controllers;

use App\Models\CartHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function viewTransaction(){
        $profile = Auth::user();

        $transactionHeader = 
            CartHeader::join('users', 'users.id', '=', 'transaction_header.user_id')
                ->join('transaction_detail', 'transaction_detail.transaction_id', '=', 'transaction_header.transaction_id')
                ->join('products', 'products.product_id', '=', 'transaction_detail.product_id')
                ->join('locations', 'locations.location_id', '=', 'transaction_header.location_id')
                ->selectRaw('
                    users.full_name,

                    transaction_header.user_id,
                    transaction_header.transaction_id,
                    transaction_header.transaction_date,
                    transaction_header.transaction_status,
                    transaction_header.pick_up_date,
                    transaction_header.pick_up_status,

                    locations.location_city,
                    locations.location_address,

                    SUM(transaction_detail.quantity) as total_quantity,
                    SUM(transaction_detail.quantity * products.product_price) as total_price
                  ') 
                  
                ->orderBy('transaction_date')

                ->groupBy('full_name')
                ->groupBy('user_id')
                ->groupBy('transaction_id')
                ->groupBy('transaction_date')
                ->groupBy('transaction_status')
                ->groupBy('pick_up_date')
                ->groupBy('pick_up_status')
                ->groupBy('location_city')
                ->groupBy('location_address')

                ->get();
        
        return view('transaction', ['profile' => $profile, 'transactionHeader' => $transactionHeader]);
    }

    public function viewTransactionDetail($transaction_id){
        $profile = Auth::user();
        
        $transactionDetail = 
            CartHeader::join('users', 'users.id', '=', 'transaction_header.user_id')
                ->join('transaction_detail', 'transaction_detail.transaction_id', '=', 'transaction_header.transaction_id')
                ->join('products', 'products.product_id', '=', 'transaction_detail.product_id')
                ->join('locations', 'locations.location_id', '=', 'transaction_header.location_id')
                ->selectRaw('
                    users.full_name,
                    
                    transaction_header.user_id,
                    transaction_header.transaction_id,
                    transaction_header.transaction_date,
                    transaction_header.transaction_status,
                    transaction_header.pick_up_date,
                    transaction_header.pick_up_status,
                    
                    locations.location_city,
                    locations.location_address,

                    products.product_name,
                    products.product_price,
                    
                    SUM(transaction_detail.quantity) as sub_total_quantity,
                    SUM(transaction_detail.quantity * products.product_price) as sub_total
                  ') 
                 
                ->where('transaction_header.transaction_id', '=', $transaction_id)  
                ->orderBy('transaction_date')
                    
                ->groupBy('full_name')
                ->groupBy('user_id')
                ->groupBy('transaction_id')
                ->groupBy('transaction_date')
                ->groupBy('transaction_status')
                ->groupBy('product_name')
                ->groupBy('product_price')
                ->groupBy('pick_up_date')
                ->groupBy('pick_up_status')
                ->groupBy('location_city')
                ->groupBy('location_address')

                ->get();
        
        return view('transactiondetail', ['profile' => $profile, 'transactionDetail' => $transactionDetail]);
    }

    public function pickUpTransaction(Request $request){
        $validate = $request->validate([
            'transaction_id'  => ['required'],
        ]);

        if($validate){
            $transactionHeader = CartHeader::findOrFail($request->transaction_id);

            if($transactionHeader){
                $transactionHeader->pick_up_status = "Picked Up";
                $transactionHeader->pick_up_date = Carbon::now()->toDateTimeString();
                $transactionHeader->transaction_status = "Completed";

                $transactionHeader->save();
                
                session()->put('success','Success to pick up Transaction!');
                return redirect('/manage-transactions');
            }
            else {
                session()->put('error','Failed to pick up Transaction!');
                return redirect('/manage-transactions');
            }
        }
        else {
            session()->put('error','Failed to pick up Transaction!');
            return redirect('/manage-transactions');
        }
    }
}
