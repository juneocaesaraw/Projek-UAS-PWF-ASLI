@extends('layouts.app')

@section('title', 'Manajemen Pengguna')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manajemen Pengguna
    </h2>
@endsection

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">
                        Daftar Pengguna
                    </h3>

                    <a href="{{ route('users.create') }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded">
                        + Tambah Pengguna
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-3">No</th>
                                <th class="border p-3">Nama</th>
                                <th class="border p-3">Email</th>
                                <th class="border p-3">Role</th>
                                <th class="border p-3">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="border p-3">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="border p-3">
                                        {{ $user->name }}
                                    </td>
                                    <td class="border p-3">
                                        {{ $user->email }}
                                    </td>
                                    <td class="border p-3">
                                        {{ ucfirst($user->role) }}
                                    </td>
                                    <td class="border p-3">
                                        <div class="flex gap-2">
                                            <a href="{{ route('users.show', $user) }}"
                                               class="text-blue-600">
                                                Detail
                                            </a>

                                            <a href="{{ route('users.edit', $user) }}"
                                               class="text-yellow-600">
                                                Edit
                                            </a>

                                            @if ($user->id !== auth()->id())
                                                <form action="{{ route('users.destroy', $user) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="text-red-600">
                                                        Hapus
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border p-3 text-center">
                                        Belum ada pengguna.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
