@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <p class="text-sm text-slate-500 mb-2">Library System / Dashboard</p>
        <h2 class="text-3xl font-bold text-slate-900">{{ $title }}</h2>
        <p class="text-slate-500 mt-2">{{ $description }}</p>
    </div>

    <h3 class="text-xl font-semibold text-slate-800 mb-5">
        Informasi Perpustakaan
    </h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-5">

        {{-- Jumlah Judul Buku --}}
        <div class="rounded-xl border border-blue-100 bg-white p-6 shadow-sm">
            <span class="block text-sm font-medium text-slate-500">
                Jumlah Judul Buku
            </span>
            <span class="block text-3xl font-bold text-blue-600 mt-3">
                {{ $books }}
            </span>
        </div>

        {{-- Jumlah Stok Buku --}}
        <div class="rounded-xl border border-green-100 bg-white p-6 shadow-sm">
            <span class="block text-sm font-medium text-slate-500">
                Jumlah Stok Buku
            </span>
            <span class="block text-3xl font-bold text-green-600 mt-3">
                {{ $totalStock }}
            </span>
        </div>

        {{-- Jumlah Anggota --}}
        <div class="rounded-xl border border-blue-100 bg-white p-6 shadow-sm">
            <span class="block text-sm font-medium text-slate-500">
                Jumlah Anggota
            </span>
            <span class="block text-3xl font-bold text-blue-600 mt-3">
                {{ $members }}
            </span>
        </div>

        {{-- Jumlah Kategori --}}
        <div class="rounded-xl border border-blue-100 bg-white p-6 shadow-sm">
            <span class="block text-sm font-medium text-slate-500">
                Jumlah Kategori
            </span>
            <span class="block text-3xl font-bold text-blue-600 mt-3">
                {{ $categories }}
            </span>
        </div>

        {{-- Sedang Dipinjam --}}
        <div class="rounded-xl border border-yellow-100 bg-white p-6 shadow-sm">
            <span class="block text-sm font-medium text-slate-500">
                Sedang Dipinjam
            </span>
            <span class="block text-3xl font-bold text-yellow-600 mt-3">
                {{ $borrowings }}
            </span>
        </div>

    </div>
@endsection
