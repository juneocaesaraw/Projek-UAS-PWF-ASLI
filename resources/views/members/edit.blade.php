@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
<div class="bg-white rounded-xl border border-slate-200 p-6">
    <p class="text-sm text-slate-500 mb-2">Library System / Members / Edit</p>

    <h2 class="text-2xl font-bold text-slate-900 mb-6">
        Edit Member
    </h2>

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label for="name" class="block text-sm font-medium mb-2">
                Nama Member
            </label>

            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $member->name) }}"
                class="w-full border border-slate-300 rounded-lg px-4 py-2"
                required
            >

            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Simpan Perubahan
            </button>

            <a href="{{ route('members.index') }}"
               class="bg-slate-500 hover:bg-slate-600 text-white px-4 py-2 rounded-lg">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
