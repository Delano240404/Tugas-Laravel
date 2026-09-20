<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin POS',
            'email' => 'admin@barokahmart.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Kasir POS',
            'email' => 'kasir@barokahmart.test',
            'password' => Hash::make('password'),
            'role' => 'kasir',
        ]);
    }
}