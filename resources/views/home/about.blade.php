@extends('layouts.home.layout')

@section('title', 'About | ' . config('app.name'))

@section('content')

    <!-- Page Banner / Hero -->
    <section class="relative min-h-[50vh] flex items-center justify-center bg-gradient-to-br from-red-900 via-black to-gray-950 overflow-hidden" id="banner">
        <!-- Subtle red overlay for depth -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/40 pointer-events-none"></div>
        
        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-20 lg:py-32">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight drop-shadow-2xl animate-fade-in">
                ABOUT <span class="text-red-500">US</span>
            </h1>
        </div>
    </section>

    <!-- About Main Section 1 -->
    <section class="py-20 lg:py-32 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Left Image -->
                <div class="text-center lg:text-left animate-fade-in-left">
                    <div class="relative inline-block">
                        <img src="{{ url('assets/images/work-process.png') }}" 
                             alt="Work Process" 
                             class="rotation-img w-80 lg:w-96 mx-auto lg:mx-0 drop-shadow-2xl transition-transform duration-700 hover:scale-105">
                    </div>
                </div>

                <!-- Right Text -->
                <div class="space-y-8 animate-fade-in-right">
                    <h3 class="text-4xl lg:text-5xl font-bold text-red-600">
                        ABOUT <span class="text-gray-900">{{ config('app.name') }}</span>
                    </h3>
                    <p class="text-lg lg:text-xl text-gray-700 leading-relaxed">
                        {{ config('app.name') }} is an algorithmic trading & online investment company established,
                        licensed and headquartered in the United States.
                        Our goal is to increase its investor's capital with constant profits at low risk.
                        Since inception, {{ config('app.name') }} has always achieved annual performances exceeding 8%,
                        with a peak of 27.8% in 2020, and average annual performances of + 14.6%.
                        We help our investor achieve the desired financial stability they desire.
                    </p>
                    <a href="{{ route('register') }}" 
                       class="inline-block bg-red-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-red-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        JOIN NOW
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Main Section 2 (Revolutionizing) -->
    <section class="py-20 lg:py-32 bg-gradient-to-br from-gray-900 to-black">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Left Text -->
                <div class="space-y-8 order-2 lg:order-1 animate-fade-in-right">
                    <h3 class="text-4xl lg:text-5xl font-bold text-red-600">
                        We’re <span class="text-white">Revolutionizing</span> the World of 
                        <span class="text-white">Crypto Investments</span>
                    </h3>
                    <p class="text-lg lg:text-xl text-gray-300 leading-relaxed">
                        At {{ config('app.name') }}, we don't just pride ourselves as an investment company, but as a
                        provider of an exclusive financial service to empower investors to earn without being engaged with day-to-day
                        investments process, disengaging them from it totally.
                        We have developed a proprietary investment software by our experts and professionals
                        significantly to reduce financial risks, while increasing the efficiency of investments
                        sessions at the same time.
                        We have put in place a business model, which allows investors to receive high interest rates on
                        a weekly or monthly basis, regardless of changes in the financial market, which not every company can keep up with.
                    </p>
                </div>

                <!-- Right Image -->
                <div class="text-center order-1 lg:order-2 animate-fade-in-left">
                    <img src="{{ url('assets/images/mission.png') }}" 
                         alt="Revolutionizing Crypto" 
                         class="w-full max-w-lg mx-auto rounded-2xl shadow-2xl shadow-red-900/50 transition-transform duration-700 hover:scale-105">
                </div>
            </div>
        </div>
    </section>

   <!-- 100% Stats Section -->
    <section class="py-20 bg-gradient-to-b from-red-50 to-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                @foreach([
                    ['icon' => 'eye',            'number' => '100%', 'label' => 'Transparency'],
                    ['icon' => 'lock-closed',    'number' => '100%', 'label' => 'Secured Platform'],
                    ['icon' => 'shield-check',   'number' => '100%', 'label' => 'Business Trust']
                ] as $stat)
                    <div class="animate-fade-in-up group">
                        
                        <x-dynamic-component 
                            :component="'heroicon-o-' . $stat['icon']"
                            class="mx-auto mb-6 h-20 w-20 text-red-600 transition-transform duration-500 group-hover:scale-125 group-hover:drop-shadow-[0_0_20px_rgba(239,68,68,0.6)]"
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


    <!-- All-in-one Platform Section -->
    <section class="py-20 lg:py-32 bg-gradient-to-br from-gray-900 to-black">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Left Image -->
                <div class="text-center lg:text-left order-2 lg:order-1 animate-fade-in-left">
                    <img src="{{ url('assets/images/about-2xx.png') }}" 
                         alt="Platform" 
                         class="w-full max-w-lg mx-auto rounded-2xl shadow-2xl shadow-red-900/50 transition-transform duration-700 hover:scale-105">
                </div>

                <!-- Right Text -->
                <div class="space-y-8 order-1 lg:order-2 animate-fade-in-right">
                    <h2 class="text-5xl font-bold text-red-600">
                        OUR <span class="text-white">PLATFORM</span>
                    </h2>
                    <h3 class="text-3xl font-semibold text-white">
                        All-in-one investment platform
                    </h3>
                    <p class="text-lg lg:text-xl text-gray-300 leading-relaxed">
                        The {{ config('app.name') }} platform embodies the idea of a space where complex financial
                        technologies operate under the simple and easy control of each user.
                        All you need is a few taps on the screen of your smartphone, and automatic trading systems,
                        which were previously available only to professional traders,
                        start rapidly increasing the invested assets right before your eyes — not just rapidly, but at
                        staggering speed.
                    </p>
                    <a href="{{ route('register') }}" 
                       class="inline-block bg-red-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-red-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Join Platform
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="team-part py-20 lg:py-32 bg-gradient-to-b from-white to-red-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in">
                <h3 class="text-4xl sm:text-5xl font-bold text-gray-900">
                    WHY <span class="text-red-600">CHOOSE US</span>
                </h3>
                <p class="mt-6 text-xl text-gray-600 max-w-4xl mx-auto">
                    With our <span class="text-red-600">client-first</span> based approach, we put your needs first
                    and, through careful investing and planning, we will help you secure your financial future.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                @foreach([
                    ['icon' => 'chart-bar',     'title' => 'Constant Weekly Profits', 'desc' => 'We pay out profits weekly and monthly for all our investors regardless of the capital size invested...'],
                    ['icon' => 'briefcase',     'title' => 'Professionalism, Quality & Experience', 'desc' => 'Our team consists of professionals attentive to the investor\'s needs...'],
                    ['icon' => 'shield-check',  'title' => 'Secure Investment', 'desc' => 'We can guarantee your deposits & investments are always safe with us...']
                ] as $item)
                    <div class="bg-white rounded-2xl p-8 lg:p-10 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4 group animate-fade-in-up">
                        
                        <x-dynamic-component 
                            :component="'heroicon-o-' . $item['icon']"
                            class="mx-auto mb-8 h-20 w-20 text-red-600 transition-transform duration-500 group-hover:scale-125 group-hover:drop-shadow-[0_0_15px_rgba(239,68,68,0.6)]"
                        />

                        <h4 class="text-2xl font-bold text-red-600 mb-6 text-center">
                            {{ $item['title'] }}
                        </h4>

                        <p class="text-gray-700 leading-relaxed text-center">
                            {{ $item['desc'] }}
                        </p>

                    </div>
                @endforeach

            </div>

            <!-- Second row -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mt-20">
                @foreach([
                    ['icon' => 'document-check', 'title' => 'Legally Licensed Firm', 'desc' => 'We are legally licensed in the United States of America...'],
                    ['icon' => 'chat-bubble-bottom-center-text',    'title' => '24/7 Customer Support', 'desc' => 'Our support services are always available to respond to any complaint/inquiries...'],
                    ['icon' => 'arrow-down-circle', 'title' => 'Instant Withdrawals', 'desc' => 'All withdrawal requests are processed instantly once the request has been made...']
                ] as $item)
                    <div class="bg-white rounded-2xl p-8 lg:p-10 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4 group animate-fade-in-up">
                        <x-dynamic-component 
                            :component="'heroicon-o-' . $item['icon']"
                            class="mx-auto mb-8 h-20 w-20 text-red-600 transition-transform duration-500 group-hover:scale-125 group-hover:drop-shadow-[0_0_15px_rgba(239,68,68,0.6)]"
                        />
                        <h4 class="text-2xl font-bold text-red-600 mb-6 text-center">
                            {{ $item['title'] }}
                        </h4>
                        <p class="text-gray-700 leading-relaxed text-center">
                            {{ $item['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('xtraJs')
    <script>
        // Optional: add any extra JS if needed (e.g., smooth scroll, etc.)
    </script>
@endsection