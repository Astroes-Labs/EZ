<!DOCTYPE html>
<html lang="en" @class(['dark' => session('theme') === 'dark'])>

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('assets/images/rel-icon.png') }}">
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <!-- Your custom style.css (keep for legacy, but Tailwind overrides) -->
    {{-- <link rel="stylesheet" href="{{ url('static/web/css/style.css') }}"> --}}
    @livewireStyles
</head>

<body class="bg-white text-gray-900 transition-colors duration-300">
    <!-- Floating Dark Mode Switch (Livewire Component) -->
    {{-- <livewire:dark-mode-toggle /> --}}

    <!-- Top Scroll (keep, but add Tailwind animation) -->
    <div
        class="top-scroll transition fixed bottom-4 left-4 bg-red-500 text-white rounded-full p-2 shadow-lg hover:bg-red-600 animate-bounce">
        <a href="#banner" class="scrollTo"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    </div>

    {{-- <livewire:header-nav /> --}}

    @yield('content')

    @include('layouts.home.footer')

    <!-- Alerts Component -->
    @include('components.alert')

    @vite('resources/js/app.js') <!-- For Alpine if needed -->
    @livewireScripts
    @yield('xtraJs')
</body>

</html>