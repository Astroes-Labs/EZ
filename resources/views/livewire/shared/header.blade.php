<header class="bg-[#111827] border-b border-[#222f53] backdrop-blur-xl fixed w-full top-0 z-50">
    <div class="max-w-screen-2xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-20">

            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" wire:navigate class="flex items-center gap-2 group">
                    <img src="{{ url('assets/images/rel-icon.png') }}"
                         class="h-10 sm:h-12 w-auto transition-transform duration-300 group-hover:scale-105"
                         alt="{{ config('app.name') }}">
                    <span class="hidden sm:block font-semibold tracking-tight text-2xl text-white leading-none">
                        {{ ucfirst(config('app.name')) }}
                    </span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-8 text-sm font-medium text-gray-200">

                <a href="{{ route('home') }}" wire:navigate 
                   class="hover:text-[#eac46e] transition-colors">
                    Overview
                </a>

                <!-- Platform Dropdown -->
                <div class="relative group">
                    <button class="flex items-center gap-1 hover:text-[#eac46e] transition-colors">
                        Platform
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute hidden group-hover:block pt-3 w-56 bg-[#1a2238] border border-[#222f53] rounded-2xl shadow-2xl py-2 z-50">
                        <a href="{{ route('about') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">
                           Company Overview
                        </a>
                        <a href="{{ route('testimonials') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">
                           User Feedback
                        </a>
                        <a href="{{ route('faq') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">
                           Help Center
                        </a>
                    </div>
                </div>

                <!-- Trading Dropdown -->
                <div class="relative group">
                    <button class="flex items-center gap-1 hover:text-[#eac46e] transition-colors">
                        Trading
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute hidden group-hover:block pt-3 w-56 bg-[#1a2238] border border-[#222f53] rounded-2xl shadow-2xl py-2 z-50">
                        <a href="{{ route('pricing') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">
                           Strategy Plans
                        </a>
                        <a href="{{ route('how') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">
                           Execution Flow
                        </a>
                    </div>
                </div>

                <!-- Compliance Dropdown -->
                <div class="relative group">
                    <button class="flex items-center gap-1 hover:text-[#eac46e] transition-colors">
                        Compliance
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute hidden group-hover:block pt-3 w-56 bg-[#1a2238] border border-[#222f53] rounded-2xl shadow-2xl py-2 z-50">
                        <a href="{{ route('terms') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">
                           Terms of Use
                        </a>
                        <a href="{{ route('privacy') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">
                           Data Policy
                        </a>
                    </div>
                </div>

                <a href="{{ route('contact') }}" wire:navigate 
                   class="hover:text-[#eac46e] transition-colors">
                    Support
                </a>
            </nav>

            <!-- Desktop Auth -->
            <div class="hidden lg:flex items-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}" wire:navigate
                       class="px-6 py-2.5 text-sm font-semibold bg-[#222f53] hover:bg-[#2a3a6b] border border-[#eac46e]/30 hover:border-[#eac46e] rounded-2xl transition-all">
                        Open Terminal
                    </a>
                @else
                    <a href="{{ route('login') }}" wire:navigate
                       class="px-6 py-2.5 text-sm font-medium text-gray-300 hover:text-white transition-colors">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" wire:navigate
                       class="px-7 py-2.5 text-sm font-bold bg-[#eac46e] text-[#111827] rounded-2xl hover:bg-amber-300 transition-all active:scale-95">
                        Create Account
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button wire:click="toggleMenu" 
                    class="lg:hidden w-10 h-10 flex items-center justify-center text-2xl text-gray-300 hover:text-[#eac46e] transition-colors focus:outline-none">
                <i class="fa {{ $menuOpen ? 'fa-xmark' : 'fa-bars' }}"></i>
            </button>
        </div>
    </div>
</header>