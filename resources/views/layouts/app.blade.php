<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Library System')</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 text-slate-800 antialiased">
    <div class="min-h-screen flex flex-col">

        <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-4 py-4 sm:flex-row sm:items-center sm:justify-between">

                    <a href="/dashboard" class="flex items-center gap-3 group">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-blue-700 to-indigo-700 text-xl text-white shadow-md shadow-blue-200 transition group-hover:scale-105">
                            📚
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-blue-600">
                                Library
                            </p>
                            <h1 class="text-xl font-bold tracking-tight text-slate-900">
                                System
                            </h1>
                        </div>
                    </a>

                    <nav class="flex flex-wrap items-center gap-1 rounded-xl border border-slate-200 bg-slate-50 p-1">
                        @php
                            $navItems = [
                                ['label' => 'Dashboard', 'url' => '/dashboard', 'pattern' => 'dashboard'],
                                ['label' => 'Books', 'url' => '/books', 'pattern' => 'books*'],
                                ['label' => 'Categories', 'url' => '/categories', 'pattern' => 'categories*'],
                                ['label' => 'Members', 'url' => '/members', 'pattern' => 'members*'],
                            ];
                        @endphp

                        @foreach ($navItems as $item)
                            <a
                                href="{{ $item['url'] }}"
                                class="rounded-lg px-4 py-2 text-sm font-medium transition
                                {{ request()->is($item['pattern'])
                                    ? 'bg-blue-600 text-white shadow-sm shadow-blue-200'
                                    : 'text-slate-600 hover:bg-white hover:text-blue-700' }}"
                            >
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </nav>

                </div>
            </div>
        </header>

        <main class="flex-1">
            <div class="max-w-6xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-200 bg-gradient-to-r from-blue-50 via-white to-indigo-50 px-6 py-6 sm:px-8">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-blue-600">
                                    Library Management
                                </p>

                                <h2 class="mt-1 text-2xl font-bold tracking-tight text-slate-900">
                                    @yield('title', 'Dashboard')
                                </h2>

                                <p class="mt-1 text-sm text-slate-500">
                                    Kelola data perpustakaan dengan mudah dan terorganisir.
                                </p>
                            </div>

                            @hasSection('action')
                                @yield('action')
                            @endif
                        </div>
                    </div>

                    <div class="px-6 py-6 sm:px-8">
                        @yield('content')
                    </div>

                </div>
            </div>
        </main>

        <footer class="border-t border-slate-200 bg-slate-900">
            <div class="max-w-6xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                <div class="flex flex-col items-center justify-between gap-2 text-center sm:flex-row sm:text-left">
                    <div>
                        <p class="text-sm font-medium text-white">
                            📚 Library System
                        </p>
                        <p class="text-xs text-slate-400 mt-1">
                            Sistem manajemen perpustakaan sederhana.
                        </p>
                    </div>

                    <p class="text-xs text-slate-400">
                        &copy; {{ date('Y') }} Library System
                    </p>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>
