<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Library System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-slate-900 antialiased">

    <div class="min-h-screen flex flex-col items-center justify-center
                bg-slate-50 px-4 py-8">

        <!-- Logo Laravel Breeze -->
        <a href="/" class="mb-6">
            <x-application-logo
                class="w-16 h-16 fill-current text-blue-600"
            />
        </a>

        <!-- Form Container -->
        <div class="w-full sm:max-w-md px-6 py-6
                    bg-white border border-slate-200
                    shadow-sm overflow-hidden rounded-xl">

            {{ $slot }}

        </div>

        <!-- Footer -->
        <p class="text-xs text-slate-400 text-center mt-6">
            &copy; {{ date('Y') }} Library System
        </p>

    </div>

</body>
</html>
