<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowingController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Halaman perpustakaan untuk Admin dan Petugas
    Route::middleware('role:admin,petugas')->group(function () {
        Route::resource('books', BookController::class);
        Route::resource('members', MemberController::class);

        // Kategori: Admin dan Petugas hanya bisa melihat
        Route::resource('categories', CategoryController::class)
            ->only(['index', 'show']);
    });

    // Pengelolaan kategori khusus Admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('categories', CategoryController::class)
            ->except(['index', 'show']);

        // Manajemen pengguna khusus Admin
        Route::resource('users', UserController::class);
    });

    // Profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Manajemen Peminjaman untuk Admin dan Petugas
    Route::resource('borrowings', BorrowingController::class)
        ->only(['index', 'create', 'store', 'show']);

    Route::patch('/borrowings/{borrowing}/return',
    [BorrowingController::class, 'returnBook'])
    ->name('borrowings.return');
});

require __DIR__.'/auth.php';
