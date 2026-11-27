
@extends('layouts.app')

{{-- Mengatur judul halaman daftar kategori --}}
@section('title', 'Category List')

@section('content')

{{-- Menampilkan notifikasi jika proses sebelumnya berhasil --}}
@if (session('success'))
    <div class="bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
        <p>{{ session('success') }}</p>
    </div>
@endif

{{-- Header halaman yang berisi breadcrumb, judul, deskripsi, dan tombol tambah --}}
<div class="flex flex-col sm:flex-row sm:items-center
            sm:justify-between gap-4 mb-6">

    <div>
        {{-- Menampilkan lokasi halaman saat ini --}}
        <p class="text-sm font-medium text-blue-600 mb-2">
            SiPustaka / Categories
        </p>

        {{-- Judul utama halaman --}}
        <h2 class="text-2xl font-bold text-slate-900">
            Category List
        </h2>

        {{-- Deskripsi singkat fungsi halaman --}}
        <p class="text-sm text-slate-500 mt-1">
            Manage the library's book categories.
        </p>
    </div>

    {{-- Tombol tambah kategori hanya ditampilkan kepada admin --}}
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('categories.create') }}"
           class="inline-flex items-center justify-center gap-2
                  bg-blue-600 text-white px-4 py-2.5 rounded-lg
                  text-sm font-semibold shadow-sm
                  hover:bg-blue-700 transition">
            <span class="text-lg leading-none">+</span>
            Add Category
        </a>
    @endif

</div>

{{-- Container utama untuk menampilkan seluruh kategori --}}
<div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

    {{-- Judul bagian daftar kategori buku --}}
    <div class="px-5 py-4 border-b border-slate-200">
        <h3 class="text-sm font-semibold text-slate-800">
            Book Categories
        </h3>
    </div>

    {{-- Melakukan perulangan untuk menampilkan setiap kategori --}}
    @foreach($categories as $category)

        <div class="flex flex-col sm:flex-row sm:items-center
                    justify-between gap-4 px-5 py-4
                    border-b border-slate-100 last:border-b-0
                    hover:bg-slate-50 transition">

            {{-- Bagian informasi kategori --}}
            <div class="min-w-0">

                {{-- Menampilkan nama kategori --}}
                <h4 class="text-sm font-semibold text-slate-900">
                    {{ $category->name }}
                </h4>
            </div>

            {{-- Bagian tindakan untuk melihat, mengedit, dan menghapus kategori --}}
            <div class="flex items-center gap-4 text-sm font-medium
                        shrink-0">

                {{-- Tautan untuk melihat detail kategori --}}
                <a href="{{ route('categories.show', $category) }}"
                   class="text-blue-600 hover:text-blue-800 transition">
                    Details
                </a>

                {{-- Fitur edit dan hapus hanya tersedia untuk admin --}}
                @if(auth()->user()->role === 'admin')

                    {{-- Tautan untuk mengubah informasi kategori --}}
                    <a href="{{ route('categories.edit', $category) }}"
                       class="text-slate-600 hover:text-blue-600 transition">
                        Edit
                    </a>

                    {{-- Form untuk menghapus kategori --}}
                    <form action="{{ route('categories.destroy', $category) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this category?')">

                        {{-- Token CSRF untuk keamanan proses penghapusan --}}
                        @csrf

                        {{-- Menggunakan method DELETE untuk menghapus data --}}
                        @method('DELETE')

                        {{-- Tombol untuk menjalankan proses penghapusan --}}
                        <button type="submit"
                                class="text-red-500 hover:text-red-700 transition">
                            Delete
                        </button>
                    </form>

                @endif

            </div>

        </div>

    @endforeach

</div>

@endsection
