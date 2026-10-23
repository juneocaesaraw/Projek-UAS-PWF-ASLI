@extends('layouts.app')

@section('header-title', 'Detail Buku')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-dark">Detail Informasi Buku</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="30%">Judul Buku</th>
                        <td>: {{ $book->title }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>: <span class="badge bg-secondary">{{ $book->category->name ?? 'Umum' }}</span></td>
                    </tr>
                    <tr>
                        <th>Penulis</th>
                        <td>: {{ $book->author }}</td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td>: {{ $book->publisher ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td>: {{ $book->year }}</td>
                    </tr>
                    <tr>
                        <th>Stok Tersedia</th>
                        <td>: <span class="badge bg-success">{{ $book->stock }}</span></td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('books.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left me-1"></i> Kembali</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square me-1"></i> Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection