<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::firstOrCreate(
            ['title' => 'Pemrograman PHP'],
            [
                'author' => 'Budi Santoso',
                'year' => 2022,
                'stock' => 10,
            ]
        );

        Book::firstOrCreate(
            ['title' => 'Laravel untuk Pemula'],
            [
                'author' => 'Andi Wijaya',
                'year' => 2023,
                'stock' => 8,
            ]
        );

        Book::firstOrCreate(
            ['title' => 'Basis Data'],
            [
                'author' => 'Citra Lestari',
                'year' => 2021,
                'stock' => 12,
            ]
        );

        Book::firstOrCreate(
            ['title' => 'Algoritma dan Pemrograman'],
            [
                'author' => 'Dewi Anggraini',
                'year' => 2024,
                'stock' => 7,
            ]
        );

        Book::firstOrCreate(
            ['title' => 'Sistem Informasi'],
            [
                'author' => 'Eko Pratama',
                'year' => 2023,
                'stock' => 15,
            ]
        );
    }
}
