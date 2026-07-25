<footer class="relative bg-[#07070a] pt-20 pb-16 overflow-hidden border-t border-white/10">
    <div class="bg-[#111116] border border-white/10 rounded-none p-10 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] relative max-w-screen-2xl mx-auto px-6 lg:px-12">
        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>

        <!-- Background effects -->
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_3px_3px,rgba(139,92,246,0.08)_1px,transparent_1px)] bg-[length:70px_70px] opacity-30"></div>
            <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        </div>

        <div class="relative z-10">

            <!-- Grid: 2 cols on mobile, 2 on md, 4 on lg -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-10 mb-20">

                <!-- Brand + Translate -->
                <div class="col-span-1 md:col-span-1">
                    <a href="{{ route('home') }}" wire:navigate class="flex items-center gap-3 group mb-8">
                        <img src="{{ url('assets/images/rel-icon.png') }}"
                             alt="{{ config('app.name') }}"
                             class="h-10 w-auto filter grayscale contrast-125 group-hover:scale-105 transition-transform duration-300">
                        <span class="font-black tracking-tighter text-2xl text-white leading-none">
                            {{ ucfirst(config('app.name')) }}
                        </span>
                    </a>

                    <div class="text-[#8b5cf6] text-xs font-mono uppercase tracking-widest mb-3">SELECT LANGUAGE</div>
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
                    <h6 class="text-[#8b5cf6] font-mono text-xs uppercase tracking-widest mb-6">Company Info</h6>
                    <ul class="space-y-4 text-gray-400 text-sm font-light">
                        <li><a href="{{ route('about') }}" wire:navigate class="hover:text-white transition-colors">Who We Are</a></li>
                        <li><a href="{{ route('pricing') }}" wire:navigate class="hover:text-white transition-colors">Investment Options</a></li>
                        <li><a href="{{ route('testimonials') }}" wire:navigate class="hover:text-white transition-colors">User Feedback</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h6 class="text-[#8b5cf6] font-mono text-xs uppercase tracking-widest mb-6">Support Center</h6>
                    <ul class="space-y-4 text-gray-400 text-sm font-light mb-6">
                        <li><a href="{{ route('how') }}" wire:navigate class="hover:text-white transition-colors">Getting Started</a></li>
                        <li><a href="{{ route('faq') }}" wire:navigate class="hover:text-white transition-colors">Frequently Asked Questions</a></li>
                    </ul>
                    <h6 class="text-[#8b5cf6] font-mono text-xs uppercase tracking-widest mb-6 mt-6">Contact Us</h6>
                    <ul class="space-y-4 text-gray-400 text-sm font-light">
                        <li>
                            <a href="mailto:{{ config('app.support_email') }}" class="hover:text-white transition-colors break-all">
                                {{ config('app.support_email') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Location + Social -->
                <div>
                    <h6 class="text-[#8b5cf6] font-mono text-xs uppercase tracking-widest mb-6">Location</h6>
                    <ul class="space-y-4 text-gray-400 text-sm font-light">
                        <li class="leading-relaxed">
                            <a href="#" class="hover:text-white transition-colors">
                                {{ config('app.company_address') ?? 'Global Operations Hub' }}
                            </a>
                        </li>
                    </ul>

                    <!-- Social -->
                    <div class="mt-10">
                        <div class="text-[#8b5cf6] text-xs font-mono uppercase tracking-widest mb-4">FOLLOW OUR NETWORK</div>
                        <div class="flex gap-6 text-xl text-gray-400">
                            <a href="#" class="hover:text-[#8b5cf6] transition-colors"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="#" class="hover:text-[#8b5cf6] transition-colors"><i class="fa-brands fa-telegram"></i></a>
                            <a href="#" class="hover:text-[#8b5cf6] transition-colors"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="#" class="hover:text-[#8b5cf6] transition-colors"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom -->
            <div class="pt-10 border-t border-white/5 flex flex-col md:flex-row justify-between items-center text-xs font-mono text-gray-500 gap-4">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Built for secure digital investing.</p>
                <div class="flex flex-wrap gap-8">
                    <a href="{{ route('terms') }}" wire:navigate class="hover:text-[#8b5cf6] transition-colors">Terms of Service</a>
                    <a href="{{ route('policy') }}" wire:navigate class="hover:text-[#8b5cf6] transition-colors">Data Policy</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top -->
    <button onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-6 right-6 z-50 w-12 h-12 rounded-none bg-[#111116] text-white flex items-center justify-center 
               transition-all duration-300 hover:scale-105
               border border-white/10 hover:border-[#8b5cf6]
               shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
        <i class="fa-solid fa-arrow-up text-xs"></i>
    </button>
</footer>

