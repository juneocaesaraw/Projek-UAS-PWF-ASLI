@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tambah Pengguna
    </h2>
@endsection

@section('content')
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block mb-1">Nama</label>
                        <input type="text" name="name" id="name"
                               value="{{ old('name') }}"
                               class="w-full border-gray-300 rounded-md shadow-sm"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block mb-1">Email</label>
                        <input type="email" name="email" id="email"
                               value="{{ old('email') }}"
                               class="w-full border-gray-300 rounded-md shadow-sm"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block mb-1">Password</label>
                        <input type="password" name="password" id="password"
                               class="w-full border-gray-300 rounded-md shadow-sm"
                               required>
                        <p class="text-sm text-gray-500 mt-1">
                            Password minimal 8 karakter.
                        </p>
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block mb-1">Role</label>
                        <select name="role" id="role"
                                class="w-full border-gray-300 rounded-md shadow-sm"
                                required>
                            <option value="">-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>

                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded">
                        Simpan
                    </button>

                    <a href="{{ route('users.index') }}"
                       class="px-4 py-2 bg-gray-200 text-gray-800 rounded">
                        Kembali
                    </a>
                </form>

            </div>
        </div>
    </div>
@endsection