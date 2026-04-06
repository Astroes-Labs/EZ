<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gradient-to-br from-gray-950 via-black to-red-950 min-h-screen text-gray-200 antialiased">

    <!-- Optional red glow overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-red-900/20 via-transparent to-transparent pointer-events-none">
    </div>

    <div class="relative z-10">
        @yield('content')
    </div>


    @vite('resources/js/app.js') <!-- For Alpine if needed -->
    @livewireScripts

    @if(session('toast'))
        <script>
            // document.addEventListener('DOMContentLoaded', function () {
            //     const toast = @json(session('toast'));
            //     toastr[toast.type](toast.message);
            // });
        </script>
    @endif
</body>

</html>