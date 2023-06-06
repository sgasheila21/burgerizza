<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pizza Attributes
        DB::table('attributes')->insert([
            'category_id' => '1', //pizza
            'attribute_name' => 'Pizza Size',
            'attribute_order' => 1,
            'attribute_description' => 'Select your Pizza Size (Pick 1)',
            'attribute_status' => 'active',
            'multiple_choice' => false,
        ]);
        DB::table('attributes')->insert([
            'category_id' => '1', //pizza
            'attribute_name' => 'Dough',
            'attribute_order' => 2,
            'attribute_description' => 'Select your Dough (Pick 1)',
            'attribute_status' => 'active',
            'multiple_choice' => false,
        ]);
        DB::table('attributes')->insert([
            'category_id' => '1', //pizza
            'attribute_name' => 'Cheese',
            'attribute_order' => 3,
            'attribute_description' => 'Select your Cheese (Pick 0 or more)',
            'attribute_status' => 'active',
            'multiple_choice' => true,
        ]);
        DB::table('attributes')->insert([
            'category_id' => '1', //pizza
            'attribute_name' => 'Protein',
            'attribute_order' => 4,
            'attribute_description' => 'Select your Protein (Pick 0 or more)',
            'attribute_status' => 'active',
            'multiple_choice' => true,
        ]);
        DB::table('attributes')->insert([
            'category_id' => '1', //pizza
            'attribute_name' => 'Vegetable',
            'attribute_order' => 5,
            'attribute_description' => 'Select your Vegetable (Pick 0 or more)',
            'attribute_status' => 'active',
            'multiple_choice' => true,
        ]);
        
        // Burger Attributes
        DB::table('attributes')->insert([
            'category_id' => '2', //Burger
            'attribute_name' => 'Burger Size',
            'attribute_order' => 1,
            'attribute_description' => 'Select your Burger Size (Pick 1)',
            'attribute_status' => 'active',
            'multiple_choice' => false,
        ]);
        DB::table('attributes')->insert([
            'category_id' => '2', //Burger
            'attribute_name' => 'Dough',
            'attribute_order' => 2,
            'attribute_description' => 'Select your Dough (Pick 1)',
            'attribute_status' => 'active',
            'multiple_choice' => false,
        ]);
        DB::table('attributes')->insert([
            'category_id' => '2', //Burger
            'attribute_name' => 'Cheese',
            'attribute_order' => 3,
            'attribute_description' => 'Select your Cheese (Pick 0 or more)',
            'attribute_status' => 'active',
            'multiple_choice' => true,
        ]);
        DB::table('attributes')->insert([
            'category_id' => '2', //Burger
            'attribute_name' => 'Protein',
            'attribute_order' => 4,
            'attribute_description' => 'Select your Protein (Pick 0 or more)',
            'attribute_status' => 'active',
            'multiple_choice' => true,
        ]);
        DB::table('attributes')->insert([
            'category_id' => '2', //Burger
            'attribute_name' => 'Vegetable',
            'attribute_order' => 5,
            'attribute_description' => 'Select your Vegetable (Pick 0 or more)',
            'attribute_status' => 'active',
            'multiple_choice' => true,
        ]);
        
        // Beverages Attributes
        DB::table('attributes')->insert([
            'category_id' => '3', //Beverages
            'attribute_name' => 'Beverages Type',
            'attribute_order' => 1,
            'attribute_description' => 'Select your Beverages Type (Pick 1)',
            'attribute_status' => 'active',
            'multiple_choice' => false,
        ]);
        DB::table('attributes')->insert([
            'category_id' => '3', //Beverages
            'attribute_name' => 'Beverages',
            'attribute_order' => 2,
            'attribute_description' => 'Select your Beverages (Pick 1)',
            'attribute_status' => 'active',
            'multiple_choice' => false,
        ]);
        DB::table('attributes')->insert([
            'category_id' => '3', //Beverages
            'attribute_name' => 'Beverages Size',
            'attribute_order' => 3,
            'attribute_description' => 'Select your Beverages Size (Pick 1)',
            'attribute_status' => 'active',
            'multiple_choice' => false,
        ]);
    }
}
