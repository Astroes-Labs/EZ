<div class="min-h-screen bg-[#0a0f1c] text-gray-100 font-sans">

    <!-- Page Hero / Banner -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden pt-20" id="banner">
        <div class="absolute inset-0 bg-[#0a0f1c]">
            <img src="{{ url('assets/images/banner-img.png') }}" 
                 alt="About Banner"
                 class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0f1c]/90 via-[#222f53]/80 to-[#0a0f1c]"></div>
        </div>

        <div class="max-w-screen-2xl mx-auto px-6 relative z-20 text-center">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black tracking-tighter leading-none">
                ABOUT <span class="text-[#eac46e]">US</span>
            </h1>
            <p class="mt-6 text-xl text-gray-400 max-w-md mx-auto">
                Discover the story behind {{ config('app.name') }}
            </p>
        </div>
    </section>

    <!-- About Main Section 1 -->
    <section class="py-20 lg:py-28 bg-[#111827]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                
                <!-- Left Image -->
                <div class="text-center lg:text-left">
                    <div class="relative inline-block">
                        <img src="{{ url('assets/images/work-process.png') }}" 
                             alt="Work Process" 
                             class="w-80 lg:w-96 mx-auto lg:mx-0 rounded-3xl drop-shadow-2xl transition-transform duration-700 hover:scale-105">
                    </div>
                </div>

                <!-- Right Text -->
                <div class="space-y-8">
                    <livewire:shared.section-heading title="ABOUT <span class='text-[#eac46e]'>{{ config('app.name') }}</span>" />

                    <p class="text-lg text-gray-300 leading-relaxed">
                        {{ config('app.name') }} is an algorithmic trading &amp; online investment company 
                        established, licensed and headquartered in the United States. 
                        Our goal is to increase our investors' capital with consistent profits at low risk. 
                        Since inception, {{ config('app.name') }} has always achieved strong annual performances, 
                        helping investors achieve the financial stability they desire.
                    </p>
                    <a href="{{ route('register') }}" wire:navigate
                       class="inline-block px-8 py-4 bg-[#eac46e] text-[#111827] font-bold rounded-2xl hover:bg-amber-300 transition-all">
                        JOIN NOW
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Revolutionizing Section -->
    <section class="py-20 lg:py-28 bg-gradient-to-br from-[#0a0f1c] to-[#111827]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                
                <!-- Left Text -->
                <div class="space-y-8 order-2 lg:order-1">
                        <livewire:shared.section-heading title="We’re <span class='text-[#eac46e]'>Revolutionizing</span> the World of Crypto Investments" />
                    <p class="text-lg text-gray-300 leading-relaxed">
                        At {{ config('app.name') }}, we don't just pride ourselves as an investment company, but as a
                        provider of an exclusive financial service to empower investors to earn without being engaged with 
                        day-to-day investments process. 
                        We have developed a proprietary investment software by our experts and professionals 
                        to significantly reduce financial risks while increasing efficiency. 
                        Our business model allows investors to receive high interest rates on a weekly or monthly basis, 
                        regardless of market conditions.
                    </p>
                </div>

                <!-- Right Image -->
                <div class="text-center order-1 lg:order-2">
                    <img src="{{ url('assets/images/mission.png') }}" 
                         alt="Revolutionizing Crypto" 
                         class="w-80 max-w-lg mx-auto rounded-3xl drop-shadow-2xl transition-transform duration-700 hover:scale-105">
                </div>
            </div>
        </div>
    </section>

    <!-- 100% Stats -->
    <section class="py-20 bg-[#111827]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-10 text-center">
                @foreach([
                    ['icon' => 'eye', 'number' => '100%', 'label' => 'Transparency'],
                    ['icon' => 'lock-closed', 'number' => '100%', 'label' => 'Secured Platform'],
                    ['icon' => 'shield-check', 'number' => '100%', 'label' => 'Business Trust']
                ] as $stat)
                <div class="bg-[#1a2238] border border-[#222f53] hover:border-[#eac46e]/40 rounded-3xl p-10 group transition-all hover:-translate-y-1">
                    <x-dynamic-component 
                        :component="'heroicon-o-' . $stat['icon']" 
                        class="mx-auto mb-6 h-16 w-16 text-[#eac46e] group-hover:scale-110 transition" />
                    <h4 class="text-5xl font-black text-white mb-3">{{ $stat['number'] }}</h4>
                    <p class="text-lg text-gray-400">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- All-in-one Platform -->
    {{-- <section class="py-20 lg:py-28 bg-[#0a0f1c]"> --}}
    <section class="py-20 lg:py-28 bg-[#262d42]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                
                <!-- Left Image -->
                <div class="text-center order-2 lg:order-1">
                    <img src="{{ url('assets/images/about-2xx.jpg') }}" 
                         alt="Platform" 
                         class="w-full max-w-lg mx-auto rounded-3xl drop-shadow-2xl transition-transform duration-700 hover:scale-105">
                </div>

                <!-- Right Text -->
                <div class="space-y-8 order-1 lg:order-2">
                    <h2 class="text-5xl font-bold tracking-tight">
                        OUR <span class="text-[#eac46e]">PLATFORM</span>
                    </h2>
                    <h3 class="text-3xl font-semibold text-white">
                        All-in-one investment platform
                    </h3>
                    <p class="text-lg text-gray-300 leading-relaxed">
                        The {{ config('app.name') }} platform embodies the idea of a space where complex financial
                        technologies operate under the simple and easy control of each user. 
                        All you need is a few taps on your smartphone, and automatic trading systems start 
                        rapidly increasing your invested assets right before your eyes.
                    </p>
                    <a href="{{ route('register') }}" wire:navigate
                       class="inline-block px-8 py-4 bg-[#eac46e] text-[#111827] font-bold rounded-2xl hover:bg-amber-300 transition-all">
                        Join Platform
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-20 lg:py-28 bg-[#111827]">
        <div class="max-w-screen-2xl mx-auto px-6">
           <livewire:shared.section-heading title="100% Commitment" />

            <div class="grid md:grid-cols-3 gap-8 mb-20">
                @foreach([
                    ['icon' => 'chart-bar', 'title' => 'Constant Weekly Profits', 'desc' => 'We pay out profits weekly and monthly for all our investors regardless of the capital size invested...'],
                    ['icon' => 'briefcase', 'title' => 'Professionalism, Quality & Experience', 'desc' => 'Our team consists of professionals attentive to the investor\'s needs...'],
                    ['icon' => 'shield-check', 'title' => 'Secure Investment', 'desc' => 'We can guarantee your deposits & investments are always safe with us...']
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
                    ['icon' => 'document-check', 'title' => 'Legally Licensed Firm', 'desc' => 'We are legally licensed in the United States of America...'],
                    ['icon' => 'chat-bubble-bottom-center-text', 'title' => '24/7 Customer Support', 'desc' => 'Our support services are always available to respond to any complaint/inquiries...'],
                    ['icon' => 'bolt', 'title' => 'Instant Withdrawals', 'desc' => 'All withdrawal requests are processed instantly once the request has been made...']
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

</div>