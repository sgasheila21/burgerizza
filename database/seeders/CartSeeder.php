<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart_headers')->insert([
            'user_id' => 1,
            'category_id' => 1,
            'quantity' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('cart_headers')->insert([
            'user_id' => 1,
            'category_id' => 2,
            'quantity' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('cart_headers')->insert([
            'user_id' => 1,
            'category_id' => 3,
            'quantity' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
