<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BorrowingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Manajemen Buku (Menggunakan Route Resource agar otomatis mencakup Index, Create, Edit, Show, dll)
Route::resource('books', BookController::class);

// Manajemen Kategori
Route::resource('categories', CategoryController::class);

// Manajemen Anggota (Member)
Route::resource('members', MemberController::class);

// Manajemen Peminjaman (Borrowings)
Route::resource('borrowings', BorrowingController::class);