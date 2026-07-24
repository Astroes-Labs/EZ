@extends('layouts.home.layout')

@section('title', 'How It Works | ' . config('app.name'))

@section('content')

    <!-- Page Banner / Hero -->
    <section class="relative min-h-[50vh] flex items-center justify-center bg-gradient-to-br from-red-900 via-black to-gray-950 overflow-hidden" id="banner">
        <!-- Subtle red overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/40 pointer-events-none"></div>
        
        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-20 lg:py-32">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight drop-shadow-2xl animate-fade-in">
                FINANCIAL <span class="text-red-500">MARKETS</span>
            </h1>
        </div>
    </section>

    <!-- Key Concepts Section -->
    <section class="py-20 lg:py-32 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Heading -->
            <div class="text-center mb-16 animate-fade-in">
                <h3 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 tracking-tight">
                    Key Concepts in <span class="text-red-600">Financial Markets</span>
                </h3>
                <p class="mt-6 text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Explore fundamental concepts and approaches to navigating the diverse world of financial markets.
                </p>
            </div>

            <!-- Three Concept Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                @foreach([
                    [
                        'title' => 'Fundamental Analysis',
                        'points' => [
                            'Focus: Analyzing the financial health and prospects of companies or economies.',
                            'Suitable for: Long-term investors seeking value and growth.',
                            'Considerations: Requires in-depth research and analysis of financial statements.',
                            'Advantages: Can identify undervalued assets with strong long-term potential.'
                        ],
                        'delay' => '0.1s'
                    ],
                    [
                        'title' => 'Technical Analysis',
                        'points' => [
                            'Focus: Identifying trading opportunities based on price charts and market trends.',
                            'Suitable for: Traders seeking short-term profits and market timing.',
                            'Considerations: Relies on historical price data, which may not always predict future movements.',
                            'Advantages: Can identify entry and exit points for trades.'
                        ],
                        'delay' => '0.2s'
                    ],
                    [
                        'title' => 'Risk Management',
                        'points' => [
                            'Focus: Protecting capital and minimizing potential losses.',
                            'Suitable for: All investors, regardless of their investment style.',
                            'Considerations: Essential for long-term success in any market.',
                            'Advantages: Helps to preserve capital and emotional stability.'
                        ],
                        'delay' => '0.3s'
                    ]
                ] as $concept)
                    <div class="wow fadeInUp" data-wow-delay="{{ $concept['delay'] }}">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl hover:shadow-red-600/30 transition-all duration-500 transform hover:-translate-y-6 group relative p-8 lg:p-10">
                            <!-- Title -->
                            <h3 class="text-3xl font-bold text-red-600 mb-8 group-hover:text-red-500 transition-colors text-center">
                                {{ $concept['title'] }}
                            </h3>

                            <!-- Bullet Points -->
                            <ul class="space-y-5 text-gray-700">
                                @foreach($concept['points'] as $point)
                                    <li class="flex items-start text-lg">
                                        <span class="text-red-600 text-2xl mr-4 mt-1">•</span>
                                        {{ $point }}
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Learn More Button -->
                            <div class="mt-10 text-center">
                                <a href="#" target="_blank" 
                                   class="inline-block bg-red-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-red-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                    Learn More
                                </a>
                            </div>

                            <!-- Subtle shine on hover -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('xtraJs')
    <script>
        // Optional: any extra JS if needed
    </script>
@endsection