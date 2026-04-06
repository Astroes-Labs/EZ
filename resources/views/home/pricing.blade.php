@extends('layouts.home.layout')

@section('title', 'Investments | ' . config('app.name'))

@section('content')

    <!-- Page Banner / Hero -->
    <section
        class="relative min-h-[50vh] flex items-center justify-center bg-gradient-to-br from-red-900 via-black to-gray-950 overflow-hidden"
        id="banner">
        <!-- Subtle red overlay for depth -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/40 pointer-events-none"></div>

        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-20 lg:py-32">
            <h1
                class="text-5xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight drop-shadow-2xl animate-fade-in">
                INVESTMENTS <span class="text-red-500">PLAN</span>
            </h1>
        </div>
    </section>

    <!-- Pricing Plans Section (matches home page style) -->
    <section
        class="timeline bg-gradient-to-b from-gray-50 to-white py-24 relative overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Heading (matches home page) -->
            <div class="text-center mb-16 animate-fade-in">
                <h3 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 tracking-tight">
                    Details about available <span class="text-red-600">investments plan</span>
                </h3>
                <p class="mt-6 text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Evaluate from a range of investments plan tailored to suit any capital size,
                    while providing the highest profit margins possible to everyone.
                </p>
            </div>

            <!-- Pricing Cards (matches home page style) --><!-- Pricing Cards Grid – now 4 cards, custom has red border -->
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

                                <!-- Button – same text for all -->
                                <div class="mt-12 text-center">
                                    <a href="{{ route('register') }}" 
                                    class="inline-block bg-red-600 text-white px-10 py-4 rounded-xl font-bold text-lg 
                                            hover:bg-red-700 transition-all duration-300 shadow-lg hover:shadow-xl 
                                            transform hover:-translate-y-1 group-hover:scale-[1.05]">
                                        Invest Now
                                    </a>
                                </div>
                            </div>

                            <!-- Shine effect on hover -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/10 to-transparent 
                                        opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('xtraJs')
    <script>
        // Optional: any extra JS if needed (e.g., smooth scroll)
    </script>
@endsection