@extends('layouts.app')

@section('title', 'Detail Member')

@section('content')
<div class="bg-white rounded-xl border border-slate-200 p-6">
    <p class="text-sm text-slate-500 mb-2">Library System / Members / Detail</p>

    <h2 class="text-2xl font-bold text-slate-900 mb-6">
        Detail Member
    </h2>

    <div class="mb-6">
        <p class="text-sm text-slate-500 mb-1">Nama Member</p>
        <p class="text-lg font-semibold">{{ $member->name }}</p>
    </div>

    <div class="flex gap-3">
        <a href="{{ route('members.edit', $member->id) }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            Edit
        </a>

        <a href="{{ route('members.index') }}"
           class="bg-slate-500 hover:bg-slate-600 text-white px-4 py-2 rounded-lg">
            Kembali
        </a>
    </div>
</div>
@endsection
