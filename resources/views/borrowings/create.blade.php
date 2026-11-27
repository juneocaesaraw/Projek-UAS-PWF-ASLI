
@extends('layouts.app')

@section('title', 'Add Borrowing')

@section('content')

{{-- Header halaman tambah peminjaman --}}
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-900">
        Add Borrowing
    </h2>
    <p class="text-sm text-slate-500 mt-1">
        Enter the member and book information for the borrowing transaction.
    </p>
</div>

{{-- Menampilkan seluruh pesan validasi jika terdapat kesalahan input --}}
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Form untuk menyimpan transaksi peminjaman --}}
<form action="{{ route('borrowings.store') }}" method="POST"
      class="bg-white border border-slate-200 rounded-xl p-6">

    {{-- Token keamanan untuk mencegah CSRF --}}
    @csrf

    {{-- Bagian pemilihan anggota yang melakukan peminjaman --}}
    <div class="mb-5">
        <label class="block text-sm font-medium mb-2">
            Member
        </label>

        <select name="member_id" required
                class="w-full rounded-lg border border-slate-300 px-4 py-3">
            <option value="">Select a Member</option>

            {{-- Menampilkan daftar anggota dari data yang dikirim controller --}}
            @foreach ($members as $member)
                <option value="{{ $member->id }}"
                    @selected(old('member_id') == $member->id)>
                    {{ $member->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Bagian pemilihan buku yang akan dipinjam --}}
    <div class="mb-5">
        <h3 class="font-semibold text-slate-800 mb-3">
            Select Books
        </h3>

        {{-- Container untuk menampung daftar buku yang dipilih --}}
        <div id="book-list" class="space-y-4">

            {{-- Baris pertama pemilihan buku --}}
            <div class="book-row grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm mb-2">
                        Book
                    </label>

                    <select name="books[0][book_id]" required
                            class="book-select w-full rounded-lg border border-slate-300 px-4 py-3">
                        <option value="">Select a Book</option>

                        {{-- Menampilkan pilihan buku beserta stok yang tersedia --}}
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">
                                {{ $book->title }} (Stock: {{ $book->stock }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Input jumlah buku yang akan dipinjam --}}
                <div>
                    <label class="block text-sm mb-2">
                        Quantity
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

        {{-- Tombol untuk menambahkan pilihan buku lainnya --}}
        <button type="button" onclick="addBook()"
                class="mt-4 text-sm font-semibold text-blue-600 hover:text-blue-800">
            + Add Another Book
        </button>
    </div>

    {{-- Informasi tanggal peminjaman dan batas pengembalian --}}
    <div class="bg-blue-50 rounded-lg p-4 mb-6">
        <p class="text-sm text-blue-800">
            Borrowing Date: Today
        </p>
        <p class="text-sm text-blue-800 mt-1">
            Due Date: 7 days after borrowing
        </p>
    </div>

    {{-- Tombol untuk menyimpan transaksi peminjaman --}}
    <div class="flex justify-end">
        <button type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700">
            Save Borrowing
        </button>
    </div>

</form>

<script>
// Menentukan indeks awal untuk penamaan input buku tambahan
let bookIndex = 1;

// Fungsi untuk menambahkan baris pemilihan buku secara dinamis
function addBook() {
    const container = document.getElementById('book-list');

    // Membuat elemen baru untuk baris pemilihan buku
    const row = document.createElement('div');
    row.className = 'book-row grid grid-cols-1 md:grid-cols-2 gap-4';

    // Mengisi baris baru dengan pilihan buku dan jumlahnya
    row.innerHTML = `
        <div>
            <label class="block text-sm mb-2">Book</label>
            <select name="books[${bookIndex}][book_id]" required
                    class="w-full rounded-lg border border-slate-300 px-4 py-3">
                <option value="">Select a Book</option>

                {{-- Menampilkan daftar buku beserta stoknya --}}
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">
                        {{ $book->title }} (Stock: {{ $book->stock }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm mb-2">Quantity</label>
            <div class="flex gap-2">
                <input type="number"
                       name="books[${bookIndex}][quantity]"
                       min="1" value="1" required
                       class="w-full rounded-lg border border-slate-300 px-4 py-3">

                {{-- Tombol untuk menghapus baris buku yang ditambahkan --}}
                <button type="button"
                        onclick="this.closest('.book-row').remove()"
                        class="text-red-500 px-3">
                    Remove
                </button>
            </div>
        </div>
    `;

    // Menambahkan baris baru ke dalam daftar buku
    container.appendChild(row);

    // Menaikkan indeks agar setiap input memiliki nama yang berbeda
    bookIndex++;
}
</script>

@endsection
