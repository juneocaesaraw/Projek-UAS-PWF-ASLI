<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::firstOrCreate([
            'name' => 'Pemrograman',
        ]);

        Category::firstOrCreate([
            'name' => 'Basis Data',
        ]);

        Category::firstOrCreate([
            'name' => 'Sistem Informasi',
        ]);

        Category::firstOrCreate([
            'name' => 'Jaringan Komputer',
        ]);

        Category::firstOrCreate([
            'name' => 'Kecerdasan Buatan',
        ]);

        Category::firstOrCreate([
            'name' => 'Algoritma',
        ]);
    }
}
