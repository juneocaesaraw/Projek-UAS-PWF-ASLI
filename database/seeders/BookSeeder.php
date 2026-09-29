<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Pemrograman PHP',
            'author' => 'Budi Santoso',
            'year' => 2022,
            'stock' => 10,
        ]);

        Book::create([
            'title' => 'Laravel untuk Pemula',
            'author' => 'Andi Wijaya',
            'year' => 2023,
            'stock' => 8,
        ]);

        Book::create([
            'title' => 'Basis Data',
            'author' => 'Citra Lestari',
            'year' => 2021,
            'stock' => 12,
        ]);

        Book::create([
            'title' => 'Algoritma dan Pemrograman',
            'author' => 'Dewi Anggraini',
            'year' => 2024,
            'stock' => 7,
        ]);

        Book::create([
            'title' => 'Sistem Informasi',
            'author' => 'Eko Pratama',
            'year' => 2023,
            'stock' => 15,
        ]);
    }
}