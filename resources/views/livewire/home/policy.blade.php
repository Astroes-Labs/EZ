<div class="min-h-screen bg-[#07070a] text-gray-100 font-sans">

    <!-- Page Hero / Banner -->
    <section class="relative min-h-[50vh] flex items-center justify-center bg-[#07070a] overflow-hidden pt-20" id="banner">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/40 pointer-events-none"></div>
        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>

        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-20 lg:py-32">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tighter uppercase font-mono mb-4">
                OUR <span class="text-[#8b5cf6]">POLICY</span>
            </h1>
            <p class="text-sm text-gray-400 font-light max-w-2xl mx-auto uppercase tracking-wide">
                Clear guidelines that govern our relationship with investors at {{ config('app.name') }}
            </p>
        </div>
    </section>

    <!-- Main Policy Content -->
    <section class="py-20 lg:py-28 bg-[#07070a]">
        <div class="max-w-4xl mx-auto px-6 space-y-12">

            <!-- Introduction -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">Introduction</h3>
                <p class="text-sm font-light text-gray-300 leading-relaxed">
                    This Policy document outlines the rules, guidelines, and expectations for all users and investors 
                    of {{ config('app.name') }}. By accessing or using our platform, you agree to comply with this policy 
                    in its entirety. Please read it carefully.
                </p>
            </div>

            <!-- Investment Policy -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">Investment Policy</h3>
                <ul class="space-y-4 text-sm font-light text-gray-300">
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">All investments are subject to the chosen investment plan’s terms, including minimum and maximum amounts, ROI percentages, and duration.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">{{ config('app.name') }} does not guarantee profits. Past performance is not indicative of future results.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Investors are responsible for understanding the risks associated with cryptocurrency investments.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Capital return is guaranteed upon successful completion of the investment cycle as per the selected plan.</p>
                    </li>
                </ul>
            </div>

            <!-- Referral Policy -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">Referral Policy</h3>
                <ul class="space-y-4 text-sm font-light text-gray-300">
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">{{ config('app.name') }} offers a referral program allowing investors to earn up to 5% bonus on referred deposits.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Referral bonuses are credited automatically upon successful deposit by the referred user.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Abuse of the referral system (including fake accounts or self-referral) may result in account suspension and forfeiture of bonuses.</p>
                    </li>
                </ul>
            </div>

            <!-- Withdrawal Policy -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">Withdrawal Policy</h3>
                <ul class="space-y-4 text-sm font-light text-gray-300">
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Withdrawal requests are processed instantly once approved, subject to verification and available balance.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Minimum withdrawal amount is $200. Requests below this threshold will not be processed.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">All withdrawals are made in Bitcoin or supported cryptocurrency to the wallet address provided by the investor.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">{{ config('app.name') }} reserves the right to request additional verification before processing large withdrawals.</p>
                    </li>
                </ul>
            </div>

            <!-- Commission & Fees Policy -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">Commission & Fees Policy</h3>
                <ul class="space-y-4 text-sm font-light text-gray-300">
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">A 20% commission fee is applied to profits generated through our services. This fee covers account management and profit maximization.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">The commission fee must be paid separately by the investor and will not be deducted automatically from your account balance or profits.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Failure to settle commission fees may result in temporary suspension of withdrawal privileges.</p>
                    </li>
                </ul>
            </div>

            <!-- General Policy -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">General Policy</h3>
                <ul class="space-y-4 text-sm font-light text-gray-300">
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">{{ config('app.name') }} reserves the right to modify any policy at any time. Changes will be communicated via the website.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Continued use of the platform after policy updates constitutes acceptance of the new terms.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Any violation of these policies may result in account suspension or termination without prior notice.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">{{ config('app.name') }} is not responsible for any losses incurred due to market volatility or individual investment decisions.</p>
                    </li>
                </ul>
            </div>

        </div>
    </section>

</div>