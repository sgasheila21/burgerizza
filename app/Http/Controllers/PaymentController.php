<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();

        return view('payment.index', compact('paymentMethods'));
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
