@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<div class="bg-white rounded-xl border border-slate-200 p-6">
    <p class="text-sm text-slate-500 mb-2">
        Library System / Categories / Detail
    </p>

    <h2 class="text-2xl font-bold text-slate-900 mb-6">
        Detail Kategori
    </h2>

    <div class="mb-6">
        <p class="text-sm text-slate-500 mb-1">Nama Kategori</p>
        <p class="text-lg font-semibold text-slate-900">
            {{ $category->name }}
        </p>
    </div>

    <a href="{{ route('categories.index') }}"
       class="inline-block bg-slate-600 hover:bg-slate-700 text-white px-4 py-2 rounded-lg">
        Kembali
    </a>
</div>
@endsection
