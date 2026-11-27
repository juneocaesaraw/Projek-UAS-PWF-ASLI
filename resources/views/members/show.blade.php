
@extends('layouts.app')

@section('title', 'Member Details')

@section('content')

{{-- Container utama halaman detail member --}}
<div class="bg-white rounded-xl border border-slate-200 p-6">

    {{-- Breadcrumb untuk menunjukkan posisi halaman --}}
    <p class="text-sm text-slate-500 mb-2">SiPustaka / Members / Details</p>

    <h2 class="text-2xl font-bold text-slate-900 mb-6">
        Member Details
    </h2>

    {{-- Menampilkan informasi nama member yang dipilih --}}
    <div class="mb-6">
        <p class="text-sm text-slate-500 mb-1">Member Name</p>
        <p class="text-lg font-semibold">{{ $member->name }}</p>
    </div>

    {{-- Tombol untuk mengedit data atau kembali ke daftar member --}}
    <div class="flex gap-3">

        <a href="{{ route('members.edit', $member->id) }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            Edit
        </a>

        <a href="{{ route('members.index') }}"
           class="bg-slate-500 hover:bg-slate-600 text-white px-4 py-2 rounded-lg">
            Back
        </a>
    </div>
</div>
@endsection
