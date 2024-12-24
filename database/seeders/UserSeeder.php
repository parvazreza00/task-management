<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // users
            [
                'name' => 'Tomal',
                'email' => 'tomal@gmail.com',
                'password' => Hash::make('12345678'),
            ],

            [
                'name' => 'Arif',
                'email' => 'arif@gmail.com',
                'password' => Hash::make('12345678'),
            ],

            [
                'name' => 'Hasan',
                'email' => 'hasan@gmail.com',
                'password' => Hash::make('12345678'),
            ],
        ]);
    }
}
