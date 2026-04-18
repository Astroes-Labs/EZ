<footer class="relative bg-[#1a2238] pt-20 pb-16 overflow-hidden border-t border-[#222f53]/70">
    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-10">

        <!-- Background effects -->
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_3px_3px,rgba(234,196,110,0.12)_1px,transparent_1px)] bg-[length:70px_70px] opacity-50"></div>
            <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-[#222f53]/30 via-transparent to-transparent"></div>
        </div>

        <div class="max-w-screen-2xl mx-auto px-6 relative z-10">

            <!-- Grid: 2 cols on mobile, 2 on md, 4 on lg -->
             <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-10 mb-20">

                <!-- Brand + Translate -->
                <div class="col-span-1 md:col-span-1">
                    <a href="{{ route('home') }}" wire:navigate class="flex items-center gap-3 group mb-8">
                        <img src="{{ url('assets/images/rel-icon.png') }}"
                             alt="{{ config('app.name') }}"
                             class="h-12 w-auto brightness-110 group-hover:scale-105 transition-transform duration-300">
                        <span class="font-semibold tracking-tight text-2xl text-white leading-none">
                            {{ ucfirst(config('app.name')) }}
                        </span>
                    </a>

                    <div class="text-[#eac46e] text-sm font-medium mb-3 tracking-wider">SELECT LANGUAGE</div>
                    <div id="google_translate_element" class="mt-2"></div>

                    <script>
                        function googleTranslateElementInit() {
                            new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
                        }
                    </script>
                    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </div>

                <!-- Company -->
                <div>
                    <h6 class="text-[#eac46e] font-semibold uppercase tracking-[1px] text-sm mb-6">Company Info</h6>
                    <ul class="space-y-4 text-gray-200 text-sm">
                        <li><a href="{{ route('about') }}" wire:navigate class="hover:text-white transition-colors">Who We Are</a></li>
                        <li><a href="{{ route('pricing') }}" wire:navigate class="hover:text-white transition-colors">Investment Options</a></li>
                        <li><a href="{{ route('testimonials') }}" wire:navigate class="hover:text-white transition-colors">User Feedback</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h6 class="text-[#eac46e] font-semibold uppercase tracking-[1px] text-sm mb-6">Support Center</h6>
                    <ul class="space-y-4 text-gray-200 text-sm mb-6">
                        <li><a href="{{ route('how') }}" wire:navigate class="hover:text-white transition-colors">Getting Started</a></li>
                        <li><a href="{{ route('faq') }}" wire:navigate class="hover:text-white transition-colors">Frequently Asked Questions</a></li>
                    </ul>
                    <h6 class="text-[#eac46e] font-semibold uppercase tracking-[1px] text-sm mb-6 mt-6">Contact Us</h6>
                    <ul class="space-y-4 text-gray-200 text-sm">
                        <li>
                            <a href="mailto:{{ config('app.support_email') }}" class="hover:text-white transition-colors break-all">
                                {{ config('app.support_email') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Location + Social -->
                <div>
                    <h6 class="text-[#eac46e] font-semibold uppercase tracking-[1px] text-sm mb-6">Location</h6>
                    <ul class="space-y-4 text-gray-200 text-sm">
                        <li class="leading-relaxed">
                            <a href="#" class="hover:text-white transition-colors">
                                {{ config('app.company_address') ?? 'Global Operations Hub' }}
                            </a>
                        </li>
                    </ul>

                    <!-- Social -->
                    <div class="mt-10">
                        <div class="text-[#eac46e] text-sm font-medium mb-4 tracking-wider">FOLLOW OUR NETWORK</div>
                        <div class="flex gap-6 text-2xl text-gray-300">
                            <a href="#" class="hover:text-[#eac46e] transition-colors"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="#" class="hover:text-[#eac46e] transition-colors"><i class="fa-brands fa-telegram"></i></a>
                            <a href="#" class="hover:text-[#eac46e] transition-colors"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="#" class="hover:text-[#eac46e] transition-colors"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom -->
            <div class="pt-10 border-t border-[#222f53]/50 flex flex-col md:flex-row justify-between items-center text-sm text-gray-400 gap-4">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Built for secure digital investing.</p>
                <div class="flex flex-wrap gap-8">
                    <a href="{{ route('terms') }}" wire:navigate class="hover:text-[#eac46e] transition-colors">Terms of Service</a>
                    <a href="{{ route('policy') }}" wire:navigate class="hover:text-[#eac46e] transition-colors">Data Policy</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top -->
    <button onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-6 right-6 z-50 w-12 h-12 rounded-2xl bg-[#222f53] text-white flex items-center justify-center 
               shadow-lg transition-all duration-300 hover:scale-110
               border border-[#eac46e]/60 hover:border-[#eac46e]
               hover:shadow-[0_0_20px_rgba(234,196,110,0.7)]">
        <i class="fa-solid fa-arrow-up"></i>
    </button>
</footer>