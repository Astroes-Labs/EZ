
<header class="bg-[#07070a] border-b border-white/10 backdrop-blur-none fixed w-full top-0 z-50" wire:ignore.self>
    <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">
        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" wire:navigate class="flex items-center gap-3 group">
                    <img src="{{ url('assets/images/rel-icon.png') }}"
                        class="h-10 w-auto transition-transform duration-300 group-hover:scale-105 filter grayscale contrast-125"
                        alt="{{ config('app.name') }}">
                    <span class="hidden sm:block font-black tracking-tighter text-2xl text-white leading-none">
                        {{ strtoupper(config('app.name')) }}
                    </span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-8 text-xs font-mono uppercase tracking-wider text-gray-300">

                <a href="{{ route('home') }}" wire:navigate class="hover:text-[#8b5cf6] transition-colors">Overview</a>

                <!-- Platform Dropdown -->
                <div class="relative group py-2">
                    <button class="flex items-center gap-1.5 hover:text-[#8b5cf6] transition-colors">
                        Platform
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-3.5 h-3.5 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute left-0 hidden group-hover:block pt-2 w-56 bg-[#111116] border border-white/10 shadow-[0_20px_50px_rgba(0,0,0,0.8)] py-2 z-50">
                        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>
                        <a href="{{ route('about') }}" wire:navigate
                            class="block px-6 py-3 hover:bg-[#16161c] hover:text-[#8b5cf6] transition-colors">Company Overview</a>
                        <a href="{{ route('testimonials') }}" wire:navigate
                            class="block px-6 py-3 hover:bg-[#16161c] hover:text-[#8b5cf6] transition-colors">User Feedback</a>
                        <a href="{{ route('faq') }}" wire:navigate
                            class="block px-6 py-3 hover:bg-[#16161c] hover:text-[#8b5cf6] transition-colors">FAQs</a>
                    </div>
                </div>

                <!-- Trading Dropdown -->
                <div class="relative group py-2">
                    <button class="flex items-center gap-1.5 hover:text-[#8b5cf6] transition-colors">
                        Trading
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-3.5 h-3.5 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute left-0 hidden group-hover:block pt-2 w-56 bg-[#111116] border border-white/10 shadow-[0_20px_50px_rgba(0,0,0,0.8)] py-2 z-50">
                        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>
                        <a href="{{ route('pricing') }}" wire:navigate
                            class="block px-6 py-3 hover:bg-[#16161c] hover:text-[#8b5cf6] transition-colors">Strategy Plans</a>
                        <a href="{{ route('how') }}" wire:navigate
                            class="block px-6 py-3 hover:bg-[#16161c] hover:text-[#8b5cf6] transition-colors">How it Works</a>
                    </div>
                </div>

                <!-- Compliance Dropdown -->
                <div class="relative group py-2">
                    <button class="flex items-center gap-1.5 hover:text-[#8b5cf6] transition-colors">
                        Compliance
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-3.5 h-3.5 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute left-0 hidden group-hover:block pt-2 w-56 bg-[#111116] border border-white/10 shadow-[0_20px_50px_rgba(0,0,0,0.8)] py-2 z-50">
                        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>
                        <a href="{{ route('terms') }}" wire:navigate
                            class="block px-6 py-3 hover:bg-[#16161c] hover:text-[#8b5cf6] transition-colors">Terms of Use</a>
                        <a href="{{ route('privacy') }}" wire:navigate
                            class="block px-6 py-3 hover:bg-[#16161c] hover:text-[#8b5cf6] transition-colors">Data Policy</a>
                    </div>
                </div>

                <a href="{{ route('contact') }}" wire:navigate
                    class="hover:text-[#8b5cf6] transition-colors">Support</a>
            </nav>

            <!-- Desktop Auth -->
            <div class="hidden lg:flex items-center gap-4 min-w-[220px] justify-end">
                @if (session('2fa_user_id') || Auth::check())
                    <div class="w-[220px]">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full px-6 py-3 text-xs font-mono font-bold bg-[#111116] hover:bg-[#181820] border border-white/10 text-white uppercase tracking-wider transition-all shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)]">
                                Log Out
                            </button>
                        </form>
                    </div>
                @else
                    @php $currentRoute = Route::currentRouteName(); @endphp
                    @if($currentRoute !== 'login')
                        <a href="{{ route('login') }}" wire:navigate
                            class="px-5 py-3 text-xs font-mono font-semibold text-gray-300 hover:text-white uppercase tracking-wider transition-colors">
                            Sign In
                        </a>
                    @endif

                    @if($currentRoute !== 'register')
                        <a href="{{ route('register') }}" wire:navigate
                            class="px-7 py-3 text-xs font-mono font-bold bg-[#8b5cf6] text-white hover:bg-[#7c3aed] uppercase tracking-wider transition-all shadow-[inset_0_1px_0_rgba(255,255,255,0.2)] border-b-2 border-black/40">
                            Create Account
                        </a>
                    @endif
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="lg:hidden w-10 h-10 flex items-center justify-center text-xl text-gray-300 hover:text-[#8b5cf6] transition-colors focus:outline-none">
                <i :class="mobileMenuOpen ? 'fa-xmark' : 'fa-bars'" class="fa"></i>
            </button>
        </div>
    </div>

    <!-- MOBILE MENU -->
    <div x-show="mobileMenuOpen" class="lg:hidden bg-[#07070a] border-t border-white/10 shadow-2xl" x-transition style="display: none;">
        <div class="px-6 py-8 space-y-8 font-mono text-xs">

            <!-- Mobile Navigation -->
            <nav class="flex flex-col space-y-6 uppercase tracking-wider text-gray-300">
                <a href="{{ route('home') }}" wire:navigate class="hover:text-[#8b5cf6]">Overview</a>

                <div class="space-y-3">
                    <p class="text-[#8b5cf6] font-bold">Platform</p>
                    <div class="pl-4 space-y-3 flex flex-col border-l border-white/5">
                        <a href="{{ route('about') }}" wire:navigate class="hover:text-[#8b5cf6]">Company Overview</a>
                        <a href="{{ route('testimonials') }}" wire:navigate class="hover:text-[#8b5cf6]">User Feedback</a>
                        <a href="{{ route('faq') }}" wire:navigate class="hover:text-[#8b5cf6]">FAQs</a>
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-[#8b5cf6] font-bold">Trading</p>
                    <div class="pl-4 space-y-3 flex flex-col border-l border-white/5">
                        <a href="{{ route('pricing') }}" wire:navigate class="hover:text-[#8b5cf6]">Strategy Plans</a>
                        <a href="{{ route('how') }}" wire:navigate class="hover:text-[#8b5cf6]">How it Works</a>
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-[#8b5cf6] font-bold">Compliance</p>
                    <div class="pl-4 space-y-3 flex flex-col border-l border-white/5">
                        <a href="{{ route('terms') }}" wire:navigate class="hover:text-[#8b5cf6]">Terms of Use</a>
                        <a href="{{ route('privacy') }}" wire:navigate class="hover:text-[#8b5cf6]">Data Policy</a>
                    </div>
                </div>

                <a href="{{ route('contact') }}" wire:navigate class="hover:text-[#8b5cf6]">Support</a>
            </nav>

            <!-- Mobile Auth -->
            <div class="pt-6 border-t border-white/10">
                @guest
                    <div class="flex flex-col gap-4">
                        @if(Route::currentRouteName() !== 'login')
                            <a href="{{ route('login') }}" wire:navigate
                                class="w-full text-center py-4 font-bold border border-white/10 bg-[#111116] text-white uppercase tracking-wider hover:bg-[#181820]">
                                Sign In
                            </a>
                        @endif

                        @if(Route::currentRouteName() !== 'register')
                            <a href="{{ route('register') }}" wire:navigate
                                class="w-full text-center py-4 font-bold bg-[#8b5cf6] text-white uppercase tracking-wider hover:bg-[#7c3aed]">
                                Create Account
                            </a>
                        @endif
                    </div>
                @else
                    <div class="w-full">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full py-4 font-bold bg-[#111116] border border-white/10 text-white uppercase tracking-wider hover:bg-[#181820]">
                                Log Out
                            </button>
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</header>
