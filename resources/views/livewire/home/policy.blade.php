<div class="min-h-screen bg-[#0a0f1c] text-gray-100 font-sans">

    <!-- Page Hero / Banner -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden pt-20" id="banner">
        <div class="absolute inset-0 bg-[#0a0f1c]">
            <img src="{{ url('assets/images/banner-img.png') }}" 
                 alt="Policy Banner"
                 class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0f1c]/90 via-[#222f53]/80 to-[#0a0f1c]"></div>
        </div>

        <div class="max-w-screen-2xl mx-auto px-6 relative z-20 text-center">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black tracking-tighter leading-none">
                OUR <span class="text-[#eac46e]">POLICY</span>
            </h1>
            <p class="mt-6 text-xl text-gray-400 max-w-lg mx-auto">
                Clear guidelines that govern our relationship with investors at {{ config('app.name') }}
            </p>
        </div>
    </section>

    <!-- Main Policy Content -->
    <section class="py-20 lg:py-28 bg-[#111827]">
        <div class="max-w-4xl mx-auto px-6">
            <div class="space-y-12">

                <!-- Introduction -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Introduction</h5>
                    <p class="text-lg text-gray-300 leading-relaxed">
                        This Policy document outlines the rules, guidelines, and expectations for all users and investors 
                        of {{ config('app.name') }}. By accessing or using our platform, you agree to comply with this policy 
                        in its entirety. Please read it carefully.
                    </p>
                </div>

                <!-- Investment Policy -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Investment Policy</h5>
                    <ul class="space-y-6 text-gray-300 text-lg">
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>All investments are subject to the chosen investment plan’s terms, including minimum and maximum amounts, ROI percentages, and duration.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>{{ config('app.name') }} does not guarantee profits. Past performance is not indicative of future results.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>Investors are responsible for understanding the risks associated with cryptocurrency investments.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>Capital return is guaranteed upon successful completion of the investment cycle as per the selected plan.</p>
                        </li>
                    </ul>
                </div>

                <!-- Referral Policy -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Referral Policy</h5>
                    <ul class="space-y-6 text-gray-300 text-lg">
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>{{ config('app.name') }} offers a referral program allowing investors to earn up to 5% bonus on referred deposits.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>Referral bonuses are credited automatically upon successful deposit by the referred user.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>Abuse of the referral system (including fake accounts or self-referral) may result in account suspension and forfeiture of bonuses.</p>
                        </li>
                    </ul>
                </div>

                <!-- Withdrawal Policy -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Withdrawal Policy</h5>
                    <ul class="space-y-6 text-gray-300 text-lg">
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>Withdrawal requests are processed instantly once approved, subject to verification and available balance.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>Minimum withdrawal amount is $200. Requests below this threshold will not be processed.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>All withdrawals are made in Bitcoin or supported cryptocurrency to the wallet address provided by the investor.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>{{ config('app.name') }} reserves the right to request additional verification before processing large withdrawals.</p>
                        </li>
                    </ul>
                </div>

                <!-- Commission & Fees Policy -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Commission & Fees Policy</h5>
                    <ul class="space-y-6 text-gray-300 text-lg">
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>A 20% commission fee is applied to profits generated through our services. This fee covers account management and profit maximization.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>The commission fee must be paid separately by the investor and will not be deducted automatically from your account balance or profits.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>Failure to settle commission fees may result in temporary suspension of withdrawal privileges.</p>
                        </li>
                    </ul>
                </div>

                <!-- General Policy -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">General Policy</h5>
                    <ul class="space-y-6 text-gray-300 text-lg">
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>{{ config('app.name') }} reserves the right to modify any policy at any time. Changes will be communicated via the website.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>Continued use of the platform after policy updates constitutes acceptance of the new terms.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>Any violation of these policies may result in account suspension or termination without prior notice.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>{{ config('app.name') }} is not responsible for any losses incurred due to market volatility or individual investment decisions.</p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

</div>