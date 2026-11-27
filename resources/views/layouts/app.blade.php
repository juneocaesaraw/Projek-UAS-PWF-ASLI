<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Mengatur karakter, responsivitas halaman, dan perlindungan CSRF --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Mengatur judul halaman yang dapat disesuaikan melalui setiap halaman --}}
    <title>@yield('title', 'Library System')</title>

    {{-- Mengatur favicon atau ikon website --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- Menghubungkan font Figtree sebagai jenis huruf utama aplikasi --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    {{-- Memuat file CSS dan JavaScript menggunakan Laravel Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col">

    {{-- Header utama yang berisi identitas aplikasi dan navigasi --}}
    <header class="bg-white border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-5
                    flex flex-col sm:flex-row sm:items-center
                    sm:justify-between gap-5">

            {{-- Brand: menampilkan nama dan identitas aplikasi --}}
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <div>
                    <h1 class="text-xl font-bold tracking-tight text-slate-900">
                        Library System
                    </h1>
                    <p class="text-xs text-slate-500 mt-1">
                        Library Information System
                    </p>
                </div>
            </a>

            {{-- Navigation: menampilkan menu utama aplikasi --}}
            <nav class="flex flex-wrap items-center gap-2 text-sm font-medium">

                {{-- Menu Dashboard untuk mengakses halaman utama --}}
                <a href="{{ route('dashboard') }}"
                   class="px-4 py-2 rounded-lg transition duration-200
                   {{ request()->is('dashboard') ? 'text-blue-700 bg-blue-50' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}">
                    Dashboard
                </a>

                {{-- Menu pengelolaan perpustakaan yang dapat diakses admin dan petugas --}}
                @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'petugas']))

                    {{-- Menu untuk melihat dan mengelola data buku --}}
                    <a href="{{ route('books.index') }}"
                       class="px-4 py-2 rounded-lg transition duration-200
                       {{ request()->is('books*') ? 'text-blue-700 bg-blue-50' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}">
                        Books
                    </a>

                    {{-- Menu untuk melihat dan mengelola kategori buku --}}
                    <a href="{{ route('categories.index') }}"
                       class="px-4 py-2 rounded-lg transition duration-200
                       {{ request()->is('categories*') ? 'text-blue-700 bg-blue-50' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}">
                        Categories
                    </a>

                    {{-- Menu untuk melihat dan mengelola data anggota perpustakaan --}}
                    <a href="{{ route('members.index') }}"
                       class="px-4 py-2 rounded-lg transition duration-200
                       {{ request()->is('members*') ? 'text-blue-700 bg-blue-50' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}">
                        Members
                    </a>

                    {{-- Menu untuk mengelola transaksi peminjaman dan pengembalian buku --}}
                    <a href="{{ route('borrowings.index') }}"
                    class="px-4 py-2 rounded-lg transition duration-200
                    {{ request()->is('borrowings*') ? 'text-blue-700 bg-blue-50' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}">
                        Borrowings
                    </a>

                @endif

                {{-- Menu Users hanya ditampilkan kepada pengguna dengan role admin --}}
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('users.index') }}"
                       class="px-4 py-2 rounded-lg transition duration-200
                       {{ request()->is('users*') ? 'text-blue-700 bg-blue-50' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}">
                        Users
                    </a>
                @endif

                {{-- Account menu: menampilkan informasi akun dan tindakan pengguna --}}
                @auth
                    <div class="flex flex-wrap items-center gap-3 border-l border-slate-200 pl-4 ml-2">

                        {{-- Menampilkan nama dan role pengguna yang sedang login --}}
                        <span class="text-slate-600">
                            {{ auth()->user()->name }}
                            <span class="text-xs text-slate-400">
                                ({{ auth()->user()->role }})
                            </span>
                        </span>

                        {{-- Tautan untuk mengakses halaman pengaturan profil pengguna --}}
                        <a href="{{ route('profile.edit') }}"
                           class="text-blue-700 hover:underline">
                            Profile
                        </a>

                        {{-- Form untuk menjalankan proses logout --}}
                        <form method="POST" action="{{ route('logout') }}">
                            {{-- Token CSRF untuk keamanan proses logout --}}
                            @csrf

                            <button type="submit"
                                    class="px-3 py-2 rounded-lg text-red-600 hover:bg-red-50 transition">
                                Logout
                            </button>
                        </form>
                    </div>
                @endauth

            </nav>
        </div>
    </header>

    {{-- Main Content: area untuk menampilkan konten dari setiap halaman --}}
    <main class="max-w-7xl mx-auto px-6 lg:px-8 py-8 w-full flex-1">

        {{-- Memanggil konten sesuai halaman yang sedang dibuka --}}
        @yield('content')

    </main>

    {{-- Footer: menampilkan informasi hak cipta dan identitas aplikasi --}}
    <footer class="mt-8 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-5
                    flex flex-col sm:flex-row items-center
                    justify-between gap-2 text-sm text-slate-500">

            {{-- Menampilkan tahun secara otomatis dan nama aplikasi --}}
            <p>
                &copy; {{ date('Y') }} Library System
            </p>

            {{-- Deskripsi singkat aplikasi --}}
            <p>
                Library Information System
            </p>

        </div>
    </footer>

</body>
</html>
