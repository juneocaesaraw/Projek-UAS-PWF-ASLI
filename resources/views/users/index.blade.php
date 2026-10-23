@extends('layouts.app')

@section('title', 'Manajemen Pengguna')

@section('content')

@if (session('success'))
    <div class="bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
        <p>{{ session('success') }}</p>
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-6">
        <p>{{ session('error') }}</p>
    </div>
@endif

<!-- Header Halaman -->
<div class="flex flex-col sm:flex-row sm:items-center
            sm:justify-between gap-4 mb-6">

    <div>
        <p class="text-sm font-medium text-blue-600 mb-2">
            Library System / Users
        </p>

        <h2 class="text-2xl font-bold text-slate-900">
            Manajemen Pengguna
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Kelola akun pengguna dan hak akses sistem perpustakaan.
        </p>
    </div>

    <a href="{{ route('users.create') }}"
       class="inline-flex items-center justify-center gap-2
              bg-blue-600 text-white px-4 py-2.5 rounded-lg
              text-sm font-semibold shadow-sm
              hover:bg-blue-700 transition">
        <span class="text-lg leading-none">+</span>
        Tambah Pengguna
    </a>

</div>

<!-- Daftar Pengguna -->
<div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

    <div class="px-5 py-4 border-b border-slate-200">
        <h3 class="text-sm font-semibold text-slate-800">
            Daftar Pengguna
        </h3>
    </div>

    @forelse ($users as $user)

        <div class="flex flex-col lg:flex-row lg:items-center
                    justify-between gap-4 px-5 py-4
                    border-b border-slate-100 last:border-b-0
                    hover:bg-slate-50 transition">

            <!-- Informasi Pengguna -->
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

            <!-- Aksi Pengguna -->
            <div class="flex flex-wrap items-center gap-4
                        text-sm font-medium shrink-0">

                <a href="{{ route('users.show', $user) }}"
                   class="text-blue-600 hover:text-blue-800 transition">
                    Detail
                </a>

                <a href="{{ route('users.edit', $user) }}"
                   class="text-slate-600 hover:text-blue-600 transition">
                    Edit
                </a>

                @if ($user->id !== auth()->id())
                    <form action="{{ route('users.destroy', $user) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="text-red-500 hover:text-red-700 transition">
                            Hapus
                        </button>
                    </form>
                @endif

            </div>

        </div>

    @empty

        <div class="px-5 py-8 text-center">
            <p class="text-sm text-slate-500">
                Belum ada pengguna.
            </p>
        </div>

    @endforelse

</div>

@endsection
