@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-header">
        <h2>{{ $title }}</h2>
        <p>{{ $description }}</p>
    </div>

    <h3>Informasi Perpustakaan</h3>

    <div class="stats-grid">
        <div class="stat-card">
            <span class="stat-label">Jumlah Buku</span>
            <span class="stat-value">{{ $books }}</span>
        </div>

        <div class="stat-card">
            <span class="stat-label">Jumlah Anggota</span>
            <span class="stat-value">{{ $members }}</span>
        </div>

        <div class="stat-card">
            <span class="stat-label">Jumlah Kategori</span>
            <span class="stat-value">{{ $categories }}</span>
        </div>
    </div>
@endsection