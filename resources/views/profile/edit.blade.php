
@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')

<div class="space-y-5">

    {{-- PROFILE HEADER --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">
        <div class="flex items-center justify-center gap-5">

            <div class="w-20 h-20 rounded-full bg-blue-100
                        flex items-center justify-center shrink-0
                        border-4 border-white shadow-sm">

                <span class="text-3xl font-bold text-blue-800">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </span>
            </div>

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


    {{-- BASIC INFO --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">

        <h3 class="text-lg font-semibold text-slate-800 mb-8">
            Basic Info
        </h3>

        @include('profile.partials.update-profile-information-form', [
            'user' => $user
        ])

    </div>


    {{-- ACCOUNT INFORMATION --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">

        <h3 class="text-lg font-semibold text-slate-800 mb-6">
            Account Information
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

            <div>
                <p class="text-sm text-slate-500 mb-1">
                    User Role
                </p>

                <p class="text-sm font-semibold text-slate-800">
                    {{ ucfirst($user->role) }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500 mb-1">
                    Account Status
                </p>

                <span class="inline-flex px-3 py-1 rounded-full
                             text-xs font-semibold bg-green-100 text-green-700">
                    Active
                </span>
            </div>

            <div>
                <p class="text-sm text-slate-500 mb-1">
                    Registered Email
                </p>

                <p class="text-sm font-semibold text-slate-800">
                    {{ $user->email }}
                </p>
            </div>

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

        <p class="text-xs text-slate-400 mt-5">
            Informasi role hanya dapat dikelola oleh Admin melalui User Management.
        </p>

    </div>


    {{-- CHANGE PASSWORD --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">

        <div class="flex items-center gap-3 mb-6">

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

            <div>
                <h3 class="text-lg font-semibold text-slate-800">
                    Security Settings
                </h3>

                <p class="text-sm text-slate-500">
                    Ubah password akun kamu.
                </p>
            </div>

        </div>

        @include('profile.partials.update-password-form')

    </div>


    {{-- DELETE ACCOUNT --}}
    <div class="bg-white rounded-2xl border border-red-100 shadow-sm p-6 sm:p-8">

        <div class="flex items-center gap-3 mb-6">

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

            <div>
                <h3 class="text-lg font-semibold text-red-700">
                    Delete Account
                </h3>

                <p class="text-sm text-slate-500">
                    Penghapusan akun secara permanen.
                </p>
            </div>

        </div>

        @include('profile.partials.delete-user-form')

    </div>

</div>

@endsection
