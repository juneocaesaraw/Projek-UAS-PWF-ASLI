<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Category;
use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Library System Dashboard';
        $description = 'Selamat datang di Sistem Informasi Perpustakaan.';

        // Menghitung total judul buku
        $books = Book::count();

        // Menghitung total seluruh stok buku
        $totalStock = Book::sum('stock');

        // Menghitung total anggota
        $members = Member::count();

        // Menghitung total kategori
        $categories = Category::count();

        // Menghitung transaksi yang masih dipinjam
        $borrowings = Borrowing::where('status', 'borrowed')->count();

        return view('dashboard.index', compact(
            'title',
            'description',
            'books',
            'totalStock',
            'members',
            'categories',
            'borrowings'
        ));
    }
}