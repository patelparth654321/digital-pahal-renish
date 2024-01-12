<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser =  [
            'name' => 'Master Admin',
            'email' => (session('email')) ? session('email') : 'admin@gmail.com',
            'phone'=> '1111111111',
            'password' => Hash::make((session('password')) ? session('password') : '12345678'),
            'user_type' => 1
         ];
        \App\Models\User::create($adminUser);
    }
}
