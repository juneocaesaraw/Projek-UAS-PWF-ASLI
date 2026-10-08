<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library System')</title>
    <link rel="icon" href="/favicon.ico">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased min-h-screen flex flex-col justify-between">

    <!-- Header & Navigasi -->
    <header class="bg-white border-b border-gray-200">
        <div class="max-w-5xl mx-auto px-4 py-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h1 class="text-xl font-bold text-gray-900 tracking-tight">📚 Library System</h1>
            <nav class="flex gap-4 text-sm font-medium text-gray-600">
                <a href="/dashboard" class="text-blue-600 hover:text-blue-800 transition">Dashboard</a>
                <a href="/books" class="hover:text-blue-600 transition">Books</a>
                <a href="/categories" class="hover:text-blue-600 transition">Categories</a>
                <a href="/members" class="hover:text-blue-600 transition">Members</a>
            </nav>
        </div>
    </header>

    <!-- Konten Halaman -->
    <main class="max-w-5xl mx-auto px-4 py-8 w-full flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-4 text-center text-xs text-gray-400">
        <p>&copy; {{ date('Y') }} Library System. All rights reserved.</p>
    </footer>

</body>
</html>