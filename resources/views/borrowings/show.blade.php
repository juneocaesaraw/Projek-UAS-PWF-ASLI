
@extends('layouts.app')

@section('title', 'Borrowing Details')

@section('content')

{{-- Menampilkan notifikasi jika operasi berhasil dilakukan --}}
@if (session('success'))
    <div class="bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

{{-- Header halaman detail peminjaman --}}
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        {{-- Breadcrumb untuk menunjukkan posisi halaman --}}
        <p class="text-sm font-medium text-blue-600 mb-2">
            SiPustaka / Borrowings / Details
        </p>

        <h2 class="text-2xl font-bold text-slate-900">
            Borrowing Details
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Complete information about the book borrowing transaction.
        </p>
    </div>

    {{-- Tombol untuk kembali ke daftar peminjaman --}}
    <a href="{{ route('borrowings.index') }}"
       class="bg-slate-100 text-slate-700 px-4 py-2.5 rounded-lg hover:bg-slate-200 transition text-sm font-semibold">
        Back
    </a>
</div>

{{-- Container utama informasi transaksi --}}
<div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6">

    <h3 class="text-lg font-semibold text-slate-800 mb-5">
        Transaction Information
    </h3>

    {{-- Menampilkan informasi utama transaksi dalam dua kolom --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

        {{-- Nama anggota yang meminjam buku --}}
        <div>
            <p class="text-sm text-slate-500">Member Name</p>
            <p class="font-semibold text-slate-900 mt-1">
                {{ $borrowing->member->name ?? '-' }}
            </p>
        </div>

        {{-- Nama petugas yang mencatat transaksi --}}
        <div>
            <p class="text-sm text-slate-500">Staff</p>
            <p class="font-semibold text-slate-900 mt-1">
                {{ $borrowing->user->name ?? '-' }}
            </p>
        </div>

        {{-- Tanggal transaksi peminjaman --}}
        <div>
            <p class="text-sm text-slate-500">Borrowing Date</p>
            <p class="font-semibold text-slate-900 mt-1">
                {{ $borrowing->borrowed_at?->format('d-m-Y') ?? '-' }}
            </p>
        </div>

        {{-- Batas waktu pengembalian buku --}}
        <div>
            <p class="text-sm text-slate-500">Due Date</p>
            <p class="font-semibold text-slate-900 mt-1">
                {{ $borrowing->due_date?->format('d-m-Y') ?? '-' }}
            </p>
        </div>

        {{-- Tanggal buku dikembalikan oleh anggota --}}
        <div>
            <p class="text-sm text-slate-500">Return Date</p>
            <p class="font-semibold text-slate-900 mt-1">
                {{ $borrowing->returned_at?->format('d-m-Y') ?? 'Not yet returned' }}
            </p>
        </div>

        {{-- Menampilkan status transaksi dengan warna berbeda --}}
        <div>
            <p class="text-sm text-slate-500">Status</p>

            {{-- Status jika buku masih dipinjam --}}
            @if ($borrowing->status === 'borrowed')
                <span class="inline-block mt-1 px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                    Borrowed
                </span>

            {{-- Status jika buku sudah dikembalikan --}}
            @else
                <span class="inline-block mt-1 px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                    Returned
                </span>
            @endif
        </div>

    </div>

    {{-- Garis pemisah antara informasi transaksi dan daftar buku --}}
    <div class="border-t border-slate-200 my-6"></div>

    {{-- Bagian daftar buku yang termasuk dalam transaksi --}}
    <h3 class="text-lg font-semibold text-slate-800 mb-4">
        Borrowed Books
    </h3>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left border border-slate-200">

            {{-- Header tabel daftar buku --}}
            <thead class="bg-slate-100 text-slate-700">
                <tr>
                    <th class="px-4 py-3 border">No.</th>
                    <th class="px-4 py-3 border">Book Title</th>
                    <th class="px-4 py-3 border">Quantity</th>
                </tr>
            </thead>

            <tbody>
                {{-- Menampilkan setiap buku yang tercatat dalam transaksi --}}
                @forelse ($borrowing->details as $index => $detail)
                    <tr>
                        {{-- Nomor urut buku --}}
                        <td class="px-4 py-3 border">
                            {{ $index + 1 }}
                        </td>

                        {{-- Nama buku berdasarkan relasi detail peminjaman --}}
                        <td class="px-4 py-3 border">
                            {{ $detail->book->title ?? 'Book not found' }}
                        </td>

                        {{-- Jumlah buku yang dipinjam --}}
                        <td class="px-4 py-3 border">
                            {{ $detail->quantity }}
                        </td>
                    </tr>

                {{-- Ditampilkan jika transaksi belum memiliki detail buku --}}
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-5 text-center text-slate-500">
                            No books found in this transaction.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    {{-- Bagian aksi pengembalian buku --}}
    <div class="mt-6 pt-5 border-t border-slate-200">

        {{-- Tombol pengembalian hanya tersedia jika status masih borrowed --}}
        @if ($borrowing->status === 'borrowed')

            <form action="{{ route('borrowings.return', $borrowing) }}"
                  method="POST"
                  onsubmit="return confirm('Have the books been returned?')">

                {{-- Token keamanan dan metode PATCH untuk proses pengembalian --}}
                @csrf
                @method('PATCH')

                <button type="submit"
                        class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                    Return Books
                </button>

            </form>

        {{-- Informasi jika seluruh buku sudah dikembalikan --}}
        @else

            <span class="inline-block bg-green-100 text-green-700 px-4 py-3 rounded-lg font-semibold">
                Books Already Returned
            </span>

        @endif

    </div>

</div>

@endsection
