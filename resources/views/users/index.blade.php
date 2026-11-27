
@extends('layouts.app')

@section('title', 'User Management')

@section('content')

{{-- Menampilkan notifikasi jika operasi berhasil dilakukan --}}
@if (session('success'))
    <div class="bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
        <p>{{ session('success') }}</p>
    </div>
@endif

{{-- Menampilkan notifikasi jika terjadi kesalahan --}}
@if (session('error'))
    <div class="bg-red-100 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-6">
        <p>{{ session('error') }}</p>
    </div>
@endif

{{-- Header halaman manajemen pengguna --}}
<div class="flex flex-col sm:flex-row sm:items-center
            sm:justify-between gap-4 mb-6">

    <div>
        {{-- Breadcrumb untuk menunjukkan posisi halaman --}}
        <p class="text-sm font-medium text-blue-600 mb-2">
            Library System / Users
        </p>

        <h2 class="text-2xl font-bold text-slate-900">
            User Management
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Manage user accounts and access permissions for the library system.
        </p>
    </div>

    {{-- Tombol untuk menuju halaman tambah pengguna --}}
    <a href="{{ route('users.create') }}"
       class="inline-flex items-center justify-center gap-2
              bg-blue-600 text-white px-4 py-2.5 rounded-lg
              text-sm font-semibold shadow-sm
              hover:bg-blue-700 transition">
        <span class="text-lg leading-none">+</span>
        Add User
    </a>

</div>

{{-- Container daftar seluruh pengguna --}}
<div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

    <div class="px-5 py-4 border-b border-slate-200">
        <h3 class="text-sm font-semibold text-slate-800">
            User List
        </h3>
    </div>

    {{-- Menampilkan setiap pengguna yang tersedia --}}
    @forelse ($users as $user)

        <div class="flex flex-col lg:flex-row lg:items-center
                    justify-between gap-4 px-5 py-4
                    border-b border-slate-100 last:border-b-0
                    hover:bg-slate-50 transition">

            {{-- Informasi nama, email, dan role pengguna --}}
            <div class="min-w-0">
                <h4 class="text-sm font-semibold text-slate-900">
                    {{ $user->name }}
                </h4>

                <p class="text-sm text-slate-500 mt-1">
                    {{ $user->email }}
                </p>

                <p class="text-xs text-slate-400 mt-1">
                    Role:
                    <span class="font-medium text-slate-600">
                        {{ ucfirst($user->role) }}
                    </span>
                </p>
            </div>

            {{-- Kumpulan aksi untuk mengelola data pengguna --}}
            <div class="flex flex-wrap items-center gap-4
                        text-sm font-medium shrink-0">

                {{-- Menu untuk melihat detail pengguna --}}
                <a href="{{ route('users.show', $user) }}"
                   class="text-blue-600 hover:text-blue-800 transition">
                    Details
                </a>

                {{-- Menu untuk mengubah data pengguna --}}
                <a href="{{ route('users.edit', $user) }}"
                   class="text-slate-600 hover:text-blue-600 transition">
                    Edit
                </a>

                {{-- Pengguna tidak dapat menghapus akun yang sedang digunakan --}}
                @if ($user->id !== auth()->id())
                    <form action="{{ route('users.destroy', $user) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this user?')">

                        {{-- Token keamanan dan metode DELETE --}}
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="text-red-500 hover:text-red-700 transition">
                            Delete
                        </button>
                    </form>
                @endif

            </div>

        </div>

    {{-- Ditampilkan jika belum terdapat data pengguna --}}
    @empty

        <div class="px-5 py-8 text-center">
            <p class="text-sm text-slate-500">
                No users available.
            </p>
        </div>

    @endforelse

</div>

@endsection
