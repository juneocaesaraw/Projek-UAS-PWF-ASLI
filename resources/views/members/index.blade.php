
@extends('layouts.app')

@section('title', 'Member List')

@section('content')

{{-- Menampilkan notifikasi jika operasi berhasil dilakukan --}}
@if (session('success'))
    <div class="bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
        <p>{{ session('success') }}</p>
    </div>
@endif

{{-- Header halaman daftar member --}}
<div class="flex flex-col sm:flex-row sm:items-center
            sm:justify-between gap-4 mb-6">

    <div>
        {{-- Breadcrumb untuk menunjukkan posisi halaman --}}
        <p class="text-sm font-medium text-blue-600 mb-2">
            SiPustaka / Members
        </p>

        <h2 class="text-2xl font-bold text-slate-900">
            Member List
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Manage library members.
        </p>
    </div>

    {{-- Tombol menuju halaman tambah member --}}
    <a href="{{ route('members.create') }}"
       class="inline-flex items-center justify-center gap-2
              bg-blue-600 text-white px-4 py-2.5 rounded-lg
              text-sm font-semibold shadow-sm
              hover:bg-blue-700 transition">
        <span class="text-lg leading-none">+</span>
        Add Member
    </a>

</div>

{{-- Container daftar seluruh member --}}
<div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

    <div class="px-5 py-4 border-b border-slate-200">
        <h3 class="text-sm font-semibold text-slate-800">
            Library Members
        </h3>
    </div>

    {{-- Menampilkan setiap member dari data yang dikirim controller --}}
    @foreach($members as $member)

        <div class="flex flex-col sm:flex-row sm:items-center
                    justify-between gap-4 px-5 py-4
                    border-b border-slate-100 last:border-b-0
                    hover:bg-slate-50 transition">

            {{-- Menampilkan informasi nama member --}}
            <div class="min-w-0">
                <h4 class="text-sm font-semibold text-slate-900">
                    {{ $member->name }}
                </h4>
            </div>

            {{-- Kumpulan aksi untuk setiap member --}}
            <div class="flex items-center gap-4 text-sm font-medium
                        shrink-0">

                {{-- Menu untuk melihat detail member --}}
                <a href="{{ route('members.show', $member) }}"
                   class="text-blue-600 hover:text-blue-800 transition">
                    Details
                </a>

                {{-- Menu untuk mengubah data member --}}
                <a href="{{ route('members.edit', $member) }}"
                   class="text-slate-600 hover:text-blue-600 transition">
                    Edit
                </a>

                {{-- Form untuk menghapus data member --}}
                <form action="{{ route('members.destroy', $member) }}"
                      method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this member?')">

                    {{-- Token keamanan dan metode DELETE --}}
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="text-red-500 hover:text-red-700 transition">
                        Delete
                    </button>
                </form>

            </div>

        </div>

    @endforeach

</div>

@endsection
