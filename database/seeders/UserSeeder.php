<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@perpustakaan.com'],
            [
                'name' => 'Administrator',
                'password' => 'admin123',
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'petugas@perpustakaan.com'],
            [
                'name' => 'Petugas Perpustakaan',
                'password' => 'petugas123',
                'role' => 'petugas',
                'email_verified_at' => now(),
            ]
        );
    }
}
