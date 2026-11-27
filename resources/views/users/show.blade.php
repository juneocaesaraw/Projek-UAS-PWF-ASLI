 
@extends('layouts.app')

@section('title', 'User Details')

@section('content')

{{-- Container utama halaman detail pengguna --}}
<div class="bg-white rounded-xl border border-slate-200 p-6">
    <p class="text-sm text-slate-500 mb-2">Library System / Users / Detail</p>

    <h2 class="text-2xl font-bold text-slate-900 mb-6">
        User Details
    </h2>

    {{-- Menampilkan informasi lengkap pengguna --}}
    <div class="space-y-4 mb-6">

        {{-- Nama pengguna --}}
        <div>
            <p class="text-sm text-slate-500 mb-1">Name</p>
            <p class="font-semibold">{{ $user->name }}</p>
        </div>

        {{-- Alamat email pengguna --}}
        <div>
            <p class="text-sm text-slate-500 mb-1">Email</p>
            <p class="font-semibold">{{ $user->email }}</p>
        </div>

        {{-- Role atau hak akses pengguna --}}
        <div>
            <p class="text-sm text-slate-500 mb-1">Role</p>
            <p class="font-semibold">
                {{ ucfirst($user->role) }}
            </p>
        </div>
    </div>

    {{-- Tombol untuk mengedit data atau kembali ke daftar pengguna --}}
    <div class="flex gap-3">
        <a href="{{ route('users.edit', $user->id) }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            Edit
        </a>

        <a href="{{ route('users.index') }}"
           class="bg-slate-500 hover:bg-slate-600 text-white px-4 py-2 rounded-lg">
            Back
        </a>
    </div>
</div>
@endsection
