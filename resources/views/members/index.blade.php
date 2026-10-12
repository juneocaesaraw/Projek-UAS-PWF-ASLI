
@extends('layouts.app')

@section('title', 'Data Member')

@section('content')

    <div class="mb-6">
        <p class="text-sm text-slate-500 mb-2">Library System / Members</p>
        <h1 class="text-2xl font-bold text-slate-900">Data Member</h1>
        <p class="text-sm text-slate-500 mt-1">Daftar anggota perpustakaan.</p>
    </div>

    <ul class="divide-y divide-slate-200 rounded-lg border border-slate-200">
        @foreach($members as $member)
            <li class="px-4 py-3 text-slate-700 hover:bg-blue-50 transition">
                {{ $member }}
            </li>
        @endforeach
    </ul>

@endsection
