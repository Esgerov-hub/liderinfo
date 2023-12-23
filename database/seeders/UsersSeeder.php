<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ənvər',
            'sur_name' => 'Əsgərov',
            'phone' => '+994507027093',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 1
        ]);
    }
}
