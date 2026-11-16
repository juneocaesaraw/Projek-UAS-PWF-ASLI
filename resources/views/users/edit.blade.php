@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
<div class="bg-white rounded-xl border border-slate-200 p-6">
    <p class="text-sm text-slate-500 mb-2">Library System / Users / Edit</p>

    <h2 class="text-2xl font-bold text-slate-900 mb-6">
        Edit Pengguna
    </h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label for="name" class="block text-sm font-medium mb-2">
                Nama
            </label>

            <input type="text" name="name" id="name"
                   value="{{ old('name', $user->name) }}"
                   class="w-full border border-slate-300 rounded-lg px-4 py-2"
                   required>

            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="email" class="block text-sm font-medium mb-2">
                Email
            </label>

            <input type="email" name="email" id="email"
                   value="{{ old('email', $user->email) }}"
                   class="w-full border border-slate-300 rounded-lg px-4 py-2"
                   required>

            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="password" class="block text-sm font-medium mb-2">
                Password Baru
            </label>

            <input type="password" name="password" id="password"
                   class="w-full border border-slate-300 rounded-lg px-4 py-2"
                   placeholder="Kosongkan jika tidak ingin mengubah password">

            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="role" class="block text-sm font-medium mb-2">
                Role
            </label>

            <select name="role" id="role"
                    class="w-full border border-slate-300 rounded-lg px-4 py-2"
                    required>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>
                <option value="petugas" {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>
                    Petugas
                </option>
            </select>

            @error('role')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Simpan Perubahan
            </button>

            <a href="{{ route('users.index') }}"
               class="bg-slate-500 hover:bg-slate-600 text-white px-4 py-2 rounded-lg">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
