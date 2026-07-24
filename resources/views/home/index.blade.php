@extends('layouts.home.layout')

@section('title', 'Welcome To ' . config('app.name') . ' - Cryptocurrency Investment | Trade ...')

@section('content')

    <!-- Top-level alert container (replaces your old if blocks) -->
    @include('components.alert')

<!-- Hero Section – image now as full backdrop -->
<section class="relative min-h-[100vh] flex items-center overflow-hidden bg-black" id="banner">
    <!-- Full-bleed backdrop image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ url('assets/images/banner-img.png') }}" 
             alt="Crypto Investment Backdrop" 
             class="w-full h-full object-cover object-center opacity-40 transition-opacity duration-700">
        <!-- Subtle overlay to improve text readability -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/60 to-black/80"></div>
    </div>

    <!-- Liquid + particles layer (on top of image, still visible) -->
    <div class="absolute inset-0 z-10 pointer-events-none">
        <!-- Your existing liquid-backdrop div goes here -->
        <div class="liquid-backdrop absolute inset-0 opacity-70"></div>

        <!-- Stronger white/opaque fade at top -->
        <div class="absolute inset-0 bg-gradient-to-b from-white/55 via-white/20 to-transparent pointer-events-none"></div>

        <!-- Floating red particles -->
        <div class="particles absolute inset-0 pointer-events-none"></div>
    </div>

    <!-- Main content – now centered over the backdrop -->
    <div class="container mx-auto px-6 lg:px-8 relative z-20 py-32 lg:py-40">
        <div class="max-w-4xl mx-auto text-center space-y-10 lg:space-y-12">
            <!-- Headline -->
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight leading-tight text-white drop-shadow-2xl">
                Invest Your <span class="text-red-400">Crypto</span><br class="sm:hidden">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-red-300 via-white to-red-300 animate-gradient-x">
                    with Velocity
                </span>
            </h1>

            <!-- Subheadline -->
            <p class="text-xl sm:text-2xl text-gray-200 max-w-3xl mx-auto leading-relaxed font-light drop-shadow-lg">
                Unlock endless financial freedom with smart, simple crypto investments — designed for every budget and goal.
            </p>

            <!-- Buttons – centered now -->
            <div class="flex flex-col sm:flex-row gap-5 justify-center pt-8">
                <a href="{{ route('register') }}"
                   class="group relative inline-flex items-center justify-center px-8 py-4 text-base sm:text-lg font-bold text-white bg-red-600 rounded-xl overflow-hidden shadow-xl hover:shadow-red-600/50 transition-all duration-500 hover:-translate-y-1 hover:scale-[1.03] min-w-[180px]">
                    <span class="absolute inset-0 bg-gradient-to-r from-red-500 to-red-700 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-500"></span>
                    <span class="relative z-10">Get Started Now</span>
                </a>

                <a href="#features"
                   class="inline-flex items-center justify-center px-8 py-4 text-base sm:text-lg font-semibold text-white border-2 border-red-400/70 rounded-xl hover:bg-red-600/30 backdrop-blur-sm transition-all duration-300 min-w-[180px]">
                    Learn How It Works →
                </a>
            </div>

            <!-- Optional trust badges -->
            <div class="flex flex-wrap justify-center gap-8 pt-6 text-sm text-gray-300">
                <div class="flex items-center gap-2">
                    <i class="fa fa-shield-alt text-red-400"></i>
                    <span>Secure & Licensed</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa fa-clock text-red-400"></i>
                    <span>Instant Withdrawals</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa fa-users text-red-400"></i>
                    <span>49K+ Investors</span>
                </div>
            </div>
        </div>

        <!-- Ticker tape – still at bottom -->
        <div class="mt-16 lg:mt-24 pointer-events-none relative z-20">
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                    { /* your ticker config – unchanged */ }
                </script>
            </div>
        </div>
    </div>
