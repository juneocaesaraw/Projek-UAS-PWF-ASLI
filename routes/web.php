<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource ('books', BookController::class);
Route::resource('categories', CategoryController::class);
Route::resource('members', MemberController::class);
Route::get('/dashboard', [DashboardController::class, 'index']);


// Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index']);
// Route::get('/members', [App\Http\Controllers\MemberController::class, 'index']);
// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

// Route::get('/members/{id}', [MemberController::class, 'show']);
// Route::get('/categories/{id}', [CategoryController::class, 'show']);
