@extends('layouts.app')

@section('header-title', 'Manajemen Buku')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-dark">Daftar Buku Perpustakaan</h5>
        <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus me-1"></i> Tambah Buku</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Judul Buku</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th class="text-center" width="10%">Stok</th>
                        <th class="text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $key => $book)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <strong>{{ $book->title }}</strong>
                            </td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $book->category?->name ?? 'Belum ada kategori' }}
                                </span>
                            </td>
                            <td>{{ $book->author }}</td>
                            <td class="text-center">
                                <span class="badge bg-success">{{ $book->stock }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-info text-white" title="Detail"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Belum ada data buku yang tersimpan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection