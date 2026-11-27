
@extends('layouts.app')

{{-- Mengatur judul halaman edit kategori --}}
@section('title', 'Edit Category')

@section('content')

{{-- Container utama halaman edit kategori --}}
<div class="bg-white rounded-xl border border-slate-200 p-6">

    {{-- Menampilkan breadcrumb sebagai penanda lokasi halaman --}}
    <p class="text-sm text-slate-500 mb-2">
        Library System / Categories / Edit
    </p>

    {{-- Judul halaman --}}
    <h2 class="text-2xl font-bold text-slate-900 mb-6">
        Edit Category
    </h2>

    {{-- Form untuk mengirim perubahan kategori ke route categories.update --}}
    <form action="{{ route('categories.update', $category->id) }}"
          method="POST">

        {{-- Token CSRF dan method PUT untuk memperbarui data --}}
        @csrf
        @method('PUT')

        {{-- Input untuk mengubah nama kategori --}}
        <div class="mb-5">
            <label for="name" class="block text-sm font-medium mb-2">
                Category Name
            </label>

            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $category->name) }}"
                class="w-full border border-slate-300 rounded-lg px-4 py-2"
                required
            >

            {{-- Menampilkan pesan kesalahan jika nama kategori tidak valid --}}
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol untuk menyimpan perubahan atau kembali ke daftar kategori --}}
        <div class="flex gap-3">

            {{-- Tombol untuk mengirim perubahan data kategori --}}
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Save Changes
            </button>

            {{-- Tautan untuk membatalkan proses edit --}}
            <a href="{{ route('categories.index') }}"
               class="bg-slate-500 hover:bg-slate-600 text-white px-4 py-2 rounded-lg">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
