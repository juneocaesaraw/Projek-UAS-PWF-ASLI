@extends('layouts.app')

@section('title', 'Detail Pengguna')

@section('content')
<div class="bg-white rounded-xl border border-slate-200 p-6">
    <p class="text-sm text-slate-500 mb-2">SiPustaka / Users / Detail</p>

    <h2 class="text-2xl font-bold text-slate-900 mb-6">
        Detail Pengguna
    </h2>

    <div class="space-y-4 mb-6">
        <div>
            <p class="text-sm text-slate-500 mb-1">Nama</p>
            <p class="font-semibold">{{ $user->name }}</p>
        </div>

        <div>
            <p class="text-sm text-slate-500 mb-1">Email</p>
            <p class="font-semibold">{{ $user->email }}</p>
        </div>

        <div>
            <p class="text-sm text-slate-500 mb-1">Role</p>
            <p class="font-semibold">
                {{ ucfirst($user->role) }}
            </p>
        </div>
    </div>

    <div class="flex gap-3">
        <a href="{{ route('users.edit', $user->id) }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            Edit
        </a>

        <a href="{{ route('users.index') }}"
           class="bg-slate-500 hover:bg-slate-600 text-white px-4 py-2 rounded-lg">
            Kembali
        </a>
    </div>
</div>
@endsection
