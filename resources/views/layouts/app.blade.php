<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Library System</title>
    <link rel="icon" href="/favicon.ico">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-slate-50 text-slate-700 antialiased">

    <!-- Header & Navigasi -->
    <header class="bg-indigo-600 text-white shadow">
        <div class="max-w-5xl mx-auto px-4 py-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <a href="/dashboard" class="text-xl font-bold tracking-tight">📚 Library System</a>

            <nav class="flex flex-wrap gap-1 text-sm font-medium">
                @foreach (['Dashboard' => 'dashboard', 'Books' => 'books', 'Categories' => 'categories', 'Members' => 'members'] as $label => $path)
                    <a href="/{{ $path }}"
                       class="rounded-lg px-3 py-1.5 transition
                              {{ request()->is($path . '*') ? 'bg-white text-indigo-700' : 'text-indigo-100 hover:bg-indigo-500' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>
        </div>
    </header>

    <!-- Konten Halaman -->
    <main class="max-w-5xl mx-auto px-4 py-8 w-full flex-1">

        @if (session('success'))
            <div class="mb-6 rounded-lg bg-emerald-50 border border-emerald-200 px-4 py-3 text-sm text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-4 text-center text-xs text-slate-400">
        &copy; {{ date('Y') }} Library System
    </footer>

</body>
</html>