
@extends('layouts.app')

{{-- Mengatur judul halaman yang ditampilkan pada browser --}}
@section('title', 'Dashboard')

@section('content')

    {{-- Bagian header dashboard yang menampilkan breadcrumb, judul, dan deskripsi halaman --}}
    <div class="mb-8">
        <p class="text-sm text-slate-500 mb-2">Library System / Dashboard</p>
        <h2 class="text-3xl font-bold text-slate-900">{{ $title }}</h2>
        <p class="text-slate-500 mt-2">{{ $description }}</p>
    </div>

    {{-- Judul bagian informasi dan ringkasan data perpustakaan --}}
    <h3 class="text-xl font-semibold text-slate-800 mb-5">
        Library Overview
    </h3>

    {{-- Grid untuk menampilkan lima ringkasan informasi perpustakaan --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-5">

        {{-- Card untuk menampilkan jumlah keseluruhan judul buku yang terdaftar --}}
        <div class="rounded-xl border border-blue-100 bg-white p-6 shadow-sm">
            <span class="block text-sm font-medium text-slate-500">
                Total Book Titles
            </span>
            <span class="block text-3xl font-bold text-blue-600 mt-3">
                {{ $books }}
            </span>
        </div>

        {{-- Card untuk menampilkan total stok seluruh buku yang tersedia dalam sistem --}}
        <div class="rounded-xl border border-green-100 bg-white p-6 shadow-sm">
            <span class="block text-sm font-medium text-slate-500">
                Total Book Stock
            </span>
            <span class="block text-3xl font-bold text-green-600 mt-3">
                {{ $totalStock }}
            </span>
        </div>

        {{-- Card untuk menampilkan jumlah anggota yang terdaftar di perpustakaan --}}
        <div class="rounded-xl border border-blue-100 bg-white p-6 shadow-sm">
            <span class="block text-sm font-medium text-slate-500">
                Total Members
            </span>
            <span class="block text-3xl font-bold text-blue-600 mt-3">
                {{ $members }}
            </span>
        </div>

        {{-- Card untuk menampilkan jumlah kategori buku yang tersedia --}}
        <div class="rounded-xl border border-blue-100 bg-white p-6 shadow-sm">
            <span class="block text-sm font-medium text-slate-500">
                Total Categories
            </span>
            <span class="block text-3xl font-bold text-blue-600 mt-3">
                {{ $categories }}
            </span>
        </div>

        {{-- Card untuk menampilkan jumlah transaksi peminjaman yang sedang berlangsung --}}
        <div class="rounded-xl border border-yellow-100 bg-white p-6 shadow-sm">
            <span class="block text-sm font-medium text-slate-500">
                Currently Borrowed
            </span>
            <span class="block text-3xl font-bold text-yellow-600 mt-3">
                {{ $borrowings }}
            </span>
        </div>

    </div>
@endsection
