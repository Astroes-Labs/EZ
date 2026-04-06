{{-- File: resources/views/admin/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | {{ config('app.name') }}</title>

    

    <!-- Tailwind CSS  -->
    
    <!--@ v ite(['resources/css/app.css'])-->
    
    <!-- Tailwind Play CDN Link -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;display=swap');

        body {
            font-family: 'Inter', system_ui, sans-serif;
        }

        .sidebar-link {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-link:hover {
            transform: translateX(8px);
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- SIDEBAR -->
        <div
            class="sidebar fixed inset-y-0 left-0 z-50 w-72 bg-white border-r border-gray-200 flex flex-col shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
            <!-- Logo -->
            <div class="p-6 border-b flex items-center gap-4">
                <div
                    class="w-11 h-11 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center text-white text-3xl font-bold shadow-inner">
                    M
                </div>
                <div>
                    <span class="text-2xl font-semibold tracking-tight text-gray-900">{{ config('app.name') }}</span>
                    <p class="text-xs text-gray-500 -mt-1">ADMIN PANEL</p>
                </div>
            </div>

            <!-- Close button -->
            <button onclick="document.querySelector('.sidebar').classList.add('-translate-x-full')"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-900 lg:block">
                <i class="fas fa-times text-lg"></i>
            </button>

            <!-- Navigation -->
            @php
                $sidebarLinks = [
                    ['route' => 'admin.dashboard', 'icon' => 'fas fa-tachometer-alt', 'label' => 'Dashboard', 'pattern' => 'admin.dashboard'],
                    ['route' => 'admin.users.index', 'icon' => 'fas fa-users', 'label' => 'Users', 'pattern' => 'admin.users.*'],
                    ['route' => 'admin.deposits.index', 'icon' => 'fas fa-hand-holding-usd', 'label' => 'Deposits', 'pattern' => 'admin.deposits.*'],
                    ['route' => 'admin.withdrawals.index', 'icon' => 'fas fa-wallet', 'label' => 'Withdrawals', 'pattern' => 'admin.withdrawals.*'],
                    ['route' => 'admin.traders.index', 'icon' => 'fas fa-chart-line', 'label' => 'Traders', 'pattern' => 'admin.traders.*'],
                    // ['route' => 'admin.withdrawals.index', 'icon' => 'fas fa-exchange-alt', 'label' => 'Trades', 'pattern' => 'admin.trades.*'],
                    ['route' => 'admin.coming.soon', 'icon' => 'fas fa-wallet', 'label' => 'Wallets', 'pattern' => 'admin.wallets.*'],
                    ['route' => 'admin.coming.soon', 'icon' => 'fas fa-bell', 'label' => 'Notifications', 'pattern' => 'admin.notifications.*'],
                    ['route' => 'admin.coming.soon', 'icon' => 'fas fa-user-shield', 'label' => 'Admins', 'pattern' => 'admin.admins.*'],
                    ['route' => 'admin.coming.soon', 'icon' => 'fas fa-cogs', 'label' => 'Settings', 'pattern' => 'admin.settings.*'],
                ];
            @endphp

            <nav class="flex-1 px-4 py-6 overflow-y-auto">
                <ul class="space-y-1">
                    @foreach ($sidebarLinks as $link)
                        <li>
                            <a href="{{ route($link['route']) }}"
                                class="sidebar-link flex items-center gap-3 px-5 py-3.5 rounded-2xl text-sm font-medium
                                      {{ request()->routeIs($link['pattern']) ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                                <i class="{{ $link['icon'] }} w-5"></i>
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <!-- Logout -->
            <div class="p-4 border-t">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-3 px-6 py-3.5 text-red-600 hover:bg-red-50 rounded-2xl text-sm font-medium transition">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col overflow-hidden lg:ml-72">
            <!-- Top Header -->
            <header class="bg-white border-b px-8 py-5 flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-4">
                    <!-- Hamburger for mobile -->
                    <button onclick="document.querySelector('.sidebar').classList.toggle('-translate-x-full')"
                        class="lg:hidden text-gray-600 hover:text-gray-900">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <h1 class="text-2xl font-semibold text-gray-900">@yield('title', 'Dashboard')</h1>
                </div>

                <div class="flex items-center gap-8">
                    <!-- User Info -->
                    @php

                        $admin = Auth::guard('admin')->user();
                    @endphp
                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            {{-- <p class="font-medium text-gray-900 text-sm">{{ $admin->name }}</p> --}}
                            <p class="text-xs text-gray-500">{{ $admin->email }}</p>
                        </div>
                        <div
                            class="w-9 h-9 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center text-white font-bold text-lg">

                            <img class="h-9 w-9 rounded-full object-cover border-2 border-gray-200"
                                src="https://ui-avatars.com/api/?name={{ urlencode($admin->email) }}&background=random"
                                alt="{{ $admin->email }}">

                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-auto p-8 bg-gray-50">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: "5000"
        };

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>
    <!-- At the bottom before </body> -->
    @stack('scripts')
</body>

</html>