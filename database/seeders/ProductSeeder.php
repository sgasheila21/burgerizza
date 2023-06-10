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
        // Pizza 
        // Size
        DB::table('products')->insert([
            'attribute_id' => 1,
            'product_name' => 'Personal (4 Slice)',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/PERSONAL.png',
            'product_description' => 'Servings: 1',
            'product_price' => 20000,
            'product_quantity' => 999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 1,
            'product_name' => 'Small (6 Slice)',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/SMALL.png',
            'product_description' => 'Servings : 1-2',
            'product_price' => 28000,
            'product_quantity' => 999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 1,
            'product_name' => 'Medium (8 Slice)',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/MEDIUM.png',
            'product_description' => 'Servings : 2-3',
            'product_price' => 32000,
            'product_quantity' => 0,
            'product_status' => 'inactive',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 1,
            'product_name' => 'Large (10 Slice)',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/LARGE.png',
            'product_description' => 'Servings : 3-4',
            'product_price' => 35000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);

        // Dough
        DB::table('products')->insert([
            'attribute_id' => 2,
            'product_name' => 'Regular',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/REGULAR.jpg',
            'product_description' => null,
            'product_price' => 0,
            'product_quantity' => 999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 2,
            'product_name' => 'Charcoal',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/CHARCOAL.jpg',
            'product_description' => null,
            'product_price' => 2500,
            'product_quantity' => 999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 2,
            'product_name' => 'Whole Wheat',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/WHOLE WHEAT.jpg',
            'product_description' => null,
            'product_price' => 2500,
            'product_quantity' => 0,
            'product_status' => 'inactive',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 2,
            'product_name' => 'GLUTEN FREE MULTIGRAIN',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/GLUTEN FREE MULTIGRAIN.jpg',
            'product_description' => null,
            'product_price' => 4500,
            'product_quantity' => 999,
            'product_status' => 'active',
        ]);

        // Cheese
        DB::table('products')->insert([
            'attribute_id' => 3,
            'product_name' => 'DAIRY FREE MOZZARELLA',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/DAIRY FREE MOZZARELLA.jpg',
            'product_description' => null,
            'product_price' => 2500,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 3,
            'product_name' => 'MOZZARELLA',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/MOZZARELLA.jpg',
            'product_description' => null,
            'product_price' => 3000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 3,
            'product_name' => 'PARMIGIANO',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/PARMIGIANO.jpg',
            'product_description' => null,
            'product_price' => 4000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 3,
            'product_name' => 'ASIAGO',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/ASIAGO.jpg',
            'product_description' => null,
            'product_price' => 4200,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 3,
            'product_name' => 'CHEDDAR',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/CHEDDAR.jpg',
            'product_description' => null,
            'product_price' => 4200,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 3,
            'product_name' => 'FETA',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/FETA.jpg',
            'product_description' => null,
            'product_price' => 4200,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 3,
            'product_name' => 'GOAT CHEESE',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/GOAT CHEESE.jpg',
            'product_description' => null,
            'product_price' => 4000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);

        DB::table('products')->insert([
            'attribute_id' => 3,
            'product_name' => 'GOAT CHEESE',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/GOAT CHEESE.jpg',
            'product_description' => null,
            'product_price' => 4000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        
        //Protein
        DB::table('products')->insert([
            'attribute_id' => 4,
            'product_name' => 'ANCHOVIES',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/ANCHOVIES.jpg',
            'product_description' => null,
            'product_price' => 9000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 4,
            'product_name' => 'BACON',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/BACON.jpg',
            'product_description' => null,
            'product_price' => 7000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 4,
            'product_name' => 'GRILLED CHICKEN',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/GRILLED CHICKEN.jpg',
            'product_description' => null,
            'product_price' => 6000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 4,
            'product_name' => 'GROUND BEEF',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/GROUND BEEF.jpg',
            'product_description' => null,
            'product_price' => 12000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 4,
            'product_name' => 'HOT SOPPRESSATA',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/HOT SOPPRESSATA.jpg',
            'product_description' => null,
            'product_price' => 9000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 4,
            'product_name' => 'PEPPERONI',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/PEPPERONI.jpg',
            'product_description' => null,
            'product_price' => 2000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 4,
            'product_name' => 'SMOKED HAM',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/SMOKED HAM.jpg',
            'product_description' => null,
            'product_price' => 4000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 4,
            'product_name' => 'SPICY SAUSAGE',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/SPICY SAUSAGE.jpg',
            'product_description' => null,
            'product_price' => 7500,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);

        //Vegetables
        DB::table('products')->insert([
            'attribute_id' => 5,
            'product_name' => 'BLACK OLIVES',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/BLACK OLIVES.jpg',
            'product_description' => null,
            'product_price' => 1000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 5,
            'product_name' => 'BROCCOLI',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/BROCCOLI.jpg',
            'product_description' => null,
            'product_price' => 500,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 5,
            'product_name' => 'FRESH MUSHROOMS',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/FRESH MUSHROOMS.jpg',
            'product_description' => null,
            'product_price' => 1000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 5,
            'product_name' => 'GREEN OLIVES',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/GREEN OLIVES.jpg',
            'product_description' => null,
            'product_price' => 1500,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 5,
            'product_name' => 'GREEN PEPPERS',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/GREEN PEPPERS.jpg',
            'product_description' => null,
            'product_price' => 2000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 5,
            'product_name' => 'HOT HONEY',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/HOT HONEY.jpg',
            'product_description' => null,
            'product_price' => 1000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 5,
            'product_name' => 'PINEAPPLE',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/PINEAPPLE.jpg',
            'product_description' => null,
            'product_price' => 2000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 5,
            'product_name' => 'PLANT-BASED PEPPERONI',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/PLANT-BASED PEPPERONI.jpg',
            'product_description' => null,
            'product_price' => 2900,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 5,
            'product_name' => 'SLICED TOMATOES',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/SLICED TOMATOES.jpg',
            'product_description' => null,
            'product_price' => 800,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
        DB::table('products')->insert([
            'attribute_id' => 5,
            'product_name' => 'SUNDRIED TOMATOES',
            'product_image_path' => 'http://127.0.0.1:8000/products/product_image/SUNDRIED TOMATOES.jpg',
            'product_description' => null,
            'product_price' => 3000,
            'product_quantity' => 9999,
            'product_status' => 'active',
        ]);
    }
}
