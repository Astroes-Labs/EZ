<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="icon" href="{{ url('assets/images/rel-icon.png') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @livewireStyles
</head>
<body class="min-h-screen bg-[#0a0f1c] text-gray-100 font-sans antialiased">

    <main class="min-h-screen flex items-center justify-center px-4 py-12 lg:py-20">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>