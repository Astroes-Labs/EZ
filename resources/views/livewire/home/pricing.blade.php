<div class="min-h-screen bg-[#07070a] text-gray-100 font-sans">

    <!-- Page Hero / Banner -->
    <section class="relative min-h-[50vh] flex items-center justify-center bg-[#07070a] overflow-hidden pt-20" id="banner">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/40 pointer-events-none"></div>
        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>

        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-20 lg:py-32">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tighter uppercase font-mono">
                INVESTMENT <span class="text-[#8b5cf6]">PLANS</span>
            </h1>
        </div>
    </section>

    <!-- Pricing Plans Section -->
    <section id="plans" class="py-20 lg:py-28 bg-[#07070a]">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">
            <!-- Section Heading -->
            <div class="text-center mb-16">
                <p class="text-xs font-mono uppercase tracking-widest text-[#8b5cf6] mb-2">Available Plans</p>
                <h2 class="text-3xl lg:text-4xl font-black text-white tracking-tight uppercase">
                    Investment <span class="text-[#8b5cf6]">Plans</span>
                </h2>
                <p class="text-sm text-gray-400 font-light mt-4 max-w-2xl mx-auto">
                    Evaluate from a range of investment plans tailored to suit any capital size...
                </p>
            </div>

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
                    <div class="pricing-card bg-[#111116] border {{ $plan['border'] ? 'border-[#8b5cf6]' : 'border-white/10' }} 
                            rounded-none overflow-hidden hover:border-[#8b5cf6] transition-all duration-300 h-full group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>
                        
                        <!-- Featured Badge -->
                        @if($plan['border'])
                            <div class="bg-[#8b5cf6] text-white text-xs font-mono font-bold tracking-widest py-1.5 text-center uppercase">
                                MOST POPULAR
                            </div>
                        @endif

                        <!-- Header -->
                        <div class="pricing-header bg-[#111116] border-b border-white/5 py-10 text-center relative overflow-hidden">
                            <i class="fa fa-diamond text-4xl text-[#8b5cf6] opacity-30 absolute top-4 left-4"></i>
                            <div class="price-value text-5xl font-black text-white font-mono tracking-tight">
                                {{ $plan['roi'] }}
                                <span class="text-xs font-mono font-normal opacity-60">ROI</span>
                            </div>
                            <div class="text-xs font-mono uppercase tracking-widest text-gray-500 mt-2">Weekly Return</div>
                        </div>

                        <!-- Body -->
                        <div class="p-8 lg:p-10 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-mono font-bold text-center text-white mb-8 tracking-widest group-hover:text-[#8b5cf6] transition-colors uppercase">
                                    {{ $plan['title'] }}
                                </h3>

                                <ul class="space-y-4 text-sm font-light text-gray-300">
                                    <li class="flex justify-between border-b border-white/5 pb-3">
                                        <span class="text-gray-500 font-mono text-xs uppercase">Return</span> 
                                        <span class="font-bold text-[#8b5cf6] font-mono">{{ $plan['roi'] }}</span>
                                    </li>
                                    <li class="flex justify-between border-b border-white/5 pb-3">
                                        <span class="text-gray-500 font-mono text-xs uppercase">Minimum</span> 
                                        <span class="font-semibold font-mono">${{ number_format($plan['min']) }}</span>
                                    </li>
                                    <li class="flex justify-between border-b border-white/5 pb-3">
                                        <span class="text-gray-500 font-mono text-xs uppercase">Maximum</span> 
                                        <span class="font-semibold font-mono">${{ number_format($plan['max']) }}</span>
                                    </li>
                                    <li class="flex justify-between pb-3">
                                        <span class="text-gray-500 font-mono text-xs uppercase">Capital Return</span> 
                                        <span class="font-semibold text-emerald-400 font-mono">Yes</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-10 text-center">
                                <a href="{{ route('register') }}" wire:navigate
                                   class="inline-block w-full py-3.5 bg-[#8b5cf6] hover:bg-[#7c3aed] text-white text-xs font-mono font-bold uppercase tracking-widest transition-all shadow-[inset_0_1px_0_rgba(255,255,255,0.2)] border-b-2 border-black/40">
                                    Invest Now
                                </a>
                            </div>
                        </div>

                        <!-- Shine Effect -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-transparent 
                                    opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>