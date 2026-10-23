
@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')

@if (session('success'))
    <div class="bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
        <p>{{ session('success') }}</p>
    </div>
@endif

<!-- Header Halaman -->
<div class="flex flex-col sm:flex-row sm:items-center
            sm:justify-between gap-4 mb-6">

    <div>
        <p class="text-sm font-medium text-blue-600 mb-2">
            Library System / Categories
        </p>

        <h2 class="text-2xl font-bold text-slate-900">
            Daftar Kategori
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Kelola kategori buku perpustakaan.
        </p>
    </div>

    <a href="{{ route('categories.create') }}"
       class="inline-flex items-center justify-center gap-2
              bg-blue-600 text-white px-4 py-2.5 rounded-lg
              text-sm font-semibold shadow-sm
              hover:bg-blue-700 transition">
        <span class="text-lg leading-none">+</span>
        Tambah Kategori
    </a>

</div>

<!-- Daftar Kategori -->
<div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

    <div class="px-5 py-4 border-b border-slate-200">
        <h3 class="text-sm font-semibold text-slate-800">
            Kategori Buku
        </h3>
    </div>

    @foreach($categories as $category)

        <div class="flex flex-col sm:flex-row sm:items-center
                    justify-between gap-4 px-5 py-4
                    border-b border-slate-100 last:border-b-0
                    hover:bg-slate-50 transition">

            <!-- Informasi Kategori -->
            <div class="min-w-0">
                <h4 class="text-sm font-semibold text-slate-900">
                    {{ $category->name }}
                </h4>
            </div>

            <!-- Aksi Kategori -->
            <div class="flex items-center gap-4 text-sm font-medium
                        shrink-0">

                <a href="{{ route('categories.show', $category) }}"
                   class="text-blue-600 hover:text-blue-800 transition">
                    Detail
                </a>

                <a href="{{ route('categories.edit', $category) }}"
                   class="text-slate-600 hover:text-blue-600 transition">
                    Edit
                </a>

                <form action="{{ route('categories.destroy', $category) }}"
                      method="POST"
                      onsubmit="return confirm('Apakah kamu yakin ingin menghapus kategori ini?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="text-red-500 hover:text-red-700 transition">
                        Hapus
                    </button>
                </form>

            </div>

        </div>

    @endforeach

</div>

@endsection
