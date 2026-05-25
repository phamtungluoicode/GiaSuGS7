<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@gs7.com'],
            [
                'name' => 'Admin GS7',
                'password' => bcrypt('123456'),
                'role' => 'admin',
                'status' => 1,
            ]
        );
    }
}
