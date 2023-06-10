<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'attribute_id' => 1,
            'product_name' => 'Personal (4 Slice)',
            'product_image_path' => null,
            'product_description' => 'Servings: 1',
            'product_price' => 20000,
            'product_quantity' => 999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 1,
            'product_name' => 'Small (6 Slice)',
            'product_image_path' => null,
            'product_description' => 'Servings : 1-2',
            'product_price' => 28000,
            'product_quantity' => 999,
            'product_status' => 'active',
        ]);
    }
}
