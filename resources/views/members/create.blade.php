
@extends('layouts.app')

@section('title', 'Tambah Member')

@section('content')

<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-900">
        Tambah Member
    </h2>
    <p class="mt-1 text-sm text-slate-500">
        Masukkan informasi member yang ingin ditambahkan.
    </p>
</div>

<form action="{{ route('members.store') }}" method="POST"
      class="bg-white rounded-xl">

    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <div>
            <label for="name"
                   class="block text-sm font-medium text-slate-700 mb-2">
                Nama Member
            </label>
            <input
                type="text"
                id="name"
                name="name"
                placeholder="Masukkan nama member"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                value="{{ old('name') }}"
            >
            @error('name')
                <p class="text-sm text-red-600 mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

    </div>

    <div class="mt-7 flex justify-end">
        <button
            type="submit"
            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
            Simpan Member
        </button>
    </div>

</form>

@endsection
