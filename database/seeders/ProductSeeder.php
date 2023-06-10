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
        DB::table('products')->insert([
            'attribute_id' => 1,
            'product_name' => 'Medium (8 Slice)',
            'product_image_path' => null,
            'product_description' => 'Servings : 2-3',
            'product_price' => 32000,
            'product_quantity' => 0,
            'product_status' => 'inactive',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 1,
            'product_name' => 'Large (10 Slice)',
            'product_image_path' => null,
            'product_description' => 'Servings : 3-4',
            'product_price' => 35000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);

        DB::table('products')->insert([
            'attribute_id' => 2,
            'product_name' => 'Regular',
            'product_image_path' => null,
            'product_description' => null,
            'product_price' => 0,
            'product_quantity' => 999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 2,
            'product_name' => 'Charcoal',
            'product_image_path' => null,
            'product_description' => null,
            'product_price' => 2500,
            'product_quantity' => 999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 2,
            'product_name' => 'Whole Wheat Dough',
            'product_image_path' => null,
            'product_description' => null,
            'product_price' => 2500,
            'product_quantity' => 0,
            'product_status' => 'inactive',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 3,
            'product_name' => 'DAIRY FREE MOZZARELLA',
            'product_image_path' => null,
            'product_description' => null,
            'product_price' => 2500,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
    }
}
