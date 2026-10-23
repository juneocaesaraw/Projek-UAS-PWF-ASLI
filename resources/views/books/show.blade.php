
@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')

<div class="mb-6">
    <p class="text-sm text-blue-600 font-medium mb-2">
        Books / Detail
    </p>

    <h2 class="text-2xl font-bold text-slate-900">
        Detail Buku
    </h2>

    <p class="text-sm text-slate-500 mt-1">
        Informasi lengkap buku yang dipilih.
    </p>
</div>

<div class="bg-white border border-slate-200 rounded-xl shadow-sm">

    <!-- Judul Buku -->
    <div class="flex items-center gap-4 p-6 border-b border-slate-200">
       
    <div>
            <h3 class="text-lg font-bold text-slate-900">
                {{ $book->title }}
            </h3>
            <p class="text-sm text-slate-500 mt-1">
                Informasi koleksi buku
            </p>
        </div>
    </div>

    <!-- Informasi Buku -->
    <div class="px-6 py-2">

            <div class="flex flex-col sm:flex-row sm:items-center
                    py-4 border-b border-slate-100 gap-1 sm:gap-0">
            <p class="text-sm text-slate-500 sm:w-40">
                Sinopsis
            </p>
            <p class="text-sm font-medium text-slate-800">
                Buku ini berjudul "{{ $book->title }}" yang ditulis oleh {{ $book->author }} dan diterbitkan pada tahun {{ $book->year }}. Buku ini memiliki stok sebanyak {{ $book->stock }} buku.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center
                    py-4 border-b border-slate-100 gap-1 sm:gap-0">
            <p class="text-sm text-slate-500 sm:w-40">
                Penulis
            </p>
            <p class="text-sm font-medium text-slate-800">
                {{ $book->author }}
            </p>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center
                    py-4 border-b border-slate-100 gap-1 sm:gap-0">
            <p class="text-sm text-slate-500 sm:w-40">
                Tahun Terbit
            </p>
            <p class="text-sm font-medium text-slate-800">
                {{ $book->year }}
            </p>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center
                    py-4 gap-1 sm:gap-0">
            <p class="text-sm text-slate-500 sm:w-40">
                Stok Buku
            </p>
            <p class="text-sm font-medium text-slate-800">
                {{ $book->stock }} buku
            </p>
        </div>

    </div>

    <!-- Tombol Kembali -->
    <div class="px-6 py-4 border-t border-slate-200">
        <a href="/books"
           class="inline-flex items-center gap-2 rounded-lg
                  bg-blue-600 px-4 py-2.5 text-sm font-semibold
                  text-white transition hover:bg-blue-700">
            &larr; Kembali ke Daftar Buku
        </a>
    </div>

</div>

@endsection
