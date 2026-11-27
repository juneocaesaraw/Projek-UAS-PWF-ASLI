
@extends('layouts.app')

{{-- Mengatur judul halaman tambah kategori --}}
@section('title', 'Add Category')

@section('content')

{{-- Header halaman untuk memberikan informasi mengenai penambahan kategori --}}
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-900">
        Add Category
    </h2>
    <p class="mt-1 text-sm text-slate-500">
        Enter the information of the category you want to add.
    </p>
</div>

{{-- Form untuk mengirim data kategori baru ke route categories.store --}}
<form action="{{ route('categories.store') }}" method="POST"
      class="bg-white rounded-xl">

    {{-- Token CSRF untuk melindungi proses pengiriman data --}}
    @csrf

    {{-- Grid untuk mengatur posisi input kategori --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        {{-- Input untuk memasukkan nama kategori buku --}}
        <div>
            <label for="name"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Category Name
            </label>

            <input
                type="text"
                id="name"
                name="name"
                placeholder="Enter category name"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                value="{{ old('name') }}"
            >

            {{-- Menampilkan pesan kesalahan jika nama kategori tidak valid --}}
            @error('name')
                <p class="text-sm text-red-600 mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

    </div>

    {{-- Tombol untuk menyimpan data kategori baru --}}
    <div class="mt-7 flex justify-end">
        <button
            type="submit"
            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
            Save Category
        </button>
    </div>

</form>

@endsection
