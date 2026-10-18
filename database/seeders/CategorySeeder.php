<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
            Category::create([
                'name' => 'Pemrograman',
            ]);

            Category::create([
                'name' => 'Basis Data',
            ]);

            Category::create([
                'name' => 'Sistem Informasi',
            ]);

            Category::create([
                'name' => 'Jaringan Komputer',
            ]);

            Category::create([
                'name' => 'Kecerdasan Buatan',
            ]);

            Category::create([
                'name' => 'Algoritma',
            ]);
        }
}
