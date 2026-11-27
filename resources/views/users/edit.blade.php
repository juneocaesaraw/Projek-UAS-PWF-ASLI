
@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

{{-- Container utama halaman edit pengguna --}}
<div class="bg-white rounded-xl border border-slate-200 p-6">

    {{-- Breadcrumb untuk menunjukkan posisi halaman --}}
    <p class="text-sm text-slate-500 mb-2">Library System / Users / Edit</p>

    <h2 class="text-2xl font-bold text-slate-900 mb-6">
        Edit User
    </h2>

    {{-- Form untuk memperbarui data pengguna --}}
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Input untuk mengubah nama pengguna --}}
        <div class="mb-5">
            <label for="name" class="block text-sm font-medium mb-2">
                Name
            </label>

            <input type="text" name="name" id="name"
                   value="{{ old('name', $user->name) }}"
                   class="w-full border border-slate-300 rounded-lg px-4 py-2"
                   required>

            {{-- Menampilkan pesan validasi nama --}}
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Input untuk mengubah alamat email pengguna --}}
        <div class="mb-5">
            <label for="email" class="block text-sm font-medium mb-2">
                Email
            </label>

            <input type="email" name="email" id="email"
                   value="{{ old('email', $user->email) }}"
                   class="w-full border border-slate-300 rounded-lg px-4 py-2"
                   required>

            {{-- Menampilkan pesan validasi email --}}
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Input password baru, dapat dikosongkan jika tidak ingin mengubahnya --}}
        <div class="mb-5">
            <label for="password" class="block text-sm font-medium mb-2">
                New Password
            </label>

            <input type="password" name="password" id="password"
                   class="w-full border border-slate-300 rounded-lg px-4 py-2"
                   placeholder="Leave blank if you do not want to change the password">

            {{-- Menampilkan pesan validasi password --}}
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Memilih atau mengubah role pengguna --}}
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
                    Staff
                </option>
            </select>

            {{-- Menampilkan pesan validasi role --}}
            @error('role')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol untuk menyimpan perubahan atau membatalkan proses edit --}}
        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Save Changes
            </button>

            <a href="{{ route('users.index') }}"
               class="bg-slate-500 hover:bg-slate-600 text-white px-4 py-2 rounded-lg">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
