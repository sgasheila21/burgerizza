<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            "category_name" => 'Pizza',
            "category_description" => 'Pizza is a popular dish consisting of a flat dough base topped with various ingredients such as tomato sauce, cheese, meats, vegetables, and spices. The pizza dough is typically baked in an oven until crispy on the outside and soft on the inside. Pizza originated in Italy and has become an internationally loved food enjoyed by many around the world.',
            "category_status" => 'active',
        ]);
        
        DB::table('categories')->insert([
            "category_name" => 'Burger',
            "category_description" => 'Pizza is a popular dish consisting of a flat dough base topped with various ingredients such as tomato sauce, cheese, meats, vegetables, and spices. The pizza dough is typically baked in an oven until crispy on the outside and soft on the inside. Pizza originated in Italy and has become an internationally loved food enjoyed by many around the world.',
            "category_status" => 'active',
        ]);

        DB::table('categories')->insert([
            "category_name" => 'Beverage',
            "category_description" => 'A beverage is a liquid consumed to quench thirst and provide hydration to the body. Beverages can include water, juices, tea, coffee, carbonated drinks, or alcoholic beverages. Beverages can also have added flavors, such as fruit flavors, spices, or sweeteners. Beverages play a vital role in maintaining body health and freshness, and they can be enjoyed for their diverse taste sensations.',
            "category_status" => 'active',
        ]);
    }
}
