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
        $categories = [
            ['name' => 'Pemrograman'],
            ['name' => 'Laravel'],
            ['name' => 'Basis Data'],
            ['name' => 'Jaringan Komputer'],
            ['name' => 'Sistem Informasi'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}