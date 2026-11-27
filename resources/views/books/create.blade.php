
@extends('layouts.app')

{{-- Mengatur judul halaman tambah buku --}}
@section('title', 'Add Book')

@section('content')

{{-- Header halaman untuk memberikan informasi mengenai penambahan buku --}}
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-900">
        Add Book
    </h2>
    <p class="mt-1 text-sm text-slate-500">
        Enter the information of the book you want to add.
    </p>
</div>

{{-- Form untuk mengirim data buku baru ke route books.store --}}
<form action="{{ route('books.store') }}" method="POST"
      class="bg-white rounded-xl">

    {{-- Token CSRF untuk melindungi proses pengiriman data --}}
    @csrf

    {{-- Grid untuk mengatur posisi input dalam dua kolom --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        {{-- Input untuk memasukkan judul buku --}}
        <div>
            <label for="title"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Book Title
            </label>
            <input
                type="text"
                id="title"
                name="title"
                placeholder="Enter book title"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                value="{{ old('title') }}"
            >

            {{-- Menampilkan pesan validasi jika judul buku tidak sesuai --}}
            @error('title')
                <p class="text-sm text-red-600 mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        {{-- Input untuk memasukkan nama penulis buku --}}
        <div>
            <label for="author"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Author
            </label>
            <input
                type="text"
                id="author"
                name="author"
                placeholder="Enter author name"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                value="{{ old('author') }}"
            >

            {{-- Menampilkan pesan validasi jika nama penulis tidak sesuai --}}
            @error('author')
                <p class="text-sm text-red-600 mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Input untuk memasukkan tahun penerbitan buku --}}
        <div>
            <label for="year"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Publication Year
            </label>
            <input
                type="number"
                id="year"
                name="year"
                placeholder="Example: 2025"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                value="{{ old('year') }}"
            >

            {{-- Menampilkan pesan validasi jika tahun penerbitan tidak sesuai --}}
            @error('year')
                <p class="text-sm text-red-600 mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Input untuk memasukkan jumlah stok buku --}}
        <div>
            <label for="stock"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Book Stock
            </label>
            <input
                type="number"
                id="stock"
                name="stock"
                placeholder="Enter stock quantity"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                value="{{ old('stock') }}"
            >

            {{-- Menampilkan pesan validasi jika jumlah stok tidak sesuai --}}
            @error('stock')
                <p class="text-sm text-red-600 mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Input untuk memilih kategori buku --}}
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

                {{-- Mengambil daftar kategori dan menampilkannya sebagai pilihan --}}
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected(old('category_id') == $category->id)
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            {{-- Menampilkan pesan validasi jika kategori belum dipilih atau tidak valid --}}
            @error('category_id')
                <p class="text-sm text-red-600 mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

    </div>

    {{-- Bagian tombol untuk menyimpan data buku baru --}}
    <div class="mt-7 flex justify-end">
        <button
            type="submit"
            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
            Save Book
        </button>
    </div>

</form>

@endsection
