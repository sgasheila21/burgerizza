<?php

namespace Database\Seeders;

use App\Models\CartDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CartDetail::insert([
            'cart_header_id' => 1,
            'product_id' => 1,
            'quantity' => 1,
        ]);
        CartDetail::insert([
            'cart_header_id' => 1,
            'product_id' => 6,
            'quantity' => 1,
        ]);
        CartDetail::insert([
            'cart_header_id' => 1,
            'product_id' => 8,
            'quantity' => 1,
        ]);

        CartDetail::insert([
            'cart_header_id' => 2,
            'product_id' => 3,
            'quantity' => 1,
        ]);
        CartDetail::insert([
            'cart_header_id' => 2,
            'product_id' => 7,
            'quantity' => 1,
        ]);
    }
}
