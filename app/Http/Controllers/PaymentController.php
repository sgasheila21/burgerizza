<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $profile = Auth ::user();
        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        $paymentMethods = PaymentMethod::all()->where(strtolower("payment_methods_status"),"=","active");

        return view('payment', compact('paymentMethods','profile','categories'));
    }

    public function process(Request $request)
    {
        // Validasi input
        $request->validate([
            'payment_method' => 'required',
            'payment_amount' => 'required|numeric',
        ]);

        // Proses pembayaran

        // Redirect atau tampilkan halaman konfirmasi pembayaran
    }
}
