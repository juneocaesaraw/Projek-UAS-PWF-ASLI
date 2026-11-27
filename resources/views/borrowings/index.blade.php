
@extends('layouts.app')

@section('title', 'Borrowing List')

@section('content')

{{-- Container utama halaman daftar peminjaman --}}
<div class="container mx-auto px-4 py-6">

    {{-- Header halaman dan tombol tambah peminjaman --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Borrowing Records</h1>

        {{-- Mengarahkan pengguna ke halaman tambah peminjaman --}}
        <a href="{{ route('borrowings.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Add Borrowing
        </a>
    </div>

    {{-- Container tabel data peminjaman --}}
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full border-collapse">

            {{-- Header tabel yang berisi nama setiap kolom --}}
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border">No.</th>
                    <th class="p-3 border">Member Name</th>
                    <th class="p-3 border">Staff</th>
                    <th class="p-3 border">Borrowing Date</th>
                    <th class="p-3 border">Due Date</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Action</th>
                </tr>
            </thead>

            <tbody>
                {{-- Menampilkan seluruh data transaksi peminjaman --}}
                @forelse ($borrowings as $borrowing)
                    <tr>
                        {{-- Nomor urut berdasarkan posisi data --}}
                        <td class="p-3 border text-center">
                            {{ $loop->iteration }}
                        </td>

                        {{-- Nama anggota yang melakukan peminjaman --}}
                        <td class="p-3 border">
                            {{ $borrowing->member->name ?? '-' }}
                        </td>

                        {{-- Nama petugas yang menginput transaksi --}}
                        <td class="p-3 border">
                            {{ $borrowing->user->name ?? '-' }}
                        </td>

                        {{-- Tanggal buku dipinjam --}}
                        <td class="p-3 border">
                            {{ $borrowing->borrowed_at }}
                        </td>

                        {{-- Batas waktu pengembalian buku --}}
                        <td class="p-3 border">
                            {{ $borrowing->due_date }}
                        </td>

                        {{-- Status transaksi peminjaman --}}
                        <td class="p-3 border">
                            {{ ucfirst($borrowing->status) }}
                        </td>

                        {{-- Tautan menuju halaman detail transaksi --}}
                        <td class="p-3 border text-center">
                            <a href="{{ route('borrowings.show', $borrowing->id) }}"
                               class="text-blue-600 hover:underline">
                                Details
                            </a>
                        </td>
                    </tr>

                {{-- Ditampilkan jika belum terdapat transaksi peminjaman --}}
                @empty
                    <tr>
                        <td colspan="7" class="p-4 text-center">
                            No borrowing records available.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>
@endsection
