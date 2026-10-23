<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category; // <-- Tambahkan baris ini di atas

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'author',
        'publisher',
        'year',
        'stock',
    ];

    /**
     * Relasi Eloquent: Buku ini milik satu Kategori
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}