<?php
namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;
use App\Models\Product;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carts = [
            [
                'name' => '*****',
                'description' => '*****',
                'image' => '*****',
                'price' => 100
            ],

            [
                'name' => '*****',
                'description' => '*****',
                'image' => '*****',
                'price' => 500
            ],

            [
                'name' => '*****',
                'description' => '*****',
                'image' => '*****',
                'price' => 400
            ],

            [
                'name' => '*****',
                'description' => '*****',
                'image' => '*****',
                'price' => 200
            ]

        ];

  

        foreach ($carts as $key => $value) {
            Cart::create($value);
        }
    }
}