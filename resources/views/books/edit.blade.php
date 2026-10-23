
@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')

<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-900">
        Edit Buku
    </h2>
    <p class="mt-1 text-sm text-slate-500">
        Perbarui informasi buku yang sudah terdaftar.
    </p>
</div>

<form action="{{ route('books.update', $book) }}" method="POST"
      class="bg-white rounded-xl">

    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <div>
            <label for="title"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Judul Buku
            </label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ $book->title }}"
                placeholder="Masukkan judul buku"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
            >
        </div>

        <div>
            <label for="author"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Penulis
            </label>
            <input
                type="text"
                id="author"
                name="author"
                value="{{ $book->author }}"
                placeholder="Masukkan nama penulis"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
            >
        </div>

        <div>
            <label for="year"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Tahun Terbit
            </label>
            <input
                type="number"
                id="year"
                name="year"
                value="{{ $book->year }}"
                placeholder="Contoh: 2025"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
            >
        </div>

        <div>
            <label for="stock"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Stok Buku
            </label>
            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ $book->stock }}"
                placeholder="Masukkan jumlah stok"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
            >
        </div>
        <div>
            
            <label for="category_id"
                class="block text-sm font-medium text-slate-700 mb-2">
                Kategori
            </label>

            <select
                name="category_id"
                id="category_id"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
            >
                <option value="">Pilih kategori</option>

                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected(old('category_id', $book->category_id) == $category->id)
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <p class="text-sm text-red-600 mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

    </div>

    <div class="mt-7 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

        <a href="/books"
           class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
            Batal
        </a>

        <button
            type="submit"
            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
            Update Buku
        </button>

    </div>

</form>

@endsection
