<div class="min-h-screen bg-[#0a0f1c] text-gray-100 font-sans">
    {{-- Top Navigation (SPA friendly) --}}
    

    <!-- HERO SECTION - Full Dark Trading Style -->
    <section class="relative min-h-screen flex items-center overflow-hidden pt-20" id="banner">
        <!-- Background -->
        <div class="absolute inset-0 bg-[#0a0f1c]">
            <img src="{{ url('assets/images/banner-img.png') }}" 
                 alt="Crypto Trading Backdrop"
                 class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0f1c]/90 via-[#222f53]/70 to-[#0a0f1c]"></div>
        </div>

        <!-- Liquid + Particles Layer -->
        <div class="absolute inset-0 z-10 pointer-events-none">
            <div class="liquid-backdrop absolute inset-0 opacity-60"></div>
            <div class="particles absolute inset-0 pointer-events-none"></div>
        </div>

        <div class="container max-w-screen-2xl mx-auto px-6 relative z-20 pt-16 pb-32">
            <div class="max-w-4xl mx-auto text-center space-y-10">
                <h1 class="text-3xl sm:text-5xl md:text-6xl lg:text-7xl font-black tracking-tight leading-tight">
                    INVEST IN <span class="text-[#eac46e]">CRYPTO</span><br>
                    WITH 
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#eac46e] via-white to-[#eac46e]">
                        {{ strtoupper(config('app.name')) }}
                    </span>
                </h1>

                <p class="text-base sm:text-lg md:text-xl text-gray-300 max-w-xl mx-auto font-light">
                    Smart, secure, and simple cryptocurrency investments. 
                    Weekly & monthly returns regardless of market conditions.
                </p>

               <div class="flex flex-col sm:flex-row gap-4 justify-center pt-6">
                    <a href="{{ route('register') }}" wire:navigate
                    class="px-6 sm:px-8 py-3 sm:py-4 text-sm sm:text-base font-bold bg-[#222f53] hover:bg-[#2a3a6b] border border-[#eac46e] rounded-2xl transition-all hover:scale-105">
                        Start Investing →
                    </a>

                    <a href="#how-it-works"
                    class="px-6 sm:px-8 py-3 sm:py-4 text-sm sm:text-base font-semibold border border-[#eac46e]/60 hover:border-[#eac46e] rounded-2xl transition-all">
                        How It Works
                    </a>
                </div>

                <!-- Trust signals -->
                <div class="flex flex-wrap justify-center gap-x-10 gap-y-4 pt-10 text-sm text-gray-400">
                    <div class="flex items-center gap-3">
                        <i class="fa fa-shield-alt text-[#eac46e]"></i>
                        <span>Licensed &amp; Secure</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa fa-clock text-[#eac46e]"></i>
                        <span>Instant Withdrawals</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa fa-users text-[#eac46e]"></i>
                        <span>49,000+ Investors</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- TradingView Ticker -->
        <div class="absolute bottom-8 left-0 right-0 z-30 pointer-events-none">
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                    { "symbols": [ {"proName":"BINANCE:BTCUSDT","title":"BTC"},{"proName":"BINANCE:ETHUSDT","title":"ETH"},{"proName":"BINANCE:SOLUSDT","title":"SOL"} ], "colorTheme": "dark", "isTransparent": true }
                </script>
            </div>
        </div>
    </section>

    {{-- All other sections updated to dark trading aesthetic with #222f53 + #eac46e accent --}}

    <!-- HOW IT WORKS -->
    <section id="how-it-works" class="py-28 bg-[#111827]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold tracking-tight">HOW IT <span class="text-[#eac46e]">WORKS</span></h2>
                <p class="mt-4 text-xl text-gray-400">Start earning in 3 simple steps</p>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                @foreach([
                    ['icon' => 'user-plus', 'title' => 'SIGN UP', 'desc' => 'Create your account and verify email'],
                    ['icon' => 'banknotes', 'title' => 'DEPOSIT', 'desc' => 'Fund with crypto or supported methods'],
                    ['icon' => 'chart-bar', 'title' => 'INVEST', 'desc' => 'Choose plan and watch returns grow']
                ] as $step)
                <div class="group bg-[#1a2238] border border-[#222f53]/50 hover:border-[#eac46e]/30 p-10 rounded-3xl transition-all hover:-translate-y-2">
                    <x-dynamic-component :component="'heroicon-o-' . $step['icon']" 
                        class="h-14 w-14 text-[#eac46e] mb-8 group-hover:scale-110 transition" />
                    <h4 class="text-2xl font-semibold mb-3">{{ $step['title'] }}</h4>
                    <p class="text-gray-400">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- INVESTMENT PLANS -->
    <section id="plans" class="py-28 bg-[#0a0f1c]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold tracking-tight">INVESTMENT <span class="text-[#eac46e]">PLANS</span></h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    ['title' => 'BASIC PLAN', 'roi' => '12%', 'min' => '1,000', 'max' => '49,900'],
                    ['title' => 'GOLD PLAN', 'roi' => '15%', 'min' => '50,000', 'max' => '199,000'],
                    ['title' => 'DIAMOND PLAN', 'roi' => '25%', 'min' => '200,000', 'max' => '499,000'],
                    ['title' => 'PLATINUM PLAN', 'roi' => '30%', 'min' => '500,000', 'max' => '1,000,000', 'featured' => true]
                ] as $plan)
                <div class="relative {{ isset($plan['featured']) ? 'scale-105 z-10' : '' }}">
                    <div class="pricing-card bg-[#1a2238] border {{ isset($plan['featured']) ? 'border-[#eac46e]' : 'border-[#222f53]' }} rounded-3xl overflow-hidden hover:border-[#eac46e] transition-all h-full">
                        @if(isset($plan['featured']))
                            <div class="bg-[#eac46e] text-[#111827] text-xs font-bold tracking-widest py-1 text-center">MOST POPULAR</div>
                        @endif
                        
                        <div class="p-10 text-center">
                            <h3 class="text-3xl font-bold mb-8">{{ $plan['title'] }}</h3>
                            <div class="text-7xl font-black text-[#eac46e] mb-2">{{ $plan['roi'] }}</div>
                            <div class="text-sm text-gray-400 mb-10">WEEKLY ROI</div>

                            <ul class="space-y-5 text-left mb-12">
                                <li class="flex justify-between"><span class="text-gray-400">Minimum</span> <span class="font-medium">${{ $plan['min'] }}</span></li>
                                <li class="flex justify-between"><span class="text-gray-400">Maximum</span> <span class="font-medium">${{ $plan['max'] }}</span></li>
                                <li class="flex justify-between"><span class="text-gray-400">Capital Return</span> <span class="text-emerald-400">YES</span></li>
                            </ul>

                            <a href="{{ route('register') }}" wire:navigate
                               class="block w-full py-4 bg-[#222f53] hover:bg-[#2a3a6b] border border-[#eac46e]/70 rounded-2xl font-semibold transition">
                                Invest Now
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

       <!-- STATS SECTION -->
    <section class="py-28 bg-[#111827] border-t border-[#222f53]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['icon' => 'users', 'number' => '49K+', 'label' => 'Active Investors'],
                    ['icon' => 'banknotes', 'number' => '15.2B+', 'label' => 'Invested Fund'],
                    ['icon' => 'globe-alt', 'number' => '150+', 'label' => 'Supported Countries'],
                ] as $stat)
                <div class="bg-[#1a2238] border border-[#222f53] hover:border-[#eac46e]/40 rounded-3xl p-10 text-center group transition-all hover:-translate-y-1">
                    <x-dynamic-component 
                        :component="'heroicon-o-' . $stat['icon']" 
                        class="mx-auto mb-6 h-16 w-16 text-[#eac46e] group-hover:scale-110 transition-transform" />
                    <h4 class="text-5xl font-black text-white mb-3 tracking-tighter">{{ $stat['number'] }}</h4>
                    <p class="text-lg text-gray-400">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

        <!-- TESTIMONIALS -->
    <section class="py-28 bg-[#0a0f1c]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold tracking-tight">INVESTOR <span class="text-[#eac46e]">TESTIMONIALS</span></h2>
                <p class="mt-4 text-xl text-gray-400 max-w-3xl mx-auto">Real stories from real investors earning consistently with {{ config('app.name') }}</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['img' => 'S2yV3QjMr2uyTpA7K1qpO994sbfB6XH7gFzqYcvx.jpg', 'name' => 'David Lee', 'text' => "I firmly believe that investing is crucial for building wealth..."],
                    ['img' => '3WiTifZXIAbbb6yVkJPAXEh6pa4JbULM1DsbPKNV.jpg', 'name' => 'Skylar O\'Conner', 'text' => "I started investing in cryptocurrency back in 2017..."],
                    ['img' => 'niisMgBnF7OKhgePR1aktjzRinZKtwDJYvRFAMpG.jpg', 'name' => 'Michael Dyre', 'text' => "I started using cryptocurrency a few years ago..."]
                ] as $testimonial)
                <div class="bg-[#1a2238] border border-[#222f53] hover:border-[#eac46e]/30 p-8 rounded-3xl transition-all group">
                    <img src="{{ url('assets/images/' . $testimonial['img']) }}"
                         class="w-24 h-24 rounded-2xl mx-auto mb-6 object-cover border-4 border-[#eac46e]/30 group-hover:border-[#eac46e] transition-colors">
                    <p class="text-gray-300 italic leading-relaxed mb-8 text-center">
                        "{{ $testimonial['text'] }}"
                    </p>
                    <h6 class="text-right font-semibold text-[#eac46e]">- {{ $testimonial['name'] }}</h6>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-16">
                <a href="{{ route('testimonials') }}" wire:navigate
                   class="inline-block px-10 py-4 bg-[#222f53] hover:bg-[#2a3a6b] border border-[#eac46e] rounded-2xl font-semibold transition-all">
                    Read More Testimonials →
                </a>
            </div>
        </div>
    </section>



    <!-- MISSION SECTION -->
    <section class="py-16 sm:py-20 lg:py-28 bg-gradient-to-br from-[#111827] to-[#0a0f1c]">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid md:grid-cols-2 gap-10 lg:gap-16 items-center">
                
                <!-- TEXT -->
                <div class="order-2 md:order-1 space-y-5 sm:space-y-6">
                    
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight">
                        OUR <span class="text-[#eac46e]">MISSION</span>
                    </h2>

                    <h3 class="text-xl sm:text-2xl lg:text-3xl font-semibold text-white leading-snug">
                        Invest your way, no limits
                    </h3>

                    <p class="text-sm sm:text-base lg:text-lg text-gray-300 leading-relaxed max-w-xl">
                        We built a platform that makes investing simple, secure, and accessible. 
                        Our team combines financial expertise with real market experience to deliver 
                        consistent performance and a smooth user experience.
                    </p>

                    <a href="{{ route('register') }}" wire:navigate
                    class="inline-block px-6 sm:px-8 py-3 sm:py-4 bg-[#eac46e] text-[#111827] text-sm sm:text-base font-bold rounded-2xl hover:bg-amber-300 transition-all">
                        Get Started
                    </a>
                </div>

                <!-- IMAGE -->
                <div class="order-1 md:order-2 text-center">
                    <img src="{{ url('assets/images/mission.png') }}"
                        alt="Our Mission"
                        class="w-full max-w-sm sm:max-w-md lg:max-w-lg mx-auto rounded-3xl drop-shadow-2xl hover:scale-105 transition-transform duration-700">
                </div>

            </div>
        </div>
    </section>


        <!-- WHY CHOOSE US -->
    <section id="why-us" class="py-28 bg-[#111827]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold tracking-tight">WHY <span class="text-[#eac46e]">CHOOSE US</span></h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-20">
                @foreach([
                    ['icon' => 'chart-bar', 'title' => 'Constant Weekly Profits', 'desc' => 'We pay out profits weekly and monthly for all investors regardless of capital size.'],
                    ['icon' => 'briefcase', 'title' => 'Professionalism & Experience', 'desc' => 'Our team consists of seasoned professionals attentive to every investor’s needs.'],
                    ['icon' => 'shield-check', 'title' => 'Secure Investment', 'desc' => 'Your deposits and investments are always safe with institutional-grade security.']
                ] as $item)
                <div class="bg-[#1a2238] border border-[#222f53] hover:border-[#eac46e]/40 p-10 rounded-3xl text-center group transition-all hover:-translate-y-1">
                    <x-dynamic-component 
                        :component="'heroicon-o-' . $item['icon']" 
                        class="mx-auto mb-8 h-16 w-16 text-[#eac46e] group-hover:scale-110 transition" />
                    <h4 class="text-2xl font-semibold mb-6">{{ $item['title'] }}</h4>
                    <p class="text-gray-400">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>

            <!-- Second Row -->
            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['icon' => 'document-check', 'title' => 'Legally Licensed Firm', 'desc' => 'We are legally licensed in the United States of America.'],
                    ['icon' => 'chat-bubble-bottom-center-text', 'title' => '24/7 Customer Support', 'desc' => 'Our support team is always ready to respond to any inquiries.'],
                    ['icon' => 'bolt', 'title' => 'Instant Withdrawals', 'desc' => 'All withdrawal requests are processed instantly once approved.']
                ] as $item)
                <div class="bg-[#1a2238] border border-[#222f53] hover:border-[#eac46e]/40 p-10 rounded-3xl text-center group transition-all hover:-translate-y-1">
                    <x-dynamic-component 
                        :component="'heroicon-o-' . $item['icon']" 
                        class="mx-auto mb-8 h-16 w-16 text-[#eac46e] group-hover:scale-110 transition" />
                    <h4 class="text-2xl font-semibold mb-6">{{ $item['title'] }}</h4>
                    <p class="text-gray-400">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

        <!-- FEATURES / TOKEN SALE -->
    <section id="features" class="py-28 bg-gradient-to-br from-[#222f53] to-[#0a0f1c]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1 space-y-8">
                    <h3 class="text-5xl font-bold leading-tight">Your money + <span class="text-[#eac46e]">our plans</span> = <span class="text-[#eac46e]">profits for everyone</span></h3>
                    <ul class="space-y-8 text-lg text-gray-200">
                        <li class="flex items-start gap-4">
                            <span class="text-3xl text-[#eac46e]">✔</span>
                            <p>CRYPTO PAYMENTS — Multiple cryptocurrency options for deposits and withdrawals.</p>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="text-3xl text-[#eac46e]">✔</span>
                            <p>LAYERED INVESTING — All complexities removed. Just invest and earn.</p>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="text-3xl text-[#eac46e]">✔</span>
                            <p>ENHANCED TOOLS — Full dashboard to monitor all your activities in one place.</p>
                        </li>
                    </ul>
                </div>

                <div class="order-1 lg:order-2 text-center">
                    <img src="{{ url('assets/images/feature-7.png') }}"
                         alt="Features"
                         class="max-w-lg mx-auto rounded-3xl drop-shadow-2xl hover:scale-105 transition-transform duration-700">
                </div>
            </div>
        </div>
    </section>

        <!-- DEVICE COMPATIBILITY -->
    <section class="py-28 bg-[#0a0f1c] border-t border-[#222f53]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="text-center mb-16">
                <h5 class="text-4xl font-bold">Invest <span class="text-[#eac46e]">anywhere</span>, <span class="text-[#eac46e]">anytime</span>, on any device</h5>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
                @foreach([
                    ['svg' => 'mobile-phone.svg', 'label' => 'iOS Devices'],
                    ['svg' => 'mobile-phone.svg', 'label' => 'Android Devices'],
                    ['svg' => 'tablet.svg', 'label' => 'Windows Devices'],
                    ['svg' => 'globe-alt.svg', 'label' => 'Web Browsers'],
                ] as $item)
                <div class="group">
                    <img src="{{ url('assets/images/svg/' . $item['svg']) }}"
                         alt="{{ $item['label'] }}"
                         class="mx-auto mb-6 h-20 w-20 transition-all group-hover:scale-125 group-hover:rotate-6">
                    <h5 class="text-xl font-semibold">{{ $item['label'] }}</h5>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Keep your original extra scripts -->
    @section('xtraJs')
    <script>
        // Your original liquid backdrop scroll effect
        document.addEventListener('DOMContentLoaded', () => {
            const backdrop = document.querySelector('.liquid-backdrop');
            if (!backdrop) return;
            const updateLiquid = () => {
                const scrollPercent = Math.min(window.scrollY / (window.innerHeight * 1.5), 1.8);
                backdrop.style.animationDuration = `${32 - scrollPercent * 24}s`;
                backdrop.style.filter = `blur(${3 + scrollPercent * 5}px) contrast(${1.08 + scrollPercent * 0.4})`;
            };
            window.addEventListener('scroll', updateLiquid);
            updateLiquid();
        });
    </script>
    @endsection
</div>