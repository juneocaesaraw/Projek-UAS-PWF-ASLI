
@extends('layouts.app')

@section('title', 'User Profile')

@section('content')

{{-- Container utama halaman profil pengguna --}}
<div class="space-y-5">

    {{-- Bagian header profil yang menampilkan identitas pengguna --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">
        <div class="flex items-center justify-center gap-5">

            {{-- Avatar menggunakan huruf pertama dari nama pengguna --}}
            <div class="w-20 h-20 rounded-full bg-blue-100
                        flex items-center justify-center shrink-0
                        border-4 border-white shadow-sm">

                <span class="text-3xl font-bold text-blue-800">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </span>
            </div>

            {{-- Menampilkan nama, role, dan email pengguna --}}
            <div>
                <h2 class="text-xl font-bold text-slate-800">
                    {{ $user->name }}
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    {{ ucfirst($user->role) }} / Library System
                </p>

                <p class="text-sm text-slate-400 mt-1">
                    {{ $user->email }}
                </p>
            </div>

        </div>
    </div>


    {{-- Bagian informasi dasar dan pengaturan data profil --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">

        <h3 class="text-lg font-semibold text-slate-800 mb-8">
            Basic Information
        </h3>

        {{-- Memanggil partial untuk memperbarui informasi profil pengguna --}}
        @include('profile.partials.update-profile-information-form', [
            'user' => $user
        ])

    </div>


    {{-- Bagian informasi akun pengguna --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">

        <h3 class="text-lg font-semibold text-slate-800 mb-6">
            Account Information
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

            {{-- Menampilkan role pengguna --}}
            <div>
                <p class="text-sm text-slate-500 mb-1">
                    User Role
                </p>

                <p class="text-sm font-semibold text-slate-800">
                    {{ ucfirst($user->role) }}
                </p>
            </div>

            {{-- Menampilkan status akun pengguna --}}
            <div>
                <p class="text-sm text-slate-500 mb-1">
                    Account Status
                </p>

                <span class="inline-flex px-3 py-1 rounded-full
                             text-xs font-semibold bg-green-100 text-green-700">
                    Active
                </span>
            </div>

            {{-- Menampilkan alamat email yang terdaftar --}}
            <div>
                <p class="text-sm text-slate-500 mb-1">
                    Registered Email
                </p>

                <p class="text-sm font-semibold text-slate-800">
                    {{ $user->email }}
                </p>
            </div>

            {{-- Menampilkan tanggal pembuatan akun --}}
            <div>
                <p class="text-sm text-slate-500 mb-1">
                    Member Since
                </p>

                <p class="text-sm font-semibold text-slate-800">
                    {{ $user->created_at
                        ? $user->created_at->format('d F Y')
                        : '-' }}
                </p>
            </div>

        </div>

        {{-- Informasi mengenai hak akses pengelolaan role --}}
        <p class="text-xs text-slate-400 mt-5">
            User roles can only be managed by the Admin through User Management.
        </p>

    </div>


    {{-- Bagian pengaturan keamanan dan perubahan password --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">

        <div class="flex items-center gap-3 mb-6">

            {{-- Ikon keamanan menggunakan SVG --}}
            <div class="w-10 h-10 rounded-lg bg-blue-50
                        flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-700"
                     fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>

            {{-- Judul dan deskripsi pengaturan keamanan --}}
            <div>
                <h3 class="text-lg font-semibold text-slate-800">
                    Security Settings
                </h3>

                <p class="text-sm text-slate-500">
                    Change your account password.
                </p>
            </div>

        </div>

        {{-- Memanggil partial untuk memperbarui password pengguna --}}
        @include('profile.partials.update-password-form')

    </div>


    {{-- Bagian penghapusan akun pengguna --}}
    <div class="bg-white rounded-2xl border border-red-100 shadow-sm p-6 sm:p-8">

        <div class="flex items-center gap-3 mb-6">

            {{-- Ikon peringatan penghapusan akun menggunakan SVG --}}
            <div class="w-10 h-10 rounded-lg bg-red-50
                        flex items-center justify-center">
                <svg class="w-5 h-5 text-red-600"
                     fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4h6v3M4 7h16"/>
                </svg>
            </div>

            {{-- Judul dan deskripsi penghapusan akun --}}
            <div>
                <h3 class="text-lg font-semibold text-red-700">
                    Delete Account
                </h3>

                <p class="text-sm text-slate-500">
                    Permanently delete your account.
                </p>
            </div>

        </div>

        {{-- Memanggil partial untuk proses penghapusan akun --}}
        @include('profile.partials.delete-user-form')

    </div>

</div>

@endsection
