<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            'payment_methods_name' => "VA BCA",
            'payment_methods_description' => null,
            'payment_methods_image_path' => 'http://127.0.0.1:8000/payment_methods/VA BCA.jpg',
            'payment_methods_status' => 'active'
        ]);
        PaymentMethod::create([
            'payment_methods_name' => "VA BRI",
            'payment_methods_description' => null,
            'payment_methods_image_path' => 'http://127.0.0.1:8000/payment_methods/VA BRI.jpg',
            'payment_methods_status' => 'active'
        ]);
        PaymentMethod::create([
            'payment_methods_name' => "SHOPEEPAY",
            'payment_methods_description' => null,
            'payment_methods_image_path' => 'http://127.0.0.1:8000/payment_methods/SHOPEE_PAY.png',
            'payment_methods_status' => 'active'
        ]);
        PaymentMethod::create([
            'payment_methods_name' => "OVO",
            'payment_methods_description' => null,
            'payment_methods_image_path' => 'http://127.0.0.1:8000/payment_methods/OVO.jpg',
            'payment_methods_status' => 'active'
        ]);
        PaymentMethod::create([
            'payment_methods_name' => "GOPAY",
            'payment_methods_description' => null,
            'payment_methods_image_path' => 'http://127.0.0.1:8000/payment_methods/GOPAY.jpg',
            'payment_methods_status' => 'active'
        ]);
    }
}
