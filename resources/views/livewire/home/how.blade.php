<div class="min-h-screen bg-[#07070a] text-gray-100 font-sans">

    <!-- Page Hero / Banner -->
    <section class="relative min-h-[50vh] flex items-center justify-center bg-[#07070a] overflow-hidden pt-20" id="banner">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/40 pointer-events-none"></div>
        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>

        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-20 lg:py-32">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tighter uppercase font-mono">
                FINANCIAL <span class="text-[#8b5cf6]">MARKETS</span>
            </h1>
        </div>
    </section>

    <!-- Key Concepts Section -->
    <section class="py-20 lg:py-28 bg-[#07070a]">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">
            <!-- Section Heading -->
            <div class="text-center mb-16">
                <p class="text-xs font-mono uppercase tracking-widest text-[#8b5cf6] mb-2">Knowledge Base</p>
                <h2 class="text-3xl lg:text-4xl font-black text-white tracking-tight uppercase">
                    Key Concepts in <span class="text-[#8b5cf6]">Financial Markets</span>
                </h2>
                <p class="text-sm text-gray-400 font-light mt-4 max-w-2xl mx-auto">
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
                <div class="bg-[#111116] border border-white/10 hover:border-[#8b5cf6]/60 rounded-none overflow-hidden transition-all duration-300 shadow-[0_20px_50px_rgba(0,0,0,0.8)] relative group">
                    <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                    <div class="p-8 lg:p-10 flex flex-col justify-between h-full">
                        <div>
                            <!-- Title -->
                            <h3 class="text-base font-mono font-bold text-center mb-8 text-white group-hover:text-[#8b5cf6] transition-colors uppercase tracking-widest">
                                {{ $concept['title'] }}
                            </h3>

                            <!-- Bullet Points -->
                            <ul class="space-y-4 text-sm font-light text-gray-300">
                                @foreach($concept['points'] as $point)
                                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                                        <span class="leading-relaxed">{{ $point }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>