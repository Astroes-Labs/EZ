<div>

<div class="min-h-screen bg-[#0a0f1c] text-gray-100 font-sans">

    <!-- HERO SECTION -->
    <section class="relative min-h-screen flex items-center overflow-hidden pt-20" id="banner">
        <div class="absolute inset-0 bg-[#0a0f1c]">
            <img src="{{ url('assets/images/banner-img.png') }}"
                 alt="Crypto Trading Backdrop"
                 class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0f1c]/90 via-[#222f53]/70 to-[#0a0f1c]"></div>
        </div>

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
                    Weekly and monthly returns, regardless of market conditions.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-6">
                    <a href="{{ route('register') }}" wire:navigate
                       class="px-6 sm:px-8 py-3 sm:py-4 text-sm sm:text-base font-bold bg-[#222f53] hover:bg-[#2a3a6b] border border-[#eac46e] rounded-2xl transition-all hover:scale-105">
                        Start Investing →
                    </a>
                    <a href="{{ route('how') }}" wire:navigate
                       class="px-6 sm:px-8 py-3 sm:py-4 text-sm sm:text-base font-semibold border border-[#eac46e]/60 hover:border-[#eac46e] rounded-2xl transition-all">
                        How It Works
                    </a>
                </div>

                <div class="flex flex-wrap justify-center gap-x-10 gap-y-4 pt-10 text-sm text-gray-400">
                    <div class="flex items-center gap-3"><i class="fa fa-shield-alt text-[#eac46e]"></i><span>Licensed &amp; Secure</span></div>
                    <div class="flex items-center gap-3"><i class="fa fa-clock text-[#eac46e]"></i><span>Instant Withdrawals</span></div>
                    <div class="flex items-center gap-3"><i class="fa fa-users text-[#eac46e]"></i><span>49,000+ Investors</span></div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-8 left-0 right-0 z-30 pointer-events-none">
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                    { "symbols": [{"proName":"BINANCE:BTCUSDT","title":"BTC"},{"proName":"BINANCE:ETHUSDT","title":"ETH"},{"proName":"BINANCE:SOLUSDT","title":"SOL"}], "colorTheme": "dark", "isTransparent": true }
                </script>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="py-28 bg-[#111827] border-t border-[#222f53]">
        <div class="max-w-screen-2xl mx-auto px-6">

            {{-- Intro headline --}}
            <div class="text-center mb-20">
                <h2 class="text-4xl sm:text-5xl font-bold tracking-tight">
                    <span class="text-[#eac46e]">{{ config('app.name') }}</span> delivers investments and
                    financial services without <span class="text-[#eac46e]">complexity</span>
                </h2>
            </div>

            {{-- 3-col credential stats --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center mb-20">
                @foreach([
                    ['icon' => 'briefcase',     'number' => '10 Years', 'label' => 'Industry Experience'],
                    ['icon' => 'shield-check',  'number' => '7 Years',  'label' => 'Regulated & Licensed'],
                    ['icon' => 'chart-bar',     'number' => '15M+',     'label' => 'Daily Average Fund'],
                ] as $cred)
                <div class="bg-[#1a2238] border border-[#222f53] hover:border-[#eac46e]/40 rounded-3xl p-10 group transition-all hover:-translate-y-1">
                    <x-dynamic-component
                        :component="'heroicon-o-' . $cred['icon']"
                        class="mx-auto mb-6 h-16 w-16 text-[#eac46e] group-hover:scale-110 transition-transform" />
                    <h4 class="text-4xl font-black text-[#eac46e] mb-2">{{ $cred['number'] }}</h4>
                    <p class="text-gray-400 text-lg">{{ $cred['label'] }}</p>
                </div>
                @endforeach
            </div>

            <div class="border-t border-[#222f53] my-4"></div>

            {{-- About content: image + text --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mt-20">

                {{-- Rotating image --}}
                <div class="text-center">
                    <div class="relative inline-block w-64 sm:w-80 lg:w-96 mx-auto">
                        <div class="absolute inset-0 rounded-full bg-gradient-to-br from-[#eac46e]/20 via-[#eac46e]/10 to-transparent blur-2xl animate-pulse"></div>
                        <img src="{{ url('assets/images/work-process.png') }}"
                             class="rotation-img w-full h-auto drop-shadow-2xl relative z-10"
                             alt="How We Work">
                    </div>
                </div>

                {{-- Text --}}
                <div class="space-y-6">
                    <h3 class="text-4xl sm:text-5xl font-bold tracking-tight">
                        ABOUT <span class="text-[#eac46e]">{{ config('app.name') }}</span>
                    </h3>
                    <h4 class="text-2xl sm:text-3xl font-semibold leading-snug">
                        Reshaping the future of
                        <span class="text-[#eac46e]">crypto investment</span>
                    </h4>
                    <p class="text-gray-300 text-base sm:text-lg leading-relaxed">
                        At {{ config('app.name') }}, we go beyond traditional investment firms, we are a dedicated financial
                        service provider committed to helping every investor grow wealth without the burden of day-to-day
                        market monitoring. Our in-house proprietary investment software, built by a team of seasoned
                        financial professionals and market strategists, is engineered to minimize risk while maximizing
                        the efficiency of every investment cycle.
                    </p>
                    <p class="text-gray-400 text-base leading-relaxed">
                        Our business model is designed to deliver high-yield returns on a weekly or monthly basis,
                        staying consistent and reliable regardless of market fluctuations , something few firms
                        in the industry can genuinely offer.
                    </p>
                    <a href="{{ route('about') }}" wire:navigate
                       class="inline-block px-8 py-4 bg-[#eac46e] text-[#111827] font-bold rounded-2xl hover:bg-amber-300 transition-all">
                        Learn More About Us
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ═══════════════════════════════════════════════════ END ABOUT -->

    <!-- HOW IT WORKS -->
    <section id="how-it-works" class="py-28 bg-[#0a0f1c] border-t border-[#222f53]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold tracking-tight">HOW IT <span class="text-[#eac46e]">WORKS</span></h2>
                <p class="mt-4 text-xl text-gray-400 max-w-2xl mx-auto">
                    Get started with {{ config('app.name') }} in three straightforward steps , no experience required.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                @foreach([
                    [
                        'icon' => 'user-plus',
                        'title' => 'SIGN UP',
                        'desc' => 'Create a free account using your details and a secure password. You must verify your email address before you can log in and begin investing.',
                        'link' => route('register')
                    ],
                    [
                        'icon' => 'banknotes',
                        'title' => 'DEPOSIT',
                        'desc' => 'Fund your account with any supported cryptocurrency or payment method. Choose the amount that suits your investment goals and budget.',
                        'link' => '#'
                    ],
                    [
                        'icon' => 'chart-bar',
                        'title' => 'INVEST',
                        'desc' => 'Select an investment plan and let our platform do the rest. Once your cycle completes, your ROI becomes available for withdrawal or reinvestment.',
                        'link' => '#'
                    ]
                ] as $step)
                <div class="group bg-[#1a2238] border border-[#222f53]/50 hover:border-[#eac46e]/30 p-10 rounded-3xl transition-all hover:-translate-y-2">
                    <x-dynamic-component :component="'heroicon-o-' . $step['icon']"
                        class="h-14 w-14 text-[#eac46e] mb-8 group-hover:scale-110 transition" />
                    <a href="{{ $step['link'] }}" wire:navigate
                       class="text-2xl font-semibold text-[#eac46e] hover:text-amber-300 transition block mb-4">
                        {{ $step['title'] }}
                    </a>
                    <p class="text-gray-400 leading-relaxed">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- TOP MOVERS / SCREENER -->
    <section class="py-20 bg-[#111827] border-t border-[#222f53]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold tracking-tight">CRYPTO <span class="text-[#eac46e]">MOVERS</span></h2>
                <p class="mt-4 text-xl text-gray-400 max-w-3xl mx-auto">
                    Live performance data across the top digital assets, volume, price action, and momentum, all in one view, updated in real time.
                </p>
            </div>
            <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl overflow-hidden shadow-2xl pointer-events-none">
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
    <section id="plans" class="py-28 bg-[#0a0f1c] border-t border-[#222f53]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="text-center mb-6">
                <h2 class="text-5xl font-bold tracking-tight">INVESTMENT <span class="text-[#eac46e]">PLANS</span></h2>
                <p class="mt-4 text-xl text-gray-400 max-w-3xl mx-auto">
                    Choose from a range of carefully structured plans tailored to every capital size,
                    each designed to deliver the highest possible returns on your investment.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mt-16">
                @foreach([
                    ['title' => 'BASIC PLAN',    'roi' => '12%', 'min' => '1,000',   'max' => '49,900'],
                    ['title' => 'GOLD PLAN',     'roi' => '15%', 'min' => '50,000',  'max' => '199,000'],
                    ['title' => 'DIAMOND PLAN',  'roi' => '25%', 'min' => '200,000', 'max' => '499,000'],
                    ['title' => 'PLATINUM PLAN', 'roi' => '30%', 'min' => '500,000', 'max' => '1,000,000', 'featured' => true]
                ] as $plan)
                <div class="relative {{ isset($plan['featured']) ? 'scale-105 z-10' : '' }}">
                    <div class="bg-[#1a2238] border {{ isset($plan['featured']) ? 'border-[#eac46e]' : 'border-[#222f53]' }} rounded-3xl overflow-hidden hover:border-[#eac46e] transition-all h-full">
                        @if(isset($plan['featured']))
                            <div class="bg-[#eac46e] text-[#111827] text-xs font-bold tracking-widest py-1 text-center">MOST POPULAR</div>
                        @endif
                        <div class="p-10 text-center">
                            <h3 class="text-2xl font-bold mb-8">{{ $plan['title'] }}</h3>
                            <div class="text-7xl font-black text-[#eac46e] mb-2">{{ $plan['roi'] }}</div>
                            <div class="text-sm text-gray-400 mb-10">WEEKLY ROI</div>
                            <ul class="space-y-5 text-left mb-12">
                                <li class="flex justify-between border-b border-[#222f53] pb-3"><span class="text-gray-400">Minimum</span><span class="font-medium">${{ $plan['min'] }}</span></li>
                                <li class="flex justify-between border-b border-[#222f53] pb-3"><span class="text-gray-400">Maximum</span><span class="font-medium">${{ $plan['max'] }}</span></li>
                                <li class="flex justify-between"><span class="text-gray-400">Capital Return</span><span class="text-emerald-400 font-semibold">YES</span></li>
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

    <!-- STATS -->
    <section class="py-28 bg-[#111827] border-t border-[#222f53]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['icon' => 'users',      'number' => '49K+',   'label' => 'Active Investors'],
                    ['icon' => 'banknotes',  'number' => '15.2B+', 'label' => 'Total Invested Fund'],
                    ['icon' => 'globe-alt',  'number' => '150+',   'label' => 'Supported Countries'],
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
    <section class="py-28 bg-[#0a0f1c] border-t border-[#222f53]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold tracking-tight">INVESTOR <span class="text-[#eac46e]">TESTIMONIALS</span></h2>
                <p class="mt-4 text-xl text-gray-400 max-w-3xl mx-auto">
                    Real words from real investors who have built and grown their wealth consistently on our platform.
                    Their experiences shape how we improve and serve every client.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['img' => 'S2yV3QjMr2uyTpA7K1qpO994sbfB6XH7gFzqYcvx.jpg', 'name' => 'David Lee',       'text' => "I firmly believe that investing is crucial for building long-term wealth. This platform made it seamless and stress-free from day one."],
                    ['img' => '3WiTifZXIAbbb6yVkJPAXEh6pa4JbULM1DsbPKNV.jpg', 'name' => "Skylar O'Conner", 'text' => "I started investing in cryptocurrency back in 2017 and this is by far the most reliable platform I've used. Returns are consistent every week."],
                    ['img' => 'niisMgBnF7OKhgePR1aktjzRinZKtwDJYvRFAMpG.jpg', 'name' => 'Michael Dyre',    'text' => "Using cryptocurrency to grow savings felt risky at first, but this platform gave me the confidence and tools to invest smartly and profitably."]
                ] as $testimonial)
                <div class="bg-[#1a2238] border border-[#222f53] hover:border-[#eac46e]/30 p-8 rounded-3xl transition-all group">
                    <img src="{{ url('assets/images/' . $testimonial['img']) }}"
                         class="w-24 h-24 rounded-2xl mx-auto mb-6 object-cover border-4 border-[#eac46e]/30 group-hover:border-[#eac46e] transition-colors">
                    <p class="text-gray-300 italic leading-relaxed mb-8 text-center">
                        "{{ $testimonial['text'] }}"
                    </p>
                    <h6 class="text-right font-semibold text-[#eac46e]">— {{ $testimonial['name'] }}</h6>
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

    <!-- MISSION -->
    <section class="py-28 bg-gradient-to-br from-[#111827] to-[#0a0f1c] border-t border-[#222f53]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="order-2 md:order-1 space-y-6">
                    <h2 class="text-5xl font-bold tracking-tight">
                        OUR <span class="text-[#eac46e]">MISSION</span>
                    </h2>
                    <h3 class="text-2xl sm:text-3xl font-semibold leading-snug">
                        Invest your way, no barriers, no limits
                    </h3>
                    <p class="text-gray-300 text-base sm:text-lg leading-relaxed">
                        We built {{ config('app.name') }} to make professional-grade investing accessible to everyone.
                        Our platform is backed by a diverse team of legal consultants, financial analysts, and
                        experienced market traders committed to maximizing every investor's potential.
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        Every decision we make is driven by transparency and ethical practice. We analyze
                        and manage all investments in accordance with the highest industry standards
                        so you always know your money is in trustworthy hands.
                    </p>
                    <a href="{{ route('register') }}" wire:navigate
                       class="inline-block px-8 py-4 bg-[#eac46e] text-[#111827] font-bold rounded-2xl hover:bg-amber-300 transition-all">
                        Join Now
                    </a>
                </div>
                <div class="order-1 md:order-2 text-center">
                    <img src="{{ url('assets/images/mission.png') }}" alt="Our Mission"
                         class="w-full max-w-md mx-auto rounded-3xl drop-shadow-2xl hover:scale-105 transition-transform duration-700">
                </div>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE US -->
    <section id="why-us" class="py-28 bg-[#111827] border-t border-[#222f53]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold tracking-tight">WHY <span class="text-[#eac46e]">CHOOSE US</span></h2>
                <p class="mt-4 text-xl text-gray-400 max-w-3xl mx-auto">
                    With a client-first approach at our core, we put your financial goals ahead of everything else 
                    carefully investing and planning so you can secure the future you deserve.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-10">
                @foreach([
                    ['icon' => 'chart-bar',    'title' => 'Consistent Weekly Profits',        'desc' => 'We distribute profits weekly and monthly to all investors, regardless of capital size or market conditions. Your returns stay stable even when markets fluctuate.'],
                    ['icon' => 'briefcase',    'title' => 'Professionalism & Experience',     'desc' => 'Our team is composed of seasoned financial professionals, legal advisors, and market strategists who are fully dedicated to each investor\'s success.'],
                    ['icon' => 'shield-check', 'title' => 'Institutional-Grade Security',    'desc' => 'We use advanced security protocols to ensure your deposits and investments are always protected. Your funds are never at risk on our platform.']
                ] as $item)
                <div class="bg-[#1a2238] border border-[#222f53] hover:border-[#eac46e]/40 p-10 rounded-3xl text-center group transition-all hover:-translate-y-1">
                    <x-dynamic-component :component="'heroicon-o-' . $item['icon']"
                        class="mx-auto mb-8 h-16 w-16 text-[#eac46e] group-hover:scale-110 transition" />
                    <h4 class="text-2xl font-semibold mb-4">{{ $item['title'] }}</h4>
                    <p class="text-gray-400 leading-relaxed">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['icon' => 'document-check',                 'title' => 'Fully Licensed Firm',        'desc' => 'We are a legally registered and licensed investment firm operating under financial regulations in the United States of America, giving every investor full peace of mind.'],
                    ['icon' => 'chat-bubble-bottom-center-text', 'title' => '24/7 Customer Support',      'desc' => 'Our dedicated support team is available around the clock to resolve any inquiry, complaint, or account issue swiftly and professionally, every single day.'],
                    ['icon' => 'bolt',                           'title' => 'Instant Withdrawals',        'desc' => 'All withdrawal requests are processed immediately once submitted and approved. No waiting periods, no unnecessary delays your funds reach you fast.']
                ] as $item)
                <div class="bg-[#1a2238] border border-[#222f53] hover:border-[#eac46e]/40 p-10 rounded-3xl text-center group transition-all hover:-translate-y-1">
                    <x-dynamic-component :component="'heroicon-o-' . $item['icon']"
                        class="mx-auto mb-8 h-16 w-16 text-[#eac46e] group-hover:scale-110 transition" />
                    <h4 class="text-2xl font-semibold mb-4">{{ $item['title'] }}</h4>
                    <p class="text-gray-400 leading-relaxed">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section id="features" class="py-28 bg-gradient-to-br from-[#222f53] to-[#0a0f1c] border-t border-[#222f53]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="order-2 md:order-1 space-y-6">
                    <h3 class="text-4xl sm:text-5xl font-bold leading-tight">
                        Your capital +
                        <span class="text-[#eac46e]">our strategies</span> =
                        <span class="text-[#eac46e]">steady, reliable returns</span>
                    </h3>
                    <ul class="space-y-6 text-base sm:text-lg text-gray-200">
                        <li class="flex items-start gap-4">
                            <span class="text-2xl text-[#eac46e]">✔</span>
                            <p><span class="font-semibold text-white">Crypto Payments</span> — Deposit and withdraw seamlessly using multiple accepted digital currencies, with near-instant processing times.</p>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="text-2xl text-[#eac46e]">✔</span>
                            <p><span class="font-semibold text-white">Simplified Investing</span> — We have removed all the complexity from investment processes. Simply choose a plan, fund your account, and earn.</p>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="text-2xl text-[#eac46e]">✔</span>
                            <p><span class="font-semibold text-white">Advanced Dashboard</span> — Monitor all your balances, active investments, transaction history, and account activity from a single, intuitive interface.</p>
                        </li>
                    </ul>
                </div>
                <div class="order-1 md:order-2 text-center">
                    <img src="{{ url('assets/images/feature-7.png') }}" alt="Platform Features"
                         class="w-full max-w-lg mx-auto rounded-3xl drop-shadow-2xl hover:scale-105 transition-transform duration-700">
                </div>
            </div>
        </div>
    </section>

    <!-- DEVICE COMPATIBILITY -->
    <section class="py-28 bg-[#0a0f1c] border-t border-[#222f53]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="text-center mb-16">
                <h5 class="text-4xl font-bold">
                    Invest <span class="text-[#eac46e]">anywhere</span>,
                    <span class="text-[#eac46e]">anytime</span>, on any device
                </h5>
                <p class="mt-4 text-lg text-gray-400 max-w-xl mx-auto">
                    Our platform is fully optimized across all devices so you never miss a market opportunity, whether you're at home or on the go.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
                @foreach([
                    ['svg' => 'mobile-phone.svg', 'label' => 'iOS Devices'],
                    ['svg' => 'mobile-phone.svg', 'label' => 'Android Devices'],
                    ['svg' => 'tablet.svg',        'label' => 'Windows Devices'],
                    ['svg' => 'globe-alt.svg',     'label' => 'Web Browsers'],
                ] as $item)
                <div class="group">
                    <img src="{{ url('assets/images/svg/' . $item['svg']) }}"
                         alt="{{ $item['label'] }}"
                         class="mx-auto mb-6 h-20 w-20 transition-all group-hover:scale-125 group-hover:rotate-6 group-hover:drop-shadow-[0_0_15px_rgba(234,196,110,0.5)]">
                    <h5 class="text-xl font-semibold">{{ $item['label'] }}</h5>
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
            backdrop.style.filter = `blur(${3 + scrollPercent * 5}px) contrast(${1.08 + scrollPercent * 0.4})`;
        };
        window.addEventListener('scroll', updateLiquid);
        updateLiquid();
    });
</script>
@endsection

</div>