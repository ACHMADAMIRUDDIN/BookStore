<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BookStore') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#f7f1e8] selection:bg-amber-950 selection:text-white">
        <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
            <!-- Decorative ambient glows -->
            <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-amber-300/30 blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full bg-amber-900/10 blur-3xl pointer-events-none"></div>

            <!-- Brand Logo -->
            <div class="relative z-10 mb-8 transition-transform duration-300 hover:scale-105">
                <a href="{{ route('landing') }}">
                    <x-application-logo />
                </a>
            </div>

            <!-- Auth Form Card -->
            <div class="relative z-10 w-full sm:max-w-md bg-white p-8 sm:p-10 shadow-2xl shadow-amber-950/10 border border-amber-950/10 rounded-3xl">
                {{ $slot }}
            </div>

            <!-- Footer Note -->
            <div class="relative z-10 mt-8 text-center text-xs text-amber-950/60 font-medium">
                &copy; {{ date('Y') }} BookStore. Seluruh hak cipta dilindungi.
            </div>
        </div>
    </body>
</html>

