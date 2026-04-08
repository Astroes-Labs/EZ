<header class="bg-[#111827] border-b border-[#222f53] backdrop-blur-xl fixed w-full top-0 z-50">
    <div class="max-w-screen-2xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-20">

            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" wire:navigate class="flex items-center gap-3 group">
                    <img src="{{ url('assets/images/rel-icon.png') }}"
                         class="h-18 sm:h-20 w-auto transition-transform duration-300 group-hover:scale-105"
                         alt="{{ config('app.name') }}">
                    <span class="hidden sm:block font-normal tracking-tighter text-3xl text-white mx-0">{{ ucfirst(config('app.name')) }}</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-8 text-sm font-medium text-gray-200">
                <a href="{{ route('home') }}" wire:navigate 
                   class="nav-link hover:text-[#eac46e] transition-colors">Home</a>

                <!-- About Dropdown -->
                <div class="relative group">
                    <button class="flex items-center gap-1 hover:text-[#eac46e] transition-colors">
                        About
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute hidden group-hover:block pt-3 w-52 bg-[#1a2238] border border-[#222f53] rounded-2xl shadow-2xl py-2 z-50">
                        <a href="{{ route('about') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">About Us</a>
                        <a href="{{ route('testimonials') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">Testimonials</a>
                        <a href="{{ route('faq') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">FAQs</a>
                    </div>
                </div>

                <!-- Investments Dropdown -->
                <div class="relative group">
                    <button class="flex items-center gap-1 hover:text-[#eac46e] transition-colors">
                        Investments
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute hidden group-hover:block pt-3 w-56 bg-[#1a2238] border border-[#222f53] rounded-2xl shadow-2xl py-2 z-50">
                        <a href="{{ route('pricing') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">Investment Plans</a>
                        <a href="{{ route('how') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">How It Works</a>
                    </div>
                </div>

                <!-- Legal Dropdown -->
                <div class="relative group">
                    <button class="flex items-center gap-1 hover:text-[#eac46e] transition-colors">
                        Legal
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute hidden group-hover:block pt-3 w-56 bg-[#1a2238] border border-[#222f53] rounded-2xl shadow-2xl py-2 z-50">
                        <a href="{{ route('terms') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">Terms & Conditions</a>
                        <a href="{{ route('privacy') }}" wire:navigate 
                           class="block px-6 py-3 hover:bg-[#222f53] hover:text-[#eac46e] transition-colors">Privacy Policy</a>
                    </div>
                </div>

                <a href="{{ route('contact') }}" wire:navigate 
                   class="nav-link hover:text-[#eac46e] transition-colors">Contact</a>
            </nav>

            <!-- Desktop Auth Buttons -->
            <div class="hidden lg:flex items-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}" wire:navigate
                       class="px-6 py-2.5 text-sm font-semibold bg-[#222f53] hover:bg-[#2a3a6b] border border-[#eac46e]/30 hover:border-[#eac46e] rounded-2xl transition-all">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" wire:navigate
                       class="px-6 py-2.5 text-sm font-medium text-gray-300 hover:text-white transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}" wire:navigate
                       class="px-7 py-2.5 text-sm font-bold bg-[#eac46e] text-[#111827] rounded-2xl hover:bg-amber-300 transition-all active:scale-95">
                        Get Started
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

    <!-- Mobile Menu -->
    @if ($menuOpen)
        <div class="lg:hidden bg-[#1a2238] border-t border-[#222f53] py-6">
            <div class="max-w-screen-2xl mx-auto px-6 space-y-6 text-lg">

                <a href="{{ route('home') }}" wire:navigate 
                   class="block py-2 hover:text-[#eac46e] transition-colors">Home</a>

                <!-- About Accordion -->
                <div>
                    <button wire:click="toggleSub('about')" 
                            class="w-full text-left flex justify-between items-center py-3 hover:text-[#eac46e]">
                        About
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="w-5 h-5 transition-transform {{ ($subOpen['about'] ?? false) ? 'rotate-180' : '' }}" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    @if ($subOpen['about'] ?? false)
                        <div class="pl-6 space-y-4 border-l border-[#222f53] mt-2">
                            <a href="{{ route('about') }}" wire:navigate class="block hover:text-[#eac46e]">About Us</a>
                            <a href="{{ route('testimonials') }}" wire:navigate class="block hover:text-[#eac46e]">Testimonials</a>
                            <a href="{{ route('faq') }}" wire:navigate class="block hover:text-[#eac46e]">FAQs</a>
                        </div>
                    @endif
                </div>

                <!-- Investments Accordion -->
                <div>
                    <button wire:click="toggleSub('investments')" 
                            class="w-full text-left flex justify-between items-center py-3 hover:text-[#eac46e]">
                        Investments
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="w-5 h-5 transition-transform {{ ($subOpen['investments'] ?? false) ? 'rotate-180' : '' }}" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    @if ($subOpen['investments'] ?? false)
                        <div class="pl-6 space-y-4 border-l border-[#222f53] mt-2">
                            <a href="{{ route('pricing') }}" wire:navigate class="block hover:text-[#eac46e]">Investment Plans</a>
                            <a href="{{ route('how') }}" wire:navigate class="block hover:text-[#eac46e]">How It Works</a>
                        </div>
                    @endif
                </div>

                <!-- Legal Accordion -->
                <div>
                    <button wire:click="toggleSub('legal')" 
                            class="w-full text-left flex justify-between items-center py-3 hover:text-[#eac46e]">
                        Legal
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="w-5 h-5 transition-transform {{ ($subOpen['legal'] ?? false) ? 'rotate-180' : '' }}" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    @if ($subOpen['legal'] ?? false)
                        <div class="pl-6 space-y-4 border-l border-[#222f53] mt-2">
                            <a href="{{ route('terms') }}" wire:navigate class="block hover:text-[#eac46e]">Terms & Conditions</a>
                            <a href="{{ route('privacy') }}" wire:navigate class="block hover:text-[#eac46e]">Privacy Policy</a>
                        </div>
                    @endif
                </div>

                <a href="{{ route('contact') }}" wire:navigate 
                   class="block py-3 hover:text-[#eac46e] transition-colors">Contact</a>

                <!-- Mobile Auth Buttons -->
                <div class="pt-6 border-t border-[#222f53] flex flex-col gap-4">
                    @auth
                        <a href="{{ route('dashboard') }}" wire:navigate
                           class="text-center py-4 bg-[#222f53] hover:bg-[#2a3a6b] border border-[#eac46e]/30 rounded-2xl font-semibold">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" wire:navigate
                           class="text-center py-4 border border-[#eac46e]/30 hover:border-[#eac46e] rounded-2xl font-medium">
                            Login
                        </a>
                        <a href="{{ route('register') }}" wire:navigate
                           class="text-center py-4 bg-[#eac46e] text-[#111827] font-bold rounded-2xl hover:bg-amber-300">
                            Get Started Free
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    @endif
</header>