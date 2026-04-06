<?php

use Livewire\Component;

new class extends Component {
    public $menuOpen = false;

    // Optional: sub-menu toggles if you want accordion-style mobile menu
    public $subOpen = [];

    public function toggleMenu()
    {
        $this->menuOpen = !$this->menuOpen;
    }

    public function toggleSub($key)
    {
        $this->subOpen[$key] = !($this->subOpen[$key] ?? false);
    }
};

?>

<header
    class="bg-gradient-to-r from-red-600 to-red-400 shadow-xl transition-all duration-300 fixed w-full top-0 z-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
        <div class="logo flex-shrink-0">
            <a href="{{ route('home') }}">
                <img src="{{ url('assets/images/icon.png') }}"
                    class="w-32 sm:w-40 transition-transform duration-300 hover:scale-105"
                    alt="{{ config('app.name') }}">
            </a>
        </div>

        <!-- Desktop Menu -->
        <nav class="hidden lg:flex items-center space-x-8 text-white font-medium tracking-wide">
            <a href="{{ route('home') }}"
                class="hover:text-red-200 transition-colors duration-200 hover:underline underline-offset-4">
                Home
            </a>

            <!-- About Dropdown -->
            <div class="relative group">
                <button class="hover:text-red-200 transition-colors duration-200 flex items-center">
                    About
                    <svg class="ml-1.5 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    class="absolute hidden group-hover:block pt-2 w-48 bg-white rounded-lg shadow-xl animate-fade-in">
                    <a href="{{ route('about') }}"
                        class="block px-4 py-2.5 text-gray-800 hover:bg-red-50 transition">
                        About Us
                    </a>
                    <a href="{{ route('testimonials') }}"
                        class="block px-4 py-2.5 text-gray-800 hover:bg-red-50 transition">
                        Testimonials
                    </a>
                    <a href="{{ route('faq') }}"
                        class="block px-4 py-2.5 text-gray-800 hover:bg-red-50 transition">
                        FAQs
                    </a>
                </div>
            </div>

            <!-- Investments Dropdown (similar structure) -->
            <div class="relative group">
                <button class="hover:text-red-200 transition-colors duration-200 flex items-center">
                    Investments
                    <svg class="ml-1.5 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    class="absolute hidden group-hover:block pt-2 w-56 bg-white rounded-lg shadow-xl animate-fade-in">
                    <a href="{{ route('pricing') }}"
                        class="block px-4 py-2.5 text-gray-800 hover:bg-red-50 transition">
                        Investment Plans
                    </a>
                    <a href="{{ route('how') }}"
                        class="block px-4 py-2.5 text-gray-800 hover:bg-red-50 transition">
                        How It Works
                    </a>
                </div>
            </div>

            <!-- Legal Dropdown -->
            <div class="relative group">
                <button class="hover:text-red-200 transition-colors duration-200 flex items-center">
                    Legal
                    <svg class="ml-1.5 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    class="absolute hidden group-hover:block pt-2 w-56 bg-white rounded-lg shadow-xl animate-fade-in">
                    <a href="{{ route('terms') }}"
                        class="block px-4 py-2.5 text-gray-800 hover:bg-red-50 transition">
                        Terms & Conditions
                    </a>
                    <a href="{{ route('privacy') }}"
                        class="block px-4 py-2.5 text-gray-800 hover:bg-red-50 transition">
                        Privacy Policy
                    </a>
                </div>
            </div>

            <a href="{{ route('contact') }}"
                class="hover:text-red-200 transition-colors duration-200 hover:underline underline-offset-4">
                Contact
            </a>
        </nav>

        <!-- Auth Buttons (Desktop) -->
        <div class="hidden lg:flex items-center space-x-4">
            <a href="{{ route('login') }}"
                class="bg-white text-red-600 px-5 py-2.5 rounded-lg font-semibold hover:bg-gray-100 transition duration-200 shadow-sm">
                Login
            </a>
            <a href="{{ route('register') }}"
                class="bg-red-700 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-red-800 transition duration-200 shadow-sm">
                Register
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <button wire:click="toggleMenu" class="lg:hidden text-white focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="{{ $menuOpen ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16' }}" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu Panel -->
    @if ($menuOpen)
        <div class="lg:hidden bg-white border-t border-red-200 animate-fade-in-down">
            <div class="container mx-auto px-4 py-6 space-y-5 text-lg">
                <a href="{{ route('home') }}" class="block hover:text-red-600 transition">Home</a>

                <!-- Mobile Accordions -->
                <div>
                    <button wire:click="toggleSub('about')"
                        class="w-full text-left flex justify-between items-center hover:text-red-600 transition">
                        About
                        <svg class="w-5 h-5 transition-transform {{ ($subOpen['about'] ?? false) ? 'rotate-180' : '' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    @if ($subOpen['about'] ?? false)
                        <div class="mt-2 pl-4 space-y-3 border-l-2 border-red-200">
                            <a href="{{ route('about') }}" class="block hover:text-red-600">About Us</a>
                            <a href="{{ route('testimonials') }}" class="block hover:text-red-600">Testimonials</a>
                            <a href="{{ route('faq') }}" class="block hover:text-red-600">FAQs</a>
                        </div>
                    @endif
                </div>

                <!-- Investments Mobile Accordion -->
                <div>
                    <button wire:click="toggleSub('investments')"
                        class="w-full text-left flex justify-between items-center hover:text-red-600 transition py-2">
                        Investments
                        <svg class="w-5 h-5 transition-transform {{ ($subOpen['investments'] ?? false) ? 'rotate-180' : '' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    @if ($subOpen['investments'] ?? false)
                        <div class="mt-2 pl-6 space-y-3 border-l-2 border-red-200">
                            <a href="{{ route('pricing') }}" class="block hover:text-red-600">Investment Plans</a>
                            <a href="{{ route('how') }}" class="block hover:text-red-600">How It Works</a>
                        </div>
                    @endif
                </div>

                <!-- Legal Mobile Accordion -->
                <div>
                    <button wire:click="toggleSub('legal')"
                        class="w-full text-left flex justify-between items-center hover:text-red-600 transition py-2">
                        Legal
                        <svg class="w-5 h-5 transition-transform {{ ($subOpen['legal'] ?? false) ? 'rotate-180' : '' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    @if ($subOpen['legal'] ?? false)
                        <div class="mt-2 pl-6 space-y-3 border-l-2 border-red-200">
                            <a href="{{ route('terms') }}" class="block hover:text-red-600">Terms & Conditions</a>
                            <a href="{{ route('privacy') }}" class="block hover:text-red-600">Privacy Policy</a>
                        </div>
                    @endif
                </div>

                <!-- Repeat similar block for Investments and Legal -->

                <a href="{{ route('contact') }}" class="block hover:text-red-600 transition">Contact</a>

                <div class="pt-4 flex flex-col space-y-3">
                    <a href="{{ route('login') }}"
                        class="block text-center bg-white border border-red-600 text-red-600 py-3 rounded-lg font-semibold hover:bg-red-50 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="block text-center bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700 transition">
                        Register
                    </a>
                </div>
            </div>
        </div>
    @endif
</header>