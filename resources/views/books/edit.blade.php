
@extends('layouts.app')

{{-- Mengatur judul halaman edit buku --}}
@section('title', 'Edit Book')

@section('content')

{{-- Header halaman untuk memberikan informasi bahwa pengguna sedang mengedit data buku --}}
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-900">
        Edit Book
    </h2>
    <p class="mt-1 text-sm text-slate-500">
        Update the information of an existing book.
    </p>
</div>

{{-- Form untuk mengirim perubahan data buku ke route books.update --}}
<form action="{{ route('books.update', $book) }}" method="POST"
      class="bg-white rounded-xl">

    {{-- Token CSRF untuk keamanan form dan method PUT untuk memperbarui data --}}
    @csrf
    @method('PUT')

    {{-- Grid untuk mengatur posisi input dalam dua kolom --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        {{-- Input untuk mengubah judul buku --}}
        <div>
            <label for="title"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Book Title
            </label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ $book->title }}"
                placeholder="Enter book title"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
            >
        </div>

        {{-- Input untuk mengubah nama penulis buku --}}
        <div>
            <label for="author"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Author
            </label>
            <input
                type="text"
                id="author"
                name="author"
                value="{{ $book->author }}"
                placeholder="Enter author name"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
            >
        </div>

        {{-- Input untuk mengubah tahun penerbitan buku --}}
        <div>
            <label for="year"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Publication Year
            </label>
            <input
                type="number"
                id="year"
                name="year"
                value="{{ $book->year }}"
                placeholder="Example: 2025"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
            >
        </div>

        {{-- Input untuk mengubah jumlah stok buku --}}
        <div>
            <label for="stock"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Book Stock
            </label>
            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ $book->stock }}"
                placeholder="Enter stock quantity"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
            >
        </div>

        {{-- Input untuk memilih atau mengubah kategori buku --}}
        <div>

            <label for="category_id"
                class="block text-sm font-medium text-slate-700 mb-2">
                Category
            </label>

            <select
                name="category_id"
                id="category_id"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
            >
                <option value="">Select a category</option>

                {{-- Menampilkan seluruh kategori yang tersedia sebagai pilihan --}}
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected(old('category_id', $book->category_id) == $category->id)
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            {{-- Menampilkan pesan kesalahan jika kategori tidak valid --}}
            @error('category_id')
                <p class="text-sm text-red-600 mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

    </div>

    {{-- Bagian tombol untuk membatalkan atau menyimpan perubahan data buku --}}
    <div class="mt-7 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

        {{-- Tombol untuk kembali ke daftar buku tanpa menyimpan perubahan --}}
        <a href="/books"
           class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
            Cancel
        </a>

        {{-- Tombol untuk mengirim perubahan data buku --}}
        <button
            type="submit"
            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
            Update Book
        </button>

    </div>

</form>

@endsection
