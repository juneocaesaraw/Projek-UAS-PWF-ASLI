
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

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div class="rounded-xl border border-blue-100 bg-white p-6 shadow-sm">
            <span class="stat-label block text-sm font-medium text-slate-500">
                Jumlah Buku
            </span>
            <span class="stat-value block text-3xl font-bold text-blue-600 mt-3">
                {{ $books }}
            </span>
        </div>

        <div class="rounded-xl border border-blue-100 bg-white p-6 shadow-sm">
            <span class="stat-label block text-sm font-medium text-slate-500">
                Jumlah Anggota
            </span>
            <span class="stat-value block text-3xl font-bold text-blue-600 mt-3">
                {{ $members }}
            </span>
        </div>

        <div class="rounded-xl border border-blue-100 bg-white p-6 shadow-sm">
            <span class="stat-label block text-sm font-medium text-slate-500">
                Jumlah Kategori
            </span>
            <span class="stat-value block text-3xl font-bold text-blue-600 mt-3">
                {{ $categories }}
            </span>
        </div>
    </div>
@endsection
