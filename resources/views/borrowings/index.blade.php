
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Data Peminjaman</h1>

        <a href="{{ route('borrowings.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah Peminjaman
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border">No</th>
                    <th class="p-3 border">Nama Peminjam</th>
                    <th class="p-3 border">Petugas</th>
                    <th class="p-3 border">Tanggal Pinjam</th>
                    <th class="p-3 border">Jatuh Tempo</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($borrowings as $borrowing)
                    <tr>
                        <td class="p-3 border text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td class="p-3 border">
                            {{ $borrowing->member->name ?? '-' }}
                        </td>

                        <td class="p-3 border">
                            {{ $borrowing->user->name ?? '-' }}
                        </td>

                        <td class="p-3 border">
                            {{ $borrowing->borrowed_at }}
                        </td>

                        <td class="p-3 border">
                            {{ $borrowing->due_date }}
                        </td>

                        <td class="p-3 border">
                            {{ ucfirst($borrowing->status) }}
                        </td>

                        <td class="p-3 border text-center">
                            <a href="{{ route('borrowings.show', $borrowing->id) }}"
                               class="text-blue-600 hover:underline">
                                Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-4 text-center">
                            Belum ada data peminjaman.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
