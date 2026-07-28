<div>

    <div class="min-h-screen bg-[#07070a] text-gray-100 font-sans selection:bg-[#8b5cf6] selection:text-white">

        <!-- HERO SECTION -->
        <section class="relative min-h-screen flex items-center overflow-hidden pt-20" id="banner">
            <div class="absolute inset-0 bg-[#07070a]">
                <img src="{{ url('assets/images/banner-img.png') }}" alt="Crypto Trading Backdrop"
                    class="w-full h-full object-cover opacity-20 mix-blend-luminosity">
                <div class="absolute inset-0 bg-gradient-to-b from-[#07070a]/90 via-[#07070a]/70 to-[#07070a]"></div>
            </div>

            <div class="absolute inset-0 z-10 pointer-events-none">
                <div class="liquid-backdrop absolute inset-0 opacity-40"></div>
                <div class="particles absolute inset-0 pointer-events-none"></div>
            </div>

            <div class="container max-w-screen-2xl mx-auto px-6 lg:px-12 relative z-20 pt-16 pb-32">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">

                    <!-- Hero Typography (Asymmetric Left Column) -->
                    <div class="lg:col-span-7 space-y-10 text-left">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-none bg-[#111116] border border-white/10 text-xs font-mono tracking-widest text-[#8b5cf6] shadow-[inset_0_1px_0_0_rgba(255,255,255,0.08)]">
                            <span class="w-1.5 h-1.5 bg-[#8b5cf6]"></span> <span>SECURE &amp; TRUSTED</span>
                        </div>

                        <h1
                            class="text-4xl sm:text-6xl md:text-7xl lg:text-7xl font-black tracking-tighter leading-[1.05]">
                            INVEST IN <span class="text-[#8b5cf6]">CRYPTO</span><br>
                            WITH
                            <span
                                class="bg-clip-text text-transparent bg-gradient-to-r from-white via-gray-300 to-[#8b5cf6]">
                                {{ strtoupper(config('app.name')) }}
                            </span>
                        </h1>

                        <p class="text-base sm:text-lg md:text-xl text-gray-400 max-w-xl font-light leading-relaxed">
                            Smart, secure, and simple cryptocurrency investments.
                            Weekly and monthly returns, regardless of market conditions.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4 pt-4">
                            <a href="{{ route('register') }}" wire:navigate
                                class="px-8 py-4 text-sm sm:text-base font-bold bg-[#8b5cf6] hover:bg-[#7c3aed] text-white rounded-none transition-all shadow-[inset_0_1px_0_rgba(255,255,255,0.25)] border-b-2 border-black/40 active:translate-y-0.5 text-center">
                                Start Investing →
                            </a>
                            <a href="{{ route('how') }}" wire:navigate
                                class="px-8 py-4 text-sm sm:text-base font-semibold bg-[#111116] hover:bg-[#181820] text-gray-200 border border-white/10 rounded-none transition-all shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] text-center">
                                How It Works
                            </a>
                        </div>

                        <div
                            class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-8 border-t border-white/5 text-sm text-gray-400 font-mono">
                            <div
                                class="flex items-center gap-3 bg-[#111116] p-4 border border-white/5 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.04)]">
                                <i class="fa fa-shield-alt text-[#8b5cf6]"></i><span>Licensed &amp; Secure</span>
                            </div>
                            <div
                                class="flex items-center gap-3 bg-[#111116] p-4 border border-white/5 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.04)]">
                                <i class="fa fa-clock text-[#8b5cf6]"></i><span>Instant Withdrawals</span>
                            </div>
                            <div
                                class="flex items-center gap-3 bg-[#111116] p-4 border border-white/5 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.04)]">
                                <i class="fa fa-users text-[#8b5cf6]"></i><span>49,000+ Investors</span>
                            </div>
                        </div>
                    </div>

                    <!-- Structural Showcase Element (Right Column) -->
                    <div class="lg:col-span-5 relative">
                        <div
                            class="bg-[#0f0f13] border border-white/10 p-8 sm:p-12 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.1),0_20px_50px_rgba(0,0,0,0.8)] relative">
                            <div
                                class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/50 to-transparent">
                            </div>
                            <div class="space-y-6">

                                <!-- System Status Header -->
                                <div class="flex justify-between items-center border-b border-white/5 pb-4">
                                    <span class="text-xs font-mono text-gray-400 uppercase tracking-widest">System
                                        Status</span>
                                    <span
                                        class="inline-flex items-center gap-1.5 text-xs font-mono text-emerald-400 bg-emerald-950/40 px-2.5 py-1 border border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                        OPERATIONAL
                                    </span>
                                </div>

                                @php
                                    // Fetch all dynamic settings from the database table
                                    $settings = \App\Models\SiteSetting::all();

                                    // Grab the first metric as the main primary highlight (e.g., Liquidity Pool Allocation)
                                    $primaryMetric = $settings->first();

                                    // Grab any subsequent metrics to automatically fill the grid below
                                    $gridMetrics = $settings->skip(1);
                                @endphp

                                @if ($primaryMetric)
                                    <!-- Primary Highlight Block (Dynamically Bound) -->
                                    <div class="space-y-2">
                                        <span class="text-xs font-mono text-gray-500">{{ $primaryMetric->label }}</span>
                                        <div class="text-3xl font-black font-mono tracking-tight text-white">
                                            {{ $primaryMetric->value }}</div>
                                        <div class="w-full bg-[#16161c] h-2 border border-white/5 overflow-hidden">
                                            <div class="bg-[#8b5cf6] h-full w-[84%]"></div>
                                        </div>
                                    </div>
                                @endif

                                @if ($gridMetrics->count() > 0)
                                    <!-- Dynamic Grid Block (Expands automatically as you add more metrics in the admin) -->
                                    <div class="grid grid-cols-2 gap-4 pt-4 border-t border-white/5 font-mono text-xs">
                                        @foreach ($gridMetrics as $metric)
                                            <div class="bg-[#131318] p-4 border border-white/5">
                                                <div class="text-gray-500 mb-1">{{ $metric->label }}</div>
                                                <div
                                                    class="text-lg font-bold {{ $loop->last ? 'text-[#8b5cf6]' : 'text-gray-200' }}">
                                                    {{ $metric->value }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div
                class="absolute bottom-8 left-0 right-0 z-30 pointer-events-none border-t border-white/5 bg-[#07070a]/80 backdrop-blur-none">
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                        {
                            "symbols": [{
                                "proName": "BINANCE:BTCUSDT",
                                "title": "BTC"
                            }, {
                                "proName": "BINANCE:ETHUSDT",
                                "title": "ETH"
                            }, {
                                "proName": "SOLUSDT",
                                "title": "SOL"
                            }],
                            "colorTheme": "dark",
                            "isTransparent": true
                        }
                    </script>
                </div>
            </div>
        </section>

        <!-- ABOUT SECTION -->
        <section class="py-28 bg-[#0c0c10] border-t border-white/10">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">

                {{-- Intro headline --}}
                <div class="text-center mb-20 max-w-4xl mx-auto">
                    <h2 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight">
                        <span class="text-[#8b5cf6]">{{ config('app.name') }}</span> delivers investments and
                        financial services without <span
                            class="text-white underline decoration-[#8b5cf6] decoration-2 underline-offset-8">complexity</span>
                    </h2>
                </div>

                {{-- 3-col credential stats --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-20">
                    @foreach ([['icon' => 'briefcase', 'number' => '10 Years', 'label' => 'Industry Experience'], ['icon' => 'shield-check', 'number' => '7 Years', 'label' => 'Regulated & Licensed'], ['icon' => 'chart-bar', 'number' => '15M+', 'label' => 'Daily Average Fund']] as $cred)
                        <div
                            class="bg-[#111116] border border-white/10 hover:border-[#8b5cf6]/50 p-10 group transition-all shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] relative">
                            <div
                                class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-white/10 to-transparent">
                            </div>
                            <x-dynamic-component :component="'heroicon-o-' . $cred['icon']"
                                class="mx-auto mb-6 h-12 w-12 text-[#8b5cf6] group-hover:scale-105 transition-transform" />
                            <h4 class="text-4xl font-black font-mono text-white mb-2 tracking-tight">
                                {{ $cred['number'] }}</h4>
                            <p class="text-gray-400 text-sm font-mono tracking-wide uppercase">{{ $cred['label'] }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="border-t border-white/5 my-12"></div>

                {{-- About content: image + text --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center mt-12">

                    {{-- Rotating image --}}
                    <div class="lg:col-span-5 text-center">
                        <div
                            class="relative inline-block w-64 sm:w-80 lg:w-96 mx-auto bg-[#111116] p-8 border border-white/10 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)]">
                            <div
                                class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent">
                            </div>
                            <img src="{{ url('assets/images/work-process.png') }}"
                                class="rotation-img w-full h-auto relative z-10 filter grayscale contrast-125"
                                alt="How We Work">
                        </div>
                    </div>

                    {{-- Text --}}
                    <div class="lg:col-span-7 space-y-6">
                        <div class="font-mono text-xs text-[#8b5cf6] tracking-widest uppercase">/// FIRM OVERVIEW</div>
                        <h3 class="text-3xl sm:text-4xl font-black tracking-tight">
                            ABOUT <span class="text-[#8b5cf6]">{{ config('app.name') }}</span>
                        </h3>
                        <h4 class="text-xl sm:text-2xl font-bold leading-snug text-gray-200">
                            Reshaping the future of
                            <span class="text-[#8b5cf6]">crypto investment</span>
                        </h4>
                        <p class="text-gray-400 text-base sm:text-lg leading-relaxed font-light">
                            At {{ config('app.name') }}, we go beyond traditional investment firms, we are a dedicated
                            financial
                            service provider committed to helping every investor grow wealth without the burden of
                            day-to-day
                            market monitoring. Our in-house proprietary investment software, built by a team of seasoned
                            financial professionals and market strategists, is engineered to minimize risk while
                            maximizing
                            the efficiency of every investment cycle.
                        </p>
                        <p class="text-gray-400 text-sm sm:text-base leading-relaxed font-light">
                            Our business model is designed to deliver high-yield returns on a weekly or monthly basis,
                            staying consistent and reliable regardless of market fluctuations , something few firms
                            in the industry can genuinely offer.
                        </p>
                        <div class="pt-4">
                            <a href="{{ route('about') }}" wire:navigate
                                class="inline-block px-8 py-4 bg-[#8b5cf6] text-white font-bold text-sm tracking-wide rounded-none hover:bg-[#7c3aed] transition-all shadow-[inset_0_1px_0_rgba(255,255,255,0.2)] border-b-2 border-black/40">
                                Learn More About Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ═══════════════════════════════════════════════════ END ABOUT -->

        <!-- HOW IT WORKS -->
        <section id="how-it-works" class="py-28 bg-[#07070a] border-t border-white/10">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">
                <div class="text-center mb-16 max-w-3xl mx-auto">
                    <div class="font-mono text-xs text-[#8b5cf6] tracking-widest uppercase mb-3">/// WORKFLOW</div>
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight">HOW IT <span
                            class="text-[#8b5cf6]">WORKS</span></h2>
                    <p class="mt-4 text-base sm:text-lg text-gray-400 font-light">
                        Get started with {{ config('app.name') }} in three straightforward steps , no experience
                        required.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ([
        [
            'icon' => 'user-plus',
            'title' => 'SIGN UP',
            'desc' => 'Create a free account using your details and a secure password. You must verify your email address before you can log in and begin investing.',
            'link' => route('register'),
        ],
        [
            'icon' => 'banknotes',
            'title' => 'DEPOSIT',
            'desc' => 'Fund your account with any supported cryptocurrency or payment method. Choose the amount that suits your investment goals and budget.',
            'link' => '#',
        ],
        [
            'icon' => 'chart-bar',
            'title' => 'INVEST',
            'desc' => 'Select an investment plan and let our platform do the rest. Once your cycle completes, your ROI becomes available for withdrawal or reinvestment.',
            'link' => '#',
        ],
    ] as $index => $step)
                        <div
                            class="group bg-[#111116] border border-white/10 hover:border-[#8b5cf6]/50 p-10 transition-all shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] relative">
                            <div
                                class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-white/10 to-transparent">
                            </div>
                            <div class="flex justify-between items-start mb-8">
                                <x-dynamic-component :component="'heroicon-o-' . $step['icon']"
                                    class="h-10 w-10 text-[#8b5cf6] group-hover:scale-105 transition" />
                                <span class="font-mono text-xs text-gray-600 font-bold">0{{ $index + 1 }}</span>
                            </div>
                            <a href="{{ $step['link'] }}" wire:navigate
                                class="text-xl font-bold text-white hover:text-[#8b5cf6] transition block mb-4 tracking-tight">
                                {{ $step['title'] }}
                            </a>
                            <p class="text-gray-400 text-sm leading-relaxed font-light">{{ $step['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- TOP MOVERS / SCREENER -->
        <section class="py-20 bg-[#0c0c10] border-t border-white/10">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">
                <div class="text-center mb-16 max-w-3xl mx-auto">
                    <div class="font-mono text-xs text-[#8b5cf6] tracking-widest uppercase mb-3">/// MARKET
                        INTELLIGENCE</div>
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight">CRYPTO <span
                            class="text-[#8b5cf6]">MOVERS</span></h2>
                    <p class="mt-4 text-base sm:text-lg text-gray-400 font-light">
                        Live performance data across the top digital assets, volume, price action, and momentum, all in
                        one view, updated in real time.
                    </p>
                </div>
                <div
                    class="bg-[#111116] border border-white/10 overflow-hidden shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] pointer-events-none p-2">
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                            {
                                "width": "100%",
                                "height": 390,
                                "defaultColumn": "overview",
                                "screener_type": "crypto_mkt",
                                "displayCurrency": "USD",
                                "colorTheme": "dark",
                                "locale": "en",
                                "isTransparent": true
                            }
                        </script>
                    </div>
                </div>
            </div>
        </section>

        <!-- INVESTMENT PLANS -->
        <section id="plans" class="py-28 bg-[#07070a] border-t border-white/10">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">
                <div class="text-center mb-16 max-w-3xl mx-auto">
                    <div class="font-mono text-xs text-[#8b5cf6] tracking-widest uppercase mb-3">/// CAPITAL TIERS
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight">INVESTMENT <span
                            class="text-[#8b5cf6]">PLANS</span></h2>
                    <p class="mt-4 text-base sm:text-lg text-gray-400 font-light">
                        Choose from a range of carefully structured plans tailored to every capital size,
                        each designed to deliver the highest possible returns on your investment.
                    </p>
                </div>


                @php
                    $plans = \App\Models\TradingPlan::all()->groupBy('plan_name');
                    $userCurrency = auth()->user()->currency ?? '$';

                    // Map plans to your required template structure with dynamic totals
                    $dynamicPlans = [];
                    $planOrder = ['Basic', 'Silver', 'Gold', 'Diamond', 'Platinum'];

                    foreach ($planOrder as $name) {
                        // Skip the Silver plan
                        if ($name === 'Silver') {
                            continue;
                        }

                        if (!isset($plans[$name])) {
                            continue;
                        }

                        $tiers = $plans[$name];
                        $min = $tiers->min('min');
                        $max = $tiers->max('max');
                        $first = $tiers->first();

                        // Assign sample ROI/percentage based on plan name or structure as needed
                        $roiMap = [
                            'Basic' => '12%',
                            'Silver' => '15%',
                            'Gold' => '18%',
                            'Diamond' => '25%',
                            'Platinum' => '30%',
                        ];

                        $dynamicPlans[] = [
                            'title' => strtoupper($name) . ' PLAN',
                            'roi' => $roiMap[$name] ?? '15%',
                            'min' => $min,
                            'max' => $max,
                            'rating' => $first->rating ?? '5.00',
                            'reviews' => $first->reviews ?? '0',
                            'border' => $name === 'Platinum',
                        ];
                    }
                @endphp
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mt-12">
                    @foreach ($dynamicPlans as $plan)
                        <div class="relative flex flex-col {{ isset($plan['featured']) ? 'lg:-translate-y-2' : '' }}">
                            <div
                                class="bg-[#111116] border {{ isset($plan['featured']) ? 'border-[#8b5cf6]' : 'border-white/10' }} overflow-hidden transition-all h-full flex flex-col shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] relative">
                                <div
                                    class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-white/10 to-transparent">
                                </div>
                                @if (isset($plan['featured']))
                                    <div
                                        class="bg-[#8b5cf6] text-white text-[10px] font-mono font-bold tracking-widest py-1.5 text-center shadow-[inset_0_1px_0_rgba(255,255,255,0.2)]">
                                        MOST POPULAR</div>
                                @endif
                                <div class="p-8 text-center flex-1 flex flex-col justify-between">
                                    <div>
                                        <h3 class="text-xl font-bold mb-6 text-white tracking-tight">
                                            {{ $plan['title'] }}</h3>
                                        <div
                                            class="text-6xl font-black font-mono text-[#8b5cf6] mb-2 tracking-tighter">
                                            {{ $plan['roi'] }}</div>
                                        <div class="text-xs font-mono text-gray-500 mb-8 tracking-widest uppercase">
                                            WEEKLY ROI</div>
                                        <ul
                                            class="space-y-4 text-left mb-8 font-mono text-xs border-t border-b border-white/5 py-6">
                                            <li class="flex justify-between pb-2"><span
                                                    class="text-gray-500">Minimum</span><span
                                                    class="font-bold text-gray-200">${{ number_format($plan['min'], 2) }}</span></li>
                                            <li class="flex justify-between pb-2"><span
                                                    class="text-gray-500">Maximum</span><span
                                                    class="font-bold text-gray-200">${{ number_format($plan['max'], 2) }}</span></li>
                                            <li class="flex justify-between"><span class="text-gray-500">Capital
                                                    Return</span><span class="text-emerald-400 font-bold">YES</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('register') }}" wire:navigate
                                        class="block w-full py-3.5 bg-[#16161c] hover:bg-[#1f1f28] border border-white/10 text-xs font-mono font-bold uppercase tracking-wider text-white transition shadow-[inset_0_1px_0_0_rgba(255,255,255,0.08)]">
                                        Invest Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- STATS -->
        <section class="py-28 bg-[#0c0c10] border-t border-white/10">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ([['icon' => 'users', 'number' => '49K+', 'label' => 'Active Investors'], ['icon' => 'banknotes', 'number' => '15.2B+', 'label' => 'Total Invested Fund'], ['icon' => 'globe-alt', 'number' => '150+', 'label' => 'Supported Countries']] as $stat)
                        <div
                            class="bg-[#111116] border border-white/10 hover:border-[#8b5cf6]/40 p-10 text-center group transition-all shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] relative">
                            <div
                                class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-white/10 to-transparent">
                            </div>
                            <x-dynamic-component :component="'heroicon-o-' . $stat['icon']"
                                class="mx-auto mb-6 h-12 w-12 text-[#8b5cf6] group-hover:scale-105 transition-transform" />
                            <h4 class="text-5xl font-black font-mono text-white mb-2 tracking-tighter">
                                {{ $stat['number'] }}</h4>
                            <p class="text-sm font-mono tracking-wide text-gray-400 uppercase">{{ $stat['label'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- TESTIMONIALS -->
        <section class="py-28 bg-[#07070a] border-t border-white/10">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">
                <div class="text-center mb-16 max-w-3xl mx-auto">
                    <div class="font-mono text-xs text-[#8b5cf6] tracking-widest uppercase mb-3">/// VERIFIED FEEDBACK
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight">INVESTOR <span
                            class="text-[#8b5cf6]">TESTIMONIALS</span></h2>
                    <p class="mt-4 text-base sm:text-lg text-gray-400 font-light">
                        Real words from real investors who have built and grown their wealth consistently on our
                        platform.
                        Their experiences shape how we improve and serve every client.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ([['img' => 'S2yV3QjMr2uyTpA7K1qpO994sbfB6XH7gFzqYcvx.jpg', 'name' => 'David Lee', 'text' => 'I firmly believe that investing is crucial for building long-term wealth. This platform made it seamless and stress-free from day one.'], ['img' => '3WiTifZXIAbbb6yVkJPAXEh6pa4JbULM1DsbPKNV.jpg', 'name' => 'Michael Dyre', 'text' => "I started investing in cryptocurrency back in 2017 and this is by far the most reliable platform I've used. Returns are consistent every week."], ['img' => 'niisMgBnF7OKhgePR1aktjzRinZKtwDJYvRFAMpG.jpg', 'name' => "Skylar O'Conner", 'text' => 'Using cryptocurrency to grow savings felt risky at first, but this platform gave me the confidence and tools to invest smartly and profitably.']] as $testimonial)
                        <div
                            class="bg-[#111116] border border-white/10 hover:border-[#8b5cf6]/40 p-8 transition-all group flex flex-col justify-between shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] relative">
                            <div
                                class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-white/10 to-transparent">
                            </div>
                            <div>
                                <img src="{{ url('assets/images/' . $testimonial['img']) }}"
                                    class="w-20 h-20 mx-auto mb-6 object-cover border border-white/10 grayscale group-hover:grayscale-0 transition-all">
                                <p class="text-gray-300 font-light italic leading-relaxed mb-8 text-center text-sm">
                                    "{{ $testimonial['text'] }}"
                                </p>
                            </div>
                            <h6 class="text-right font-mono text-xs font-bold text-[#8b5cf6] tracking-wider">—
                                {{ $testimonial['name'] }}</h6>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('testimonials') }}" wire:navigate
                        class="inline-block px-8 py-4 bg-[#111116] hover:bg-[#181820] border border-white/10 text-xs font-mono font-bold tracking-widest text-white uppercase transition-all shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)]">
                        Read More Testimonials →
                    </a>
                </div>
            </div>
        </section>

        <!-- MISSION -->
        <section class="py-28 bg-[#0c0c10] border-t border-white/10">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">
                <div class="grid md:grid-cols-12 gap-16 items-center">
                    <div class="order-2 md:order-1 md:col-span-7 space-y-6">
                        <div class="font-mono text-xs text-[#8b5cf6] tracking-widest uppercase">/// PURPOSE</div>
                        <h2 class="text-4xl sm:text-5xl font-black tracking-tight">
                            OUR <span class="text-[#8b5cf6]">MISSION</span>
                        </h2>
                        <h3 class="text-2xl sm:text-3xl font-bold leading-snug text-gray-200">
                            Invest your way, no barriers, no limits
                        </h3>
                        <p class="text-gray-400 text-base sm:text-lg leading-relaxed font-light">
                            We built {{ config('app.name') }} to make professional-grade investing accessible to
                            everyone.
                            Our platform is backed by a diverse team of legal consultants, financial analysts, and
                            experienced market traders committed to maximizing every investor's potential.
                        </p>
                        <p class="text-gray-400 text-sm sm:text-base leading-relaxed font-light">
                            Every decision we make is driven by transparency and ethical practice. We analyze
                            and manage all investments in accordance with the highest industry standards
                            so you always know your money is in trustworthy hands.
                        </p>
                        <div class="pt-4">
                            <a href="{{ route('register') }}" wire:navigate
                                class="inline-block px-8 py-4 bg-[#8b5cf6] text-white font-bold text-sm tracking-wide rounded-none hover:bg-[#7c3aed] transition-all shadow-[inset_0_1px_0_rgba(255,255,255,0.2)] border-b-2 border-black/40">
                                Join Now
                            </a>
                        </div>
                    </div>
                    <div class="order-1 md:order-2 md:col-span-5 text-center">
                        <div
                            class="bg-[#111116] p-6 border border-white/10 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] relative">
                            <div
                                class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent">
                            </div>
                            <img src="{{ url('assets/images/mission.png') }}" alt="Our Mission"
                                class="w-full max-w-md mx-auto filter grayscale contrast-125">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- WHY CHOOSE US -->
        <section id="why-us" class="py-28 bg-[#07070a] border-t border-white/10">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">
                <div class="text-center mb-16 max-w-3xl mx-auto">
                    <div class="font-mono text-xs text-[#8b5cf6] tracking-widest uppercase mb-3">/// ADVANTAGE</div>
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight">WHY <span class="text-[#8b5cf6]">CHOOSE
                            US</span></h2>
                    <p class="mt-4 text-base sm:text-lg text-gray-400 font-light">
                        With a client-first approach at our core, we put your financial goals ahead of everything else
                        carefully investing and planning so you can secure the future you deserve.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-6 mb-6">
                    @foreach ([['icon' => 'chart-bar', 'title' => 'Consistent Weekly Profits', 'desc' => 'We distribute profits weekly and monthly to all investors, regardless of capital size or market conditions. Your returns stay stable even when markets fluctuate.'], ['icon' => 'briefcase', 'title' => 'Professionalism & Experience', 'desc' => 'Our team is composed of seasoned financial professionals, legal advisors, and market strategists who are fully dedicated to each investor\'s success.'], ['icon' => 'shield-check', 'title' => 'Institutional-Grade Security', 'desc' => 'We use advanced security protocols to ensure your deposits and investments are always protected. Your funds are never at risk on our platform.']] as $item)
                        <div
                            class="bg-[#111116] border border-white/10 hover:border-[#8b5cf6]/40 p-10 text-center group transition-all shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] relative">
                            <div
                                class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-white/10 to-transparent">
                            </div>
                            <x-dynamic-component :component="'heroicon-o-' . $item['icon']"
                                class="mx-auto mb-6 h-12 w-12 text-[#8b5cf6] group-hover:scale-105 transition" />
                            <h4 class="text-xl font-bold mb-3 text-white tracking-tight">{{ $item['title'] }}</h4>
                            <p class="text-gray-400 text-sm leading-relaxed font-light">{{ $item['desc'] }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ([['icon' => 'document-check', 'title' => 'Fully Licensed Firm', 'desc' => 'We are a legally registered and licensed investment firm operating under financial regulations in the United States of America, giving every investor full peace of mind.'], ['icon' => 'chat-bubble-bottom-center-text', 'title' => '24/7 Customer Support', 'desc' => 'Our dedicated support team is available around the clock to resolve any inquiry, complaint, or account issue swiftly and professionally, every single day.'], ['icon' => 'bolt', 'title' => 'Instant Withdrawals', 'desc' => 'All withdrawal requests are processed immediately once submitted and approved. No waiting periods, no unnecessary delays your funds reach you fast.']] as $item)
                        <div
                            class="bg-[#111116] border border-white/10 hover:border-[#8b5cf6]/40 p-10 text-center group transition-all shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] relative">
                            <div
                                class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-white/10 to-transparent">
                            </div>
                            <x-dynamic-component :component="'heroicon-o-' . $item['icon']"
                                class="mx-auto mb-6 h-12 w-12 text-[#8b5cf6] group-hover:scale-105 transition" />
                            <h4 class="text-xl font-bold mb-3 text-white tracking-tight">{{ $item['title'] }}</h4>
                            <p class="text-gray-400 text-sm leading-relaxed font-light">{{ $item['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- FEATURES -->
        <section id="features" class="py-28 bg-[#0c0c10] border-t border-white/10">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">
                <div class="grid md:grid-cols-12 gap-16 items-center">
                    <div class="order-2 md:order-1 md:col-span-7 space-y-6">
                        <div class="font-mono text-xs text-[#8b5cf6] tracking-widest uppercase">/// CAPABILITIES</div>
                        <h3 class="text-3xl sm:text-4xl font-black leading-tight tracking-tight">
                            Your capital +
                            <span class="text-[#8b5cf6]">our strategies</span> =
                            <span
                                class="text-white underline decoration-[#8b5cf6] decoration-2 underline-offset-8">steady,
                                reliable returns</span>
                        </h3>
                        <ul class="space-y-6 text-sm sm:text-base text-gray-300 font-light pt-4">
                            <li
                                class="flex items-start gap-4 bg-[#111116] p-4 border border-white/5 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.04)]">
                                <span class="text-[#8b5cf6] font-mono font-bold">✔</span>
                                <p><span class="font-bold text-white">Crypto Payments</span> — Deposit and withdraw
                                    seamlessly using multiple accepted digital currencies, with near-instant processing
                                    times.</p>
                            </li>
                            <li
                                class="flex items-start gap-4 bg-[#111116] p-4 border border-white/5 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.04)]">
                                <span class="text-[#8b5cf6] font-mono font-bold">✔</span>
                                <p><span class="font-bold text-white">Simplified Investing</span> — We have removed all
                                    the complexity from investment processes. Simply choose a plan, fund your account,
                                    and earn.</p>
                            </li>
                            <li
                                class="flex items-start gap-4 bg-[#111116] p-4 border border-white/5 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.04)]">
                                <span class="text-[#8b5cf6] font-mono font-bold">✔</span>
                                <p><span class="font-bold text-white">Advanced Dashboard</span> — Monitor all your
                                    balances, active investments, transaction history, and account activity from a
                                    single, intuitive interface.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="order-1 md:order-2 md:col-span-5 text-center">
                        <div
                            class="bg-[#111116] p-6 border border-white/10 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] relative">
                            <div
                                class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent">
                            </div>
                            <img src="{{ url('assets/images/feature-7.png') }}" alt="Platform Features"
                                class="w-full max-w-lg mx-auto filter grayscale contrast-125">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- DEVICE COMPATIBILITY -->
        <section class="py-28 bg-[#07070a] border-t border-white/10">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">
                <div class="text-center mb-16 max-w-xl mx-auto">
                    <div class="font-mono text-xs text-[#8b5cf6] tracking-widest uppercase mb-3">/// MULTIPLATFORM
                    </div>
                    <h5 class="text-3xl sm:text-4xl font-black tracking-tight">
                        Invest <span class="text-[#8b5cf6]">anywhere</span>,
                        <span class="text-white">anytime</span>, on any device
                    </h5>
                    <p class="mt-4 text-sm sm:text-base text-gray-400 font-light">
                        Our platform is fully optimized across all devices so you never miss a market opportunity,
                        whether you're at home or on the go.
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach ([['svg' => 'mobile-phone.svg', 'label' => 'iOS Devices'], ['svg' => 'mobile-phone.svg', 'label' => 'Android Devices'], ['svg' => 'tablet.svg', 'label' => 'Windows Devices'], ['svg' => 'globe-alt.svg', 'label' => 'Web Browsers']] as $item)
                        <div
                            class="group bg-[#111116] border border-white/10 p-8 text-center transition-all hover:border-[#8b5cf6]/40 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] relative">
                            <div
                                class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-white/10 to-transparent">
                            </div>
                            <img src="{{ url('assets/images/svg/' . $item['svg']) }}" alt="{{ $item['label'] }}"
                                class="mx-auto mb-6 h-14 w-14 filter invert opacity-80 group-hover:opacity-100 transition-all">
                            <h5 class="text-base font-bold text-gray-200 tracking-tight">{{ $item['label'] }}</h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>

    @section('xtraJs')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const backdrop = document.querySelector('.liquid-backdrop');
                if (!backdrop) return;
                const updateLiquid = () => {
                    const scrollPercent = Math.min(window.scrollY / (window.innerHeight * 1.5), 1.8);
                    backdrop.style.animationDuration = `${32 - scrollPercent * 24}s`;
                    backdrop.style.filter =
                        `blur(${3 + scrollPercent * 5}px) contrast(${1.08 + scrollPercent * 0.4})`;
                };
                window.addEventListener('scroll', updateLiquid);
                updateLiquid();
            });
        </script>
    @endsection

</div>
