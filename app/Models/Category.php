<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Sesuaikan dengan nama kolom tabel kategori di database Anda (misal: name atau nama)
    ];

    /**
     * Relasi Eloquent: Satu kategori memiliki banyak buku
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}