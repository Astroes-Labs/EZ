<div class="min-h-screen bg-[#0a0f1c] text-gray-100 font-sans">

    <!-- Page Hero / Banner -->
    <livewire:shared.hero-banner 
        title="INVESTMENT <span class='text-[#eac46e]'>PLANS</span>" 
    />

    <!-- Pricing Plans Section -->
    <section id="plans" class="py-20 lg:py-28 bg-[#111827]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <!-- Section Heading -->
            <livewire:shared.section-heading 
                title="Available <span class='text-[#eac46e]'>Investment Plans</span>" 
                subtitle="Evaluate from a range of investment plans tailored to suit any capital size..." 
            />

            <!-- Pricing Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">
                @foreach([
                    [
                        'title' => 'BASIC PLAN',
                        'roi' => '12%',
                        'min' => '1000',
                        'max' => '49900',
                        'border' => false
                    ],
                    [
                        'title' => 'GOLD PLAN',
                        'roi' => '15%',
                        'min' => '50000',
                        'max' => '199000',
                        'border' => false
                    ],
                    [
                        'title' => 'DIAMOND PLAN',
                        'roi' => '25%',
                        'min' => '200000',
                        'max' => '499000',
                        'border' => false
                    ],
                    [
                        'title' => 'PLATINUM PLAN',
                        'roi' => '30%',
                        'min' => '500000',
                        'max' => '1000000',
                        'border' => true
                    ]
                ] as $plan)
                <div class="relative {{ $plan['border'] ? 'scale-105 z-10' : '' }}">
                    <div class="pricing-card bg-[#1a2238] border {{ $plan['border'] ? 'border-[#eac46e]' : 'border-[#222f53]' }} 
                                rounded-3xl overflow-hidden hover:border-[#eac46e] transition-all duration-500 h-full group">
                        
                        <!-- Featured Badge -->
                        @if($plan['border'])
                            <div class="bg-[#eac46e] text-[#111827] text-xs font-bold tracking-widest py-1.5 text-center">
                                MOST POPULAR
                            </div>
                        @endif

                        <!-- Header -->
                        <div class="pricing-header bg-gradient-to-br from-[#222f53] to-[#1a2238] py-12 text-center relative overflow-hidden">
                            <i class="fa fa-diamond text-6xl text-[#eac46e] opacity-80 absolute top-6 left-6"></i>
                            <div class="price-value text-6xl font-black text-white drop-shadow-lg">
                                {{ $plan['roi'] }}
                                <span class="text-xl font-normal opacity-80">ROI</span>
                            </div>
                            <div class="text-sm text-gray-400 mt-1">Weekly Return</div>
                        </div>

                        <!-- Body -->
                        <div class="p-8 lg:p-10">
                            <h3 class="text-3xl font-bold text-center text-white mb-10 group-hover:text-[#eac46e] transition-colors">
                                {{ $plan['title'] }}
                            </h3>

                            <ul class="space-y-6 text-center text-gray-300">
                                <li class="text-lg flex justify-between">
                                    <span>Return</span> 
                                    <span class="font-semibold text-[#eac46e]">{{ $plan['roi'] }}</span>
                                </li>
                                <li class="text-lg flex justify-between">
                                    <span>Minimum</span> 
                                    <span class="font-semibold">${{ number_format($plan['min']) }}</span>
                                </li>
                                <li class="text-lg flex justify-between">
                                    <span>Maximum</span> 
                                    <span class="font-semibold">${{ number_format($plan['max']) }}</span>
                                </li>
                                <li class="text-lg flex justify-between">
                                    <span>Capital Return</span> 
                                    <span class="font-semibold text-emerald-400">Yes</span>
                                </li>
                            </ul>

                            <div class="mt-12 text-center">
                                <a href="{{ route('register') }}" wire:navigate
                                   class="inline-block w-full py-4 bg-[#222f53] hover:bg-[#2a3a6b] border border-[#eac46e]/70 
                                          rounded-2xl font-semibold text-white transition-all hover:border-[#eac46e]">
                                    Invest Now
                                </a>
                            </div>
                        </div>

                        <!-- Shine Effect -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/10 to-transparent 
                                    opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>