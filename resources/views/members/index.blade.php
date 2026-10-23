
@extends('layouts.app')

@section('title', 'Daftar Member')

@section('content')

@if (session('success'))
    <div class="bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
        <p>{{ session('success') }}</p>
    </div>
@endif

<!-- Header Halaman -->
<div class="flex flex-col sm:flex-row sm:items-center
            sm:justify-between gap-4 mb-6">

    <div>
        <p class="text-sm font-medium text-blue-600 mb-2">
            Library System / Members
        </p>

        <h2 class="text-2xl font-bold text-slate-900">
            Daftar Member
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Kelola anggota perpustakaan.
        </p>
    </div>

    <a href="{{ route('members.create') }}"
       class="inline-flex items-center justify-center gap-2
              bg-blue-600 text-white px-4 py-2.5 rounded-lg
              text-sm font-semibold shadow-sm
              hover:bg-blue-700 transition">
        <span class="text-lg leading-none">+</span>
        Tambah Member
    </a>

</div>

<!-- Daftar Member -->
<div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

    <div class="px-5 py-4 border-b border-slate-200">
        <h3 class="text-sm font-semibold text-slate-800">
            Anggota Perpustakaan
        </h3>
    </div>

    @foreach($members as $member)

        <div class="flex flex-col sm:flex-row sm:items-center
                    justify-between gap-4 px-5 py-4
                    border-b border-slate-100 last:border-b-0
                    hover:bg-slate-50 transition">

            <!-- Informasi Member -->
            <div class="min-w-0">
                <h4 class="text-sm font-semibold text-slate-900">
                    {{ $member->name }}
                </h4>
            </div>

            <!-- Aksi Member -->
            <div class="flex items-center gap-4 text-sm font-medium
                        shrink-0">

                <a href="{{ route('members.show', $member) }}"
                   class="text-blue-600 hover:text-blue-800 transition">
                    Detail
                </a>

                <a href="{{ route('members.edit', $member) }}"
                   class="text-slate-600 hover:text-blue-600 transition">
                    Edit
                </a>

                <form action="{{ route('members.destroy', $member) }}"
                      method="POST"
                      onsubmit="return confirm('Apakah kamu yakin ingin menghapus member ini?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="text-red-500 hover:text-red-700 transition">
                        Hapus
                    </button>
                </form>

            </div>

        </div>

    @endforeach

</div>

@endsection
