
@extends('layouts.app')

{{-- Mengatur judul halaman detail kategori --}}
@section('title', 'Category Details')

@section('content')

{{-- Container utama halaman detail kategori --}}
<div class="bg-white rounded-xl border border-slate-200 p-6">

    {{-- Menampilkan breadcrumb sebagai penanda lokasi halaman --}}
    <p class="text-sm text-slate-500 mb-2">
        SiPustaka / Categories / Details
    </p>

    {{-- Judul halaman --}}
    <h2 class="text-2xl font-bold text-slate-900 mb-6">
        Category Details
    </h2>

    {{-- Bagian informasi kategori yang dipilih --}}
    <div class="mb-6">

        {{-- Label informasi nama kategori --}}
        <p class="text-sm text-slate-500 mb-1">
            Category Name
        </p>

        {{-- Menampilkan nama kategori berdasarkan data database --}}
        <p class="text-lg font-semibold text-slate-900">
            {{ $category->name }}
        </p>
    </div>

    {{-- Tombol untuk kembali ke halaman daftar kategori --}}
    <a href="{{ route('categories.index') }}"
       class="inline-block bg-slate-600 hover:bg-slate-700 text-white px-4 py-2 rounded-lg">
        Back
    </a>
</div>
@endsection
