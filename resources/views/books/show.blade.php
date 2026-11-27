
@extends('layouts.app')

{{-- Mengatur judul halaman detail buku --}}
@section('title', 'Book Details')

@section('content')

{{-- Header halaman yang menampilkan breadcrumb, judul, dan deskripsi --}}
<div class="mb-6">
    <p class="text-sm text-blue-600 font-medium mb-2">
        Books / Details
    </p>

    <h2 class="text-2xl font-bold text-slate-900">
        Book Details
    </h2>

    <p class="text-sm text-slate-500 mt-1">
        Complete information about the selected book.
    </p>
</div>

{{-- Container utama untuk menampilkan seluruh informasi buku --}}
<div class="bg-white border border-slate-200 rounded-xl shadow-sm">

    {{-- Bagian header yang menampilkan judul buku --}}
    <div class="flex items-center gap-4 p-6 border-b border-slate-200">

        <div>
            <h3 class="text-lg font-bold text-slate-900">
                {{ $book->title }}
            </h3>
            <p class="text-sm text-slate-500 mt-1">
                Book collection information
            </p>
        </div>
    </div>

    {{-- Bagian isi yang menampilkan informasi lengkap buku --}}
    <div class="px-6 py-2">

        {{-- Menampilkan ringkasan informasi buku berdasarkan data yang tersimpan --}}
        <div class="flex flex-col sm:flex-row sm:items-center
                    py-4 border-b border-slate-100 gap-1 sm:gap-0">
            <p class="text-sm text-slate-500 sm:w-40">
                Overview
            </p>
            <p class="text-sm font-medium text-slate-800">
                This book is titled "{{ $book->title }}", written by {{ $book->author }} and published in {{ $book->year }}. It has a total stock of {{ $book->stock }} copies.
            </p>
        </div>

        {{-- Menampilkan nama penulis buku --}}
        <div class="flex flex-col sm:flex-row sm:items-center
                    py-4 border-b border-slate-100 gap-1 sm:gap-0">
            <p class="text-sm text-slate-500 sm:w-40">
                Author
            </p>
            <p class="text-sm font-medium text-slate-800">
                {{ $book->author }}
            </p>
        </div>

        {{-- Menampilkan tahun penerbitan buku --}}
        <div class="flex flex-col sm:flex-row sm:items-center
                    py-4 border-b border-slate-100 gap-1 sm:gap-0">
            <p class="text-sm text-slate-500 sm:w-40">
                Publication Year
            </p>
            <p class="text-sm font-medium text-slate-800">
                {{ $book->year }}
            </p>
        </div>

        {{-- Menampilkan jumlah stok buku yang tercatat dalam sistem --}}
        <div class="flex flex-col sm:flex-row sm:items-center
                    py-4 gap-1 sm:gap-0">
            <p class="text-sm text-slate-500 sm:w-40">
                Book Stock
            </p>
            <p class="text-sm font-medium text-slate-800">
                {{ $book->stock }} copies
            </p>
        </div>

    </div>

    {{-- Bagian tombol navigasi untuk kembali ke halaman daftar buku --}}
    <div class="px-6 py-4 border-t border-slate-200">
        <a href="/books"
           class="inline-flex items-center gap-2 rounded-lg
                  bg-blue-600 px-4 py-2.5 text-sm font-semibold
                  text-white transition hover:bg-blue-700">
            &larr; Back to Book List
        </a>
    </div>

</div>

@endsection
