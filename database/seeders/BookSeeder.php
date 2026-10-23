<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID kategori pertama untuk contoh
        $category = Category::first();
        $categoryId = $category ? $category->id : null;

        Book::create([
            'title' => 'Pemrograman PHP',
            'author' => 'Budi Santoso',
            'year' => 2022,
            'stock' => 10,
            'category_id' => $categoryId,
        ]);

        Book::create([
            'title' => 'Laravel untuk Pemula',
            'author' => 'Andi Wijaya',
            'year' => 2023,
            'stock' => 8,
            'category_id' => $categoryId,
        ]);

        Book::create([
            'title' => 'Basis Data',
            'author' => 'Citra Lestari',
            'year' => 2021,
            'stock' => 12,
            'category_id' => $categoryId,
        ]);

        Book::create([
            'title' => 'Algoritma dan Pemrograman',
            'author' => 'Dewi Anggraini',
            'year' => 2024,
            'stock' => 7,
            'category_id' => $categoryId,
        ]);

        Book::create([
            'title' => 'Sistem Informasi',
            'author' => 'Eko Pratama',
            'year' => 2023,
            'stock' => 15,
            'category_id' => $categoryId,
        ]);
    }
}