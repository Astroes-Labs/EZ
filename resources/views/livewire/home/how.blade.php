<div class="min-h-screen bg-[#0a0f1c] text-gray-100 font-sans">

    <!-- Page Hero / Banner -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden pt-20" id="banner">
        <div class="absolute inset-0 bg-[#0a0f1c]">
            <img src="{{ url('assets/images/banner-img.png') }}" 
                 alt="How It Works Banner"
                 class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0f1c]/90 via-[#222f53]/80 to-[#0a0f1c]"></div>
        </div>

        <div class="max-w-screen-2xl mx-auto px-6 relative z-20 text-center">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black tracking-tighter leading-none">
                FINANCIAL <span class="text-[#eac46e]">MARKETS</span>
            </h1>
            <p class="mt-6 text-xl text-gray-400 max-w-lg mx-auto">
                Key concepts to help you navigate the world of cryptocurrency investments with {{ config('app.name') }}
            </p>
        </div>
    </section>

    <!-- Key Concepts Section -->
    <section class="py-20 lg:py-28 bg-[#111827]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <!-- Section Heading -->
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight">
                    Key Concepts in <span class="text-[#eac46e]">Financial Markets</span>
                </h2>
                <p class="mt-6 text-xl text-gray-400 max-w-4xl mx-auto leading-relaxed">
                    Explore fundamental concepts and approaches to navigating the diverse world of financial markets.
                </p>
            </div>

            <!-- Concept Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-10">
                @foreach([
                    [
                        'title' => 'Fundamental Analysis',
                        'points' => [
                            'Focus: Analyzing the financial health and prospects of companies or economies.',
                            'Suitable for: Long-term investors seeking value and growth.',
                            'Considerations: Requires in-depth research and analysis of financial statements.',
                            'Advantages: Can identify undervalued assets with strong long-term potential.'
                        ]
                    ],
                    [
                        'title' => 'Technical Analysis',
                        'points' => [
                            'Focus: Identifying trading opportunities based on price charts and market trends.',
                            'Suitable for: Traders seeking short-term profits and market timing.',
                            'Considerations: Relies on historical price data, which may not always predict future movements.',
                            'Advantages: Can identify entry and exit points for trades.'
                        ]
                    ],
                    [
                        'title' => 'Risk Management',
                        'points' => [
                            'Focus: Protecting capital and minimizing potential losses.',
                            'Suitable for: All investors, regardless of their investment style.',
                            'Considerations: Essential for long-term success in any market.',
                            'Advantages: Helps to preserve capital and emotional stability.'
                        ]
                    ]
                ] as $concept)
                <div class="bg-[#1a2238] border border-[#222f53] hover:border-[#eac46e]/40 rounded-3xl overflow-hidden transition-all duration-500 hover:-translate-y-2 group">
                    <div class="p-8 lg:p-10">
                        <!-- Title -->
                        <h3 class="text-3xl font-bold text-center mb-8 text-white group-hover:text-[#eac46e] transition-colors">
                            {{ $concept['title'] }}
                        </h3>

                        <!-- Bullet Points -->
                        <ul class="space-y-6 text-gray-300">
                            @foreach($concept['points'] as $point)
                                <li class="flex items-start text-base lg:text-lg">
                                    <span class="text-[#eac46e] text-2xl mr-4 mt-1 leading-none">•</span>
                                    <span>{{ $point }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Learn More -->
                        {{-- <div class="mt-10 text-center">
                            <a href="#" 
                               class="inline-block px-8 py-4 bg-[#222f53] hover:bg-[#2a3a6b] border border-[#eac46e]/70 rounded-2xl font-semibold transition-all">
                                Learn More
                            </a>
                        </div> --}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>