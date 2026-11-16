@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')

@if (session('success'))
    <div class="bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <p class="text-sm font-medium text-blue-600 mb-2">
            Library System / Borrowings / Detail
        </p>

        <h2 class="text-2xl font-bold text-slate-900">
            Detail Peminjaman
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Informasi lengkap transaksi peminjaman buku.
        </p>
    </div>

    <a href="{{ route('borrowings.index') }}"
       class="bg-slate-100 text-slate-700 px-4 py-2.5 rounded-lg hover:bg-slate-200 transition text-sm font-semibold">
        Kembali
    </a>
</div>

<div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6">

    <h3 class="text-lg font-semibold text-slate-800 mb-5">
        Informasi Transaksi
    </h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

        <div>
            <p class="text-sm text-slate-500">Nama Peminjam</p>
            <p class="font-semibold text-slate-900 mt-1">
                {{ $borrowing->member->name ?? '-' }}
            </p>
        </div>

        <div>
            <p class="text-sm text-slate-500">Petugas</p>
            <p class="font-semibold text-slate-900 mt-1">
                {{ $borrowing->user->name ?? '-' }}
            </p>
        </div>

        <div>
            <p class="text-sm text-slate-500">Tanggal Peminjaman</p>
            <p class="font-semibold text-slate-900 mt-1">
                {{ $borrowing->borrowed_at?->format('d-m-Y') ?? '-' }}
            </p>
        </div>

        <div>
            <p class="text-sm text-slate-500">Jatuh Tempo</p>
            <p class="font-semibold text-slate-900 mt-1">
                {{ $borrowing->due_date?->format('d-m-Y') ?? '-' }}
            </p>
        </div>

        <div>
            <p class="text-sm text-slate-500">Tanggal Pengembalian</p>
            <p class="font-semibold text-slate-900 mt-1">
                {{ $borrowing->returned_at?->format('d-m-Y') ?? 'Belum dikembalikan' }}
            </p>
        </div>

        <div>
            <p class="text-sm text-slate-500">Status</p>

            @if ($borrowing->status === 'borrowed')
                <span class="inline-block mt-1 px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                    Borrowed
                </span>
            @else
                <span class="inline-block mt-1 px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                    Returned
                </span>
            @endif
        </div>

    </div>

    <div class="border-t border-slate-200 my-6"></div>

    <h3 class="text-lg font-semibold text-slate-800 mb-4">
        Buku yang Dipinjam
    </h3>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left border border-slate-200">

            <thead class="bg-slate-100 text-slate-700">
                <tr>
                    <th class="px-4 py-3 border">No</th>
                    <th class="px-4 py-3 border">Nama Buku</th>
                    <th class="px-4 py-3 border">Jumlah</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($borrowing->details as $index => $detail)
                    <tr>
                        <td class="px-4 py-3 border">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-4 py-3 border">
                            {{ $detail->book->title ?? 'Buku tidak ditemukan' }}
                        </td>

                        <td class="px-4 py-3 border">
                            {{ $detail->quantity }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-5 text-center text-slate-500">
                            Belum ada buku dalam transaksi ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    {{-- Tombol Pengembalian --}}
    <div class="mt-6 pt-5 border-t border-slate-200">

        @if ($borrowing->status === 'borrowed')

            <form action="{{ route('borrowings.return', $borrowing) }}"
                  method="POST"
                  onsubmit="return confirm('Apakah buku sudah dikembalikan?')">

                @csrf
                @method('PATCH')

                <button type="submit"
                        class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                    Kembalikan Buku
                </button>

            </form>

        @else

            <span class="inline-block bg-green-100 text-green-700 px-4 py-3 rounded-lg font-semibold">
                Buku Sudah Dikembalikan
            </span>

        @endif

    </div>

</div>

@endsection