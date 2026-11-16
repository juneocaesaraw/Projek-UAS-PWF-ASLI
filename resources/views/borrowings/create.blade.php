
@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')

<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-900">
        Tambah Peminjaman
    </h2>
    <p class="text-sm text-slate-500 mt-1">
        Masukkan data anggota dan buku yang akan dipinjam.
    </p>
</div>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('borrowings.store') }}" method="POST"
      class="bg-white border border-slate-200 rounded-xl p-6">

    @csrf

    <div class="mb-5">
        <label class="block text-sm font-medium mb-2">
            Anggota
        </label>

        <select name="member_id" required
                class="w-full rounded-lg border border-slate-300 px-4 py-3">
            <option value="">Pilih Anggota</option>

            @foreach ($members as $member)
                <option value="{{ $member->id }}"
                    @selected(old('member_id') == $member->id)>
                    {{ $member->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-5">
        <h3 class="font-semibold text-slate-800 mb-3">
            Pilih Buku
        </h3>

        <div id="book-list" class="space-y-4">

            <div class="book-row grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm mb-2">
                        Buku
                    </label>

                    <select name="books[0][book_id]" required
                            class="book-select w-full rounded-lg border border-slate-300 px-4 py-3">
                        <option value="">Pilih Buku</option>

                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">
                                {{ $book->title }} (Stok: {{ $book->stock }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm mb-2">
                        Jumlah
                    </label>

                    <input type="number"
                           name="books[0][quantity]"
                           min="1"
                           value="1"
                           required
                           class="w-full rounded-lg border border-slate-300 px-4 py-3">
                </div>

            </div>

        </div>

        <button type="button" onclick="addBook()"
                class="mt-4 text-sm font-semibold text-blue-600 hover:text-blue-800">
            + Tambah Buku Lain
        </button>
    </div>

    <div class="bg-blue-50 rounded-lg p-4 mb-6">
        <p class="text-sm text-blue-800">
            Tanggal peminjaman: Hari ini
        </p>
        <p class="text-sm text-blue-800 mt-1">
            Batas pengembalian: 7 hari setelah peminjaman
        </p>
    </div>

    <div class="flex justify-end">
        <button type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700">
            Simpan Peminjaman
        </button>
    </div>

</form>

<script>
let bookIndex = 1;

function addBook() {
    const container = document.getElementById('book-list');

    const row = document.createElement('div');
    row.className = 'book-row grid grid-cols-1 md:grid-cols-2 gap-4';

    row.innerHTML = `
        <div>
            <label class="block text-sm mb-2">Buku</label>
            <select name="books[${bookIndex}][book_id]" required
                    class="w-full rounded-lg border border-slate-300 px-4 py-3">
                <option value="">Pilih Buku</option>

                @foreach ($books as $book)
                    <option value="{{ $book->id }}">
                        {{ $book->title }} (Stok: {{ $book->stock }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm mb-2">Jumlah</label>
            <div class="flex gap-2">
                <input type="number"
                       name="books[${bookIndex}][quantity]"
                       min="1" value="1" required
                       class="w-full rounded-lg border border-slate-300 px-4 py-3">

                <button type="button"
                        onclick="this.closest('.book-row').remove()"
                        class="text-red-500 px-3">
                    Hapus
                </button>
            </div>
        </div>
    `;

    container.appendChild(row);
    bookIndex++;
}
</script>

@endsection
