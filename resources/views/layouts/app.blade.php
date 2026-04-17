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
    <style>
        :root {
            --teal: #14b8a6;
        }
        .trading-bg {
            background: linear-gradient(180deg, #0f172a 0%, #1e2937 100%);
        }
        .teal-glow {
            box-shadow: 0 0 25px -5px rgb(20 184 166 / 0.5);
        }
    </style>
</head>
<body x-data="{ mobileMenuOpen: false }" class="bg-slate-950 text-slate-200 font-sans antialiased trading-bg min-h-screen">
    
    <livewire:shared.home.header />


    {{-- Flash Messages --}}
    {{-- <livewire:shared.flash-message /> --}}

    {{-- Page Content --}}
    <main class="pt-20">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <livewire:shared.home.footer />

    @livewireScripts
</body>
</html>