</section>

    <!-- Work / About Section -->
    <section class="work-part bg-gray-50 pt-20 pb-32">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-4xl sm:text-5xl font-bold text-gray-900">
                    <span class="text-red-600">{{ config('app.name') }}</span> provides investments and
                    financial services without <span class="text-red-600">Clutter</span>
                </h3>
            </div>

           <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center mb-20">
                <!-- Industry Experience -->
                <div class="animate-fade-in-up">
                    <x-heroicon-o-briefcase class="mx-auto mb-6 h-16 w-16 text-blue-500 hover:scale-110 transition-transform" />
                    <h4 class="text-2xl font-bold text-red-600">10 Years</h4>
                    <p class="text-gray-600 mt-2">Industry Experience</p>
                </div>

                <!-- Regulations License -->
                <div class="animate-fade-in-up delay-100">
                    <x-heroicon-o-shield-check class="mx-auto mb-6 h-16 w-16 text-green-500 hover:scale-110 transition-transform" />
                    <h4 class="text-2xl font-bold text-red-600">7 Years</h4>
                    <p class="text-gray-600 mt-2">Regulations License</p>
                </div>

                <!-- Daily Avg. Fund -->
                <div class="animate-fade-in-up delay-200">
                    <x-heroicon-o-chart-bar class="mx-auto mb-6 h-16 w-16 text-yellow-500 hover:scale-110 transition-transform" />
                    <h4 class="text-2xl font-bold text-red-600">15M +</h4>
                    <p class="text-gray-600 mt-2">Daily Avg. Fund</p>
                </div>
            </div>


            <hr class="border-red-200 my-16">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Left: Pulsing glowing image -->
                <div class="text-center lg:text-left animate-fade-in-left">
                    <div class="relative inline-block w-64 sm:w-80 lg:w-96 mx-auto lg:mx-0">
                        <!-- Glowing red background that pulses slightly -->
                        <div class="absolute inset-0 rounded-full bg-gradient-to-br from-red-600/40 via-red-500/20 to-transparent blur-2xl animate-pulse-glow"></div>
                        
                        <!-- The actual image with pulse scale animation -->
                        <img src="{{ url('assets/images/work-process.png') }}" 
                            class="rotation-img w-full h-auto drop-shadow-2xl relative z-10 animate-pulse-scale"
                            alt="Work Process">
                    </div>
                </div>

                <!-- Right: Text content (unchanged) -->
                <div class="animate-fade-in-right space-y-6 lg:space-y-8">
                    <h3 class="text-4xl sm:text-5xl font-bold text-red-600">
                        ABOUT <span class="text-gray-900">{{ config('app.name') }}</span>
                    </h3>
                    
                    <h4 class="text-3xl sm:text-4xl font-semibold">
                        We’re <span class="text-red-600">Revolutionizing</span> the World of 
                        <span class="text-red-600">Crypto Investments</span>
                    </h4>

                    <p class="text-lg text-gray-700 leading-relaxed">
                        At {{ config('app.name') }}, we don't just pride ourselves as an investment company, but as
                        a provider of an exclusive financial service to empower investors to earn without being engaged with
                        day-to-day investments process, disengaging them from it totally.
                        We have developed a proprietary investment software by our experts and professionals
                        significantly to reduces financial risks, while increasing the efficiency of investments
                        sessions at the same time.
                        We have put in place a business model, which allows investors to receive high interest rates
                        on a weekly or monthly basis, regardless of changes in the financial market, which not every company can keep up with.
                    </p>

                    <a href="{{ route('about') }}" 
                    class="inline-block bg-red-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-red-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Know More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
<section class="feature-part bg-gradient-to-b from-white to-red-50 pt-20 pb-32">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h3 class="text-4xl sm:text-5xl font-bold text-gray-900">
                HOW IT <span class="text-red-600">WORKS</span>
            </h3>
            <p class="mt-6 text-xl text-gray-600 max-w-3xl mx-auto">
                Start your journey with {{ config('app.name') }} in 3 easy steps, no hassles.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            @foreach([
                [
                    'icon' => 'user-plus',
                    'title' => 'SIGN UP',
                    'desc' => 'Create an account with your details and a password. You must verify your email before logging in.',
                    'link' => route('register')
                ],
                [
                    'icon' => 'banknotes',
                    'title' => 'DEPOSIT',
                    'desc' => 'Fund your account with a desired amount using any of the available payment methods.',
                    'link' => '#'
                ],
                [
                    'icon' => 'chart-bar',
                    'title' => 'INVEST',
                    'desc' => 'Invest and wait for your investment cycle to complete. ROI becomes available for withdrawal or reinvestment.',
                    'link' => '#'
                ]
            ] as $step)

                <div class="text-center animate-fade-in-up group">

                    {{-- Dynamic Heroicon --}}
                    <x-dynamic-component 
                        :component="'heroicon-o-' . $step['icon']"
                        class="mx-auto mb-8 h-20 w-20 text-red-600 transition-transform duration-500 group-hover:scale-110"
                    />

                    <a href="{{ $step['link'] }}" 
                       class="text-2xl font-bold text-red-600 hover:text-red-700 transition block mb-4">
                        {{ $step['title'] }}
                    </a>

                    <p class="text-gray-700 leading-relaxed">
                        {{ $step['desc'] }}
                    </p>

                </div>
            @endforeach
        </div>

        <hr class="border-red-200 my-20">
    </div>
