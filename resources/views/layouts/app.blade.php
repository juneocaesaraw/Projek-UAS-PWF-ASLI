
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Library System')</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-5
                    flex flex-col sm:flex-row sm:items-center
                    sm:justify-between gap-5">

            <!-- Brand -->
            <div class="flex items-center gap-3">

                <div>
                    <h1 class="text-xl font-bold tracking-tight text-slate-900">
                        Library System
                    </h1>
                    <p class="text-xs text-slate-500 mt-1">
                        Sistem Informasi Perpustakaan
                    </p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex flex-wrap items-center gap-2 text-sm font-medium">

               
                <a href="/dashboard"
                class="px-4 py-2 rounded-lg transition duration-200
                {{ request()->is('dashboard') ? 'text-blue-700 bg-blue-50' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}">
                    Dashboard
                </a>



                <a href="/books"
                class="px-4 py-2 rounded-lg transition duration-200
                {{ request()->is('books*') ? 'text-blue-700 bg-blue-50' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}">
                    Books
                </a>

                <a href="/categories"
                class="px-4 py-2 rounded-lg transition duration-200
                {{ request()->is('categories*') ? 'text-blue-700 bg-blue-50' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}">
                    Categories
                </a>
    
                <a href="/members"
                class="px-4 py-2 rounded-lg transition duration-200
                {{ request()->is('members*') ? 'text-blue-700 bg-blue-50' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}">
                    Members
                </a>


            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 lg:px-8 py-8 w-full flex-1">

        <div class="bg-white rounded-2xl border border-slate-200
                    shadow-sm p-5 sm:p-8 min-h-96">

            @yield('content')

        </div>

    </main>

    <!-- Footer -->
    <footer class="mt-8 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-5
                    flex flex-col sm:flex-row items-center
                    justify-between gap-2 text-sm text-slate-500">

            <p>
                &copy; {{ date('Y') }} Library System
            </p>

            <p>
                Sistem Informasi Perpustakaan
            </p>

        </div>
    </footer>

</body>
</html>
