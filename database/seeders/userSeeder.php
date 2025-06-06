<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('00000000'),
                'role' => 'admin'
            ], 
            [
                'name' => 'customer',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('00000000'),
                'role' => 'customer'
            ]
        ]);
    }
}
