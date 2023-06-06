<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Sheila Customer',
            'email' => 'sheila.angelina@binus.ac.id',
            'phone_number' => '08123456789',
            'password' => bcrypt('12345678'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'username' => 'Sheila Admin',
            'email' => 'sheila.angelina@binus.edu',
            'phone_number' => '089089283758',
            'password' => bcrypt('1234567890'),
            'role_id' => 2
        ]);
    }
}
