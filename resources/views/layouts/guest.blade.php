<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>NFCare - Login</title>

        <!-- Plus Jakarta Sans Premium Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-premium-bg text-gray-900 selection:bg-red-100">
        <!-- Background Decoration -->
        <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
            <div class="absolute -top-[20%] -left-[10%] w-[70%] h-[50%] rounded-full bg-red-100/40 blur-3xl"></div>
            <div class="absolute top-[20%] -right-[20%] w-[60%] h-[60%] rounded-full bg-blue-100/40 blur-3xl"></div>
        </div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="mb-4">
                <a href="/">
                    <x-application-logo class="h-32 w-auto max-w-full object-contain" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-8 px-6 py-8 bg-premium-card backdrop-blur-xl border border-premium-border overflow-hidden rounded-[2rem]">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
