<footer class="relative bg-black pt-20 pb-16 overflow-hidden border-t-4 border-red-600/70 shadow-[0_-15px_60px_15px_rgba(239,68,68,0.25)]">
    <!-- Enhanced glittering mesh background -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <!-- Visible red mesh grid -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_2px_2px,rgba(239,68,68,0.25)_1.5px,transparent_1.5px)] bg-[length:50px_50px] opacity-70 animate-mesh-shift"></div>
        
        <!-- Stronger glitter particles layer -->
        <div class="absolute inset-0 glitter-overlay"></div>

        <!-- Extra red glow layer for outline feel -->
        <div class="absolute inset-0 bg-gradient-to-t from-red-900/30 via-transparent to-red-900/10 pointer-events-none"></div>
    </div>

    <!-- Content (higher z-index so it's readable) -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Your original grid content – unchanged except animations -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 mb-16">
            <!-- Logo + Translate -->
            <div class="animate-fade-in">
                <div class="mb-8">
                    <a href="{{ route('home') }}">
                        <img src="{{ url('assets/images/icon.png') }}"
                             alt="{{ config('app.name') }}" 
                             class="h-12 w-auto transition-transform hover:scale-105">
                    </a>
                </div>
                <div id="google_translate_element" class="mt-4"></div>
                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
                    }
                </script>
                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            </div>

            <!-- COMPANY -->
            <div class="animate-fade-in delay-100">
                <h6 class="text-xl font-bold text-red-500 mb-6 uppercase tracking-wide">Company</h6>
                <ul class="space-y-4 text-gray-300">
                    <li><a href="{{ route('about') }}" class="hover:text-red-400 transition-colors">About Us</a></li>
                    <li><a href="{{ route('pricing') }}" class="hover:text-red-400 transition-colors">Investments</a></li>
                    <li><a href="{{ route('testimonials') }}" class="hover:text-red-400 transition-colors">Testimonials</a></li>
                </ul>
            </div>

            <!-- HELP -->
            <div class="animate-fade-in delay-200">
                <h6 class="text-xl font-bold text-red-500 mb-6 uppercase tracking-wide">Help</h6>
                <ul class="space-y-4 text-gray-300">
                    <li><a href="{{ route('how') }}" class="hover:text-red-400 transition-colors">How It Works</a></li>
                    <li><a href="{{ route('faq') }}" class="hover:text-red-400 transition-colors">FAQs</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-red-400 transition-colors">Contact Us</a></li>
                    <li><a href="mailto:{{ config('app.support_email') }}" class="hover:text-red-400 transition-colors">{{ config('app.support_email') }}</a></li>
                </ul>
            </div>

            <!-- LOCATION -->
            <div class="animate-fade-in delay-300">
                <h6 class="text-xl font-bold text-red-500 mb-6 uppercase tracking-wide">Location</h6>
                <ul class="space-y-4 text-gray-300">
                    <li>
                        <a href="#" class="hover:text-red-400 transition-colors">
                            {{ config('app.company_address') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-red-900/40 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center text-gray-400 text-sm">
                <p>{{ config('app.name') }} © {{ date('Y') }} All Rights Reserved.</p>
                <ul class="flex flex-wrap gap-6 mt-4 md:mt-0">
                    <li><a href="{{ route('terms') }}" class="hover:text-red-400 transition-colors">Terms & Conditions</a></li>
                    <li><a href="{{ route('policy') }}" class="hover:text-red-400 transition-colors">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>