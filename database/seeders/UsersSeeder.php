<?php

namespace Database\Seeders;

use App\Models\User;
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
        $adminUser = User::where('email', 'admin@gmail.com')->first();

        if ($adminUser) {
            $adminUser->update([
                'name' => 'Ənvər',
                'sur_name' => 'Əsgərov',
                'phone' => '+994507027093',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'status' => 1
            ]);
        } else {
            DB::table('users')->insert([
                'name' => 'Sexavet',
                'sur_name' => 'Ismayilov',
                'phone' => '++994554791864',
                'email' => 'sexavetismayilov@gmail.com',
                'password' => bcrypt('123456'),
                'status' => 1
            ]);
        }
    }
}
