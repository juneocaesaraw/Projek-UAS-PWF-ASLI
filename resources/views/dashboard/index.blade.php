@extends('layouts.app')

@section('header-title', 'Dashboard')

@section('content')
<div class="row g-3 mb-4">
    <!-- Card 1: Jumlah Judul Buku -->
    <div class="col-md-3">
        <div class="card text-bg-primary h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-white-50">Judul Buku</h6>
                        <h2 class="fw-bold mb-0">124</h2>
                    </div>
                    <i class="fa-solid fa-book fa-2x text-white-50"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 2: Jumlah Stok Buku -->
    <div class="col-md-3">
        <div class="card text-bg-success h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-white-50">Total Stok Buku</h6>
                        <h2 class="fw-bold mb-0">580</h2>
                    </div>
                    <i class="fa-solid fa-layer-group fa-2x text-white-50"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 3: Jumlah Member -->
    <div class="col-md-3">
        <div class="card text-bg-warning h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-dark">Total Member</h6>
                        <h2 class="fw-bold mb-0 text-dark">85</h2>
                    </div>
                    <i class="fa-solid fa-users fa-2x text-dark opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 4: Sedang Dipinjam -->
    <div class="col-md-3">
        <div class="card text-bg-danger h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-white-50">Sedang Dipinjam</h6>
                        <h2 class="fw-bold mb-0">12</h2>
                    </div>
                    <i class="fa-solid fa-right-left fa-2x text-white-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Informasi Tambahan / Aktivitas Singkat -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">Selamat Datang di Sistem Informasi Perpustakaan</h5>
                <p class="text-muted">Aplikasi ini digunakan untuk mengelola data buku, kategori, anggota, serta transaksi peminjaman buku perpustakaan secara terstruktur.</p>
                <hr>
                <p class="mb-0 text-secondary small"><i class="fa-solid fa-circle-info me-1"></i> Gunakan menu navigasi di sebelah kiri untuk mengelola data sesuai dengan hak akses Anda.</p>
            </div>
        </div>
    </div>
</div>
@endsection