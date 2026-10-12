
@extends('layouts.app')

@section('title', 'Kategori Buku')

@section('content')

    <div class="mb-6">
        <p class="text-sm text-slate-500 mb-2">Library System / Categories</p>
        <h1 class="text-2xl font-bold text-slate-900">Kategori Buku</h1>
        <p class="text-sm text-slate-500 mt-1">Daftar kategori buku perpustakaan.</p>
    </div>

    <ul class="divide-y divide-slate-200 rounded-lg border border-slate-200">
        @foreach($categories as $category)
            <li class="px-4 py-3 text-slate-700 hover:bg-blue-50 transition">
                {{ $category }}
            </li>
        @endforeach
    </ul>

@endsection
