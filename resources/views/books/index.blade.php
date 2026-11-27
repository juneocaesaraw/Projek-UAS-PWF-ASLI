
@extends('layouts.app')

{{-- Mengatur judul halaman daftar buku --}}
@section('title', 'Book List')

@section('content')

{{-- Menampilkan notifikasi jika proses sebelumnya berhasil dilakukan --}}
@if (session('success'))
    <div class="bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
        <p>{{ session('success') }}</p>
    </div>
@endif

{{-- Header halaman yang berisi breadcrumb, judul, deskripsi, dan tombol tambah buku --}}
<div class="flex flex-col sm:flex-row sm:items-center
            sm:justify-between gap-4 mb-6">

    <div>
        {{-- Menampilkan lokasi halaman saat ini --}}
        <p class="text-sm font-medium text-blue-600 mb-2">
            SiPustaka / Books
        </p>

        {{-- Judul utama halaman --}}
        <h2 class="text-2xl font-bold text-slate-900">
            Book List
        </h2>

        {{-- Deskripsi singkat fungsi halaman --}}
        <p class="text-sm text-slate-500 mt-1">
            Manage the library's book collection.
        </p>
    </div>

    {{-- Tombol untuk menuju halaman formulir penambahan buku --}}
    <a href="{{ route('books.create') }}"
       class="inline-flex items-center justify-center gap-2
              bg-blue-600 text-white px-4 py-2.5 rounded-lg
              text-sm font-semibold shadow-sm
              hover:bg-blue-700 transition">
        <span class="text-lg leading-none">+</span>
        Add Book
    </a>

</div>

{{-- Bagian utama untuk menampilkan seluruh koleksi buku --}}
<div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

    {{-- Judul bagian daftar koleksi buku --}}
    <div class="px-5 py-4 border-b border-slate-200">
        <h3 class="text-sm font-semibold text-slate-800">
            Book Collection
        </h3>
    </div>

    {{-- Melakukan perulangan untuk menampilkan setiap data buku --}}
    @foreach($books as $book)

        <div class="flex flex-col sm:flex-row sm:items-center
                    justify-between gap-4 px-5 py-4
                    border-b border-slate-100 last:border-b-0
                    hover:bg-slate-50 transition">

            {{-- Bagian informasi utama setiap buku --}}
            <div class="flex items-start gap-3 min-w-0">

                <div class="min-w-0">

                    {{-- Menampilkan judul buku --}}
                    <h4 class="text-sm font-semibold text-slate-900">
                        {{ $book->title }}
                    </h4>

                    {{-- Menampilkan nama penulis dan tahun terbit buku --}}
                    <p class="text-sm text-slate-500 mt-1">
                        {{ $book->author }} · {{ $book->year }}
                    </p>

                    {{-- Menampilkan jumlah stok buku yang tersedia --}}
                    <p class="text-xs text-slate-400 mt-1">
                        Stock: {{ $book->stock }} books
                    </p>

                    {{-- Menampilkan kategori buku atau keterangan jika belum memiliki kategori --}}
                    <p class="text-xs text-slate-400 mt-1">
                        Category: {{ $book->category?->name ?? 'No category assigned' }}
                    </p>
                </div>

            </div>

            {{-- Bagian tindakan untuk melihat detail, mengedit, dan menghapus buku --}}
            <div class="flex items-center gap-4 text-sm font-medium
                        shrink-0">

                {{-- Tautan untuk melihat informasi lengkap buku --}}
                <a href="{{ route('books.show', $book) }}"
                   class="text-blue-600 hover:text-blue-800 transition">
                    Details
                </a>

                {{-- Tautan untuk mengubah informasi buku --}}
                <a href="{{ route('books.edit', $book) }}"
                   class="text-slate-600 hover:text-blue-600 transition">
                    Edit
                </a>

                {{-- Form untuk menghapus data buku dari sistem --}}
                <form action="{{ route('books.destroy', $book) }}"
                      method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this book?')">

                    {{-- Token CSRF untuk melindungi proses penghapusan --}}
                    @csrf

                    {{-- Mengubah metode POST menjadi DELETE sesuai kebutuhan route Laravel --}}
                    @method('DELETE')

                    {{-- Tombol untuk menjalankan proses penghapusan buku --}}
                    <button type="submit"
                            class="text-red-500 hover:text-red-700 transition">
                        Delete
                    </button>
                </form>

            </div>

        </div>

    @endforeach

</div>

@endsection