</section>


    <!-- TradingView Screener Section -->
    <section class="about-main bg-gray-900 py-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="animate-fade-in">
                <div class="pointer-events-none bg-gray-800 rounded-2xl overflow-hidden shadow-2xl">
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
        </div>
    </section>

   <!-- Stats Section -->
    <section class="feature-part-2 bg-gradient-to-b from-red-50 to-white py-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                @foreach([
                    ['icon' => 'users', 'number' => '49K+', 'label' => 'Active Investors'],
                    ['icon' => 'banknotes', 'number' => '15.2B+', 'label' => 'Invested Fund'],
                    ['icon' => 'globe-alt', 'number' => '150+', 'label' => 'Supported Countries'],
                ] as $stat)

                    <div class="animate-fade-in-up group">

                        {{-- Dynamic Heroicon --}}
                        <x-dynamic-component 
                            :component="'heroicon-o-' . $stat['icon']"
                            class="mx-auto mb-6 h-20 w-20 text-red-600 transition-transform duration-500 group-hover:scale-110"
                        />

                        <h4 class="text-4xl font-bold text-red-600 mb-3">
                            {{ $stat['number'] }}
                        </h4>

                        <p class="text-xl text-gray-700">
                            {{ $stat['label'] }}
                        </p>

                    </div>

                @endforeach
            </div>
        </div>
    </section>


    <!-- Testimonials Section -->
    <section class="team-part bg-gray-50 pt-20 pb-32">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-4xl sm:text-5xl font-bold text-gray-900">
                    <span class="text-red-600">INVESTOR'S</span> TESTIMONIALS
                </h3>
                <p class="mt-6 text-xl text-gray-600 max-w-4xl mx-auto">
                    Here a few words from our most trusted investors. These words are like guides to us, and they help weave our deep legal and technical experience into our financial and investments services.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                @foreach([
                    ['img' => 'S2yV3QjMr2uyTpA7K1qpO994sbfB6XH7gFzqYcvx.jpg', 'name' => 'David Lee', 'text' => "I firmly believe that investing is crucial for building wealth..."],
                    ['img' => '3WiTifZXIAbbb6yVkJPAXEh6pa4JbULM1DsbPKNV.jpg', 'name' => 'Skylar O\'Conner', 'text' => "I started investing in cryptocurrency back in 2017..."],
                    ['img' => 'niisMgBnF7OKhgePR1aktjzRinZKtwDJYvRFAMpG.jpg', 'name' => 'Michael Dyre', 'text' => "I started using cryptocurrency a few years ago..."]
                ] as $testimonial)
                    <div class="bg-white rounded-2xl shadow-xl p-8 animate-fade-in-up hover:shadow-2xl transition-shadow duration-300">
                        <img src="{{ url('assets/images/' . $testimonial['img']) }}" 
                             class="w-40 h-40 rounded-full mx-auto mb-6 object-cover border-4 border-red-600">
                        <p class="text-gray-700 leading-relaxed mb-6 italic">
                            "{{ $testimonial['text'] }}"
                        </p>
                        <h6 class="text-right text-red-600 font-semibold">- {{ $testimonial['name'] }}</h6>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-16">
                <a href="{{ route('testimonials') }}" 
                   class="inline-block bg-red-600 text-white px-10 py-5 rounded-xl font-bold text-lg hover:bg-red-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    More Testimonials
                </a>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="about-main bg-gradient-to-br from-gray-900 to-red-950 py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1 animate-fade-in-right">
                    <h2 class="text-5xl font-bold text-red-600 mb-8">OUR <span class="text-white">MISSION</span></h2>
                    <h3 class="text-3xl font-semibold mb-6">Invest the way you want without restrictions</h3>
                    <p class="text-lg text-gray-300 leading-relaxed mb-10">
                        We have built a platform that provides the best possible financial investment services to everyone.
                        We have a team of experts and professionals, consisting of experienced legal consultants,
                        financial experts and wall's street trader that will make every possible effort to meet the expectations of our investors and to satisfy their individual investment requirements.
                        All investments processes are analyzed and managed in accordance with the highest ethical values.
                        Transparency is a must in everything we do.
                    </p>
                    <a href="{{ route('register') }}" 
                       class="inline-block bg-white text-red-600 px-10 py-5 rounded-xl font-bold text-lg hover:bg-gray-100 transition shadow-lg hover:shadow-xl">
                        Join Now
                    </a>
                </div>
                <div class="order-1 lg:order-2 animate-fade-in-left text-center">
                    <img src="{{ url('assets/images/mission.png') }}" 
                         alt="Mission" 
                         class="max-w-lg w-full mx-auto drop-shadow-2xl hover:scale-105 transition-transform duration-700">
                </div>
            </div>
        </div>
    </section>

    
  <!-- Investments Plan Section -->
    <section class="timeline bg-gradient-to-b from-gray-50 to-white py-24 relative overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Heading -->
            <div class="text-center mb-16 animate-fade-in">
                <h3 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 tracking-tight">
                    INVESTMENTS <span class="text-red-600">PLAN</span>
                </h3>
                <p class="mt-6 text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Evaluate from a range of investments plan tailored to suit any capital size,
                    while providing the highest profit margins possible to everyone.
                </p>
            </div>

            <!-- Pricing Cards Grid – 4 cards, custom has red border -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">
                @foreach([
                    
                        [
                            'title' => 'BASIC PLAN',
                            'roi' => '12%',
                            'min' => '1000',
                            'max' => '49900',
                            'delay' => '0.1s',
                            'border' => false
                        ],
                        [
                            'title' => 'GOLD PLAN',
                            'roi' => '15%',
                            'min' => '50000',
                            'max' => '199000',
                            'delay' => '0.2s',
                            'border' => false
                        ],
                        [
                            'title' => 'DIAMOND PLAN',
                            'roi' => '25%',
                            'min' => '200000',
                            'max' => '499000',
                            'delay' => '0.3s',
                            'border' => false
                        ],
                        [
                            'title' => 'PLATINUM PLAN',
                            'roi' => '30%',
                            'min' => '500000',
                            'max' => '1000000',
                            'delay' => '0.4s',
                            'border' => true
                        ]
                    
                   /*  [
                        'title' => 'ROOKIE PLAN',
                        'roi' => '12%',
                        'min' => '1000',
                        'max' => '10000',
                        'delay' => '0.1s',
                        'border' => false
                    ],
                    [
                        'title' => 'PRO PLAN',
                        'roi' => '15%',
                        'min' => '10000',
                        'max' => '90000',
                        'delay' => '0.2s',
                        'border' => false
                    ],
                    [
                        'title' => 'MASTER PLAN',
                        'roi' => '25%',
                        'min' => '100000',
                        'max' => '500000',
                        'delay' => '0.3s',
                        'border' => false
                    ],
                    [
                        'title' => 'CUSTOM PLAN',
                        'roi' => 'Custom',          // Keeps the "Return" line format consistent
                        'min' => 'Any Amount',
                        'max' => 'Tailored',
                        'delay' => '0.4s',
                        'border' => true
                    ] */
                ] as $plan)
                    <div class="wow fadeInUp" data-wow-delay="{{ $plan['delay'] }}">
                        <div class="pricing-card 
                            {{ $plan['border'] ? 'border-4 border-red-600/80 hover:border-red-500' : '' }} 
                            bg-white rounded-2xl overflow-hidden shadow-xl 
                            hover:shadow-2xl hover:shadow-red-600/30 transition-all duration-500 
                            transform hover:-translate-y-6 group relative">
                            
                            <!-- Header -->
                            <div class="pricing-header bg-gradient-to-br from-red-600 to-red-800 py-12 text-center relative overflow-hidden">
                                <i class="fa fa-diamond text-6xl text-white opacity-80 absolute top-4 left-4 animate-pulse"></i>
                                <div class="price-value text-5xl sm:text-6xl font-extrabold text-white drop-shadow-lg">
                                    {{ $plan['roi'] }} <span class="text-xl sm:text-2xl font-normal opacity-90">ROI</span>
                                </div>
                            </div>

                            <!-- Body -->
                            <div class="p-8 lg:p-10">
                                <h3 class="text-3xl font-bold text-center text-red-600 mb-10 group-hover:text-red-500 transition-colors">
                                    {{ $plan['title'] }}
                                </h3>

                                <ul class="space-y-6 text-center text-gray-700">
                                    <li class="text-xl">
                                        Return: <span class="font-bold text-red-600">{{ $plan['roi'] }}</span>
                                    </li>
                                    <li class="text-xl">
                                        Minimum: <span class="font-bold text-red-600">{{ $plan['min'] }}</span>
                                    </li>
                                    <li class="text-xl">
                                        Maximum: <span class="font-bold text-red-600">{{ $plan['max'] }}</span>
                                    </li>
                                    <li class="text-xl">
                                        Capital Return: <span class="font-bold text-green-600">Yes</span>
                                    </li>
                                </ul>

                                <!-- Same button text for all -->
                                <div class="mt-12 text-center">
                                    <a href="{{ route('register') }}" 
                                    class="inline-block bg-red-600 text-white px-10 py-4 rounded-xl font-bold text-lg 
                                            hover:bg-red-700 transition-all duration-300 shadow-lg hover:shadow-xl 
                                            transform hover:-translate-y-1 group-hover:scale-[1.05]">
                                        Invest Now
                                    </a>
                                </div>
                            </div>

                            <!-- Shine effect -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/10 to-transparent 
                                        opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Why Choose Us Section -->
    <section class="team-part bg-gradient-to-b from-white to-red-50 py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-5xl font-bold text-gray-900">
                    WHY <span class="text-red-600">CHOOSE US</span>
                </h3>
                <p class="mt-6 text-xl text-gray-600 max-w-4xl mx-auto">
                    With our <span class="text-red-600">client-first</span> based approach, we put your needs first and, through careful investing and planning, we will help you secure your financial future.
                </p>
            </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                @foreach([
                    ['icon' => 'chart-bar', 'title' => 'Constant Weekly Profits', 'desc' => 'We pay out profits weekly and monthly for all our investor regardless of the capital size invested...'],
                    ['icon' => 'briefcase', 'title' => 'Professionalism, Quality & Experience', 'desc' => 'Our team consists of professionals attentive to the investor\'s needs...'],
                    ['icon' => 'shield-check', 'title' => 'Secure Investment', 'desc' => 'We can guarantee your deposits & investments are always safe with us...']
                ] as $item)
                    <div class="bg-white rounded-2xl p-10 shadow-xl hover:shadow-2xl transition duration-300 animate-fade-in-up text-center group">

                        <x-dynamic-component 
                            :component="'heroicon-o-' . $item['icon']"
                            class="mx-auto mb-8 h-16 w-16 text-red-600 transition-transform duration-500 group-hover:scale-110"
                        />

                        <h4 class="text-2xl font-bold text-red-600 mb-6">
                            {{ $item['title'] }}
                        </h4>

                        <p class="text-gray-700 leading-relaxed">
                            {{ $item['desc'] }}
                        </p>

                    </div>
                @endforeach
            </div>


            <!-- Second row of Why Choose Us items -->
           <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mt-20">
                @foreach([
                    ['icon' => 'document-check', 'title' => 'Legally Licensed Firm', 'desc' => 'We are legally licensed in the United States of America...'],
                    [
                        'icon' => 'chat-bubble-bottom-center-text',
                        'title' => '24/7 Customer Support',
                        'desc' => 'Our support services are always available to respond to any complaint/inquiries...',
                    ],

                    ['icon' => 'bolt', 'title' => 'Instant Withdrawals', 'desc' => 'All withdrawal request are processed instantly once the request has been made...']
                ] as $item)
                    <div class="bg-white rounded-2xl p-10 shadow-xl hover:shadow-2xl transition duration-300 animate-fade-in-up text-center group">

                        <x-dynamic-component 
                            :component="'heroicon-o-' . $item['icon']"
                            class="mx-auto mb-8 h-16 w-16 text-red-600 transition-transform duration-500 group-hover:scale-110"
                        />

                        <h4 class="text-2xl font-bold text-red-600 mb-6">
                            {{ $item['title'] }}
                        </h4>

                        <p class="text-gray-700 leading-relaxed">
                            {{ $item['desc'] }}
                        </p>

                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- Token Sale / Features Section -->
    <section id="tokensale-part" class="token-sale bg-gradient-to-br from-red-900 to-black py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1 animate-fade-in-right text-center lg:text-left">
                    <h3 class="text-4xl sm:text-5xl font-bold text-white mb-10">
                        Your money + <span class="text-red-400">our plans</span> = 
                        <span class="text-red-400">profits for everyone</span>
                    </h3>
                    <ul class="space-y-8 text-lg text-gray-200">
                        <li class="flex items-start">
                            <span class="text-red-400 text-2xl mr-4">✔</span>
                            <p>CRYPTO PAYMENTS - We accept multiple cryptocurrency payment method for deposits and withdrawals.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-red-400 text-2xl mr-4">✔</span>
                            <p>LAYERED INVESTING - We have abstracted all investment processes from our platform, removing all complexities involved.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-red-400 text-2xl mr-4">✔</span>
                            <p>ENHANCED TOOLS - Monitor all your account and investments activities on a single dashboard with a great user experience.</p>
                        </li>
                    </ul>
                </div>
                <div class="order-1 lg:order-2 animate-fade-in-left">
                    <img src="{{ url('assets/images/feature-7.png') }}" 
                         alt="Features" 
                         class="max-w-lg w-full mx-auto drop-shadow-2xl hover:scale-105 transition duration-700">
                </div>
            </div>
        </div>
    </section>

    <!-- Device Compatibility Section -->
    <section class="ico-apps bg-gradient-to-b from-red-50 to-white py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h5 class="text-3xl sm:text-4xl font-bold text-gray-900">
                    Invest <span class="text-red-600">anywhere</span>, <span class="text-red-600">anytime</span>,
                    <span class="text-red-600">any day</span> using any of your various devices
                </h5>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-10 md:gap-12 text-center">
                @foreach([
                    ['svg' => 'mobile-phone.svg', 'label' => 'iOS Devices'],
                    ['svg' => 'mobile-phone.svg', 'label' => 'Android Devices'],  // same for now – or make a different one later
                    ['svg' => 'tablet.svg',       'label' => 'Windows Devices'],
                    ['svg' => 'globe-alt.svg',    'label' => 'Web Browsers'],
                ] as $item)
                    <div class="group animate-fade-in-up">
                        <img src="{{ url('assets/images/svg/' . $item['svg']) }}" 
                            alt="{{ $item['label'] }}" 
                            class="mx-auto mb-6 h-20 w-20 text-red-600 transition-transform duration-500 group-hover:scale-125 group-hover:rotate-6 group-hover:drop-shadow-[0_0_15px_rgba(239,68,68,0.6)]" />
                        <h5 class="text-xl font-semibold text-gray-800">
                            {{ $item['label'] }}
                        </h5>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('xtraJs')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const backdrop = document.querySelector('.liquid-backdrop');
    if (!backdrop) return;

    const updateLiquid = () => {
        const scrollPercent = Math.min(window.scrollY / (window.innerHeight * 1.5), 1.8);
        
        // Slower → faster shake
        backdrop.style.animationDuration = `${32 - scrollPercent * 24}s`;
        
        // More violent blur & contrast
        backdrop.style.filter = `blur(${3 + scrollPercent * 5}px) contrast(${1.08 + scrollPercent * 0.4})`;
        
        // Make top even whiter when scrolled
        backdrop.style.opacity = 0.88 - scrollPercent * 0.25;
    };

    window.addEventListener('scroll', updateLiquid);
    updateLiquid(); // initial call
});
</script>
<script>
    window.addEventListener('scroll', () => {
        document.querySelector('#banner img').parentElement.dataset.scrollPassed = window.scrollY > 100;
    });
</script>
@endsection