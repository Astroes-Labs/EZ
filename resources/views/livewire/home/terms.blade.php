<div class="min-h-screen bg-[#07070a] text-gray-100 font-sans">

    <!-- Page Hero / Banner -->
    <section class="relative min-h-[50vh] flex items-center justify-center bg-[#07070a] overflow-hidden pt-20" id="banner">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/40 pointer-events-none"></div>
        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>

        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-20 lg:py-32">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tighter uppercase font-mono">
                TERMS &amp; <span class="text-[#8b5cf6]">CONDITIONS</span>
            </h1>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 lg:py-28 bg-[#07070a]">
        <div class="max-w-4xl mx-auto px-6 space-y-12">

            <!-- Introduction -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">Introduction</h3>
                <p class="text-sm font-light text-gray-300 leading-relaxed">
                    These terms and conditions govern your use of this website; by using this website, 
                    you accept these terms and conditions in full. If you disagree with these terms & conditions or any part 
                    of these terms and conditions, you must not use this website.
                </p>
            </div>

            <!-- Membership -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">Membership</h3>
                <ul class="space-y-4 text-sm font-light text-gray-300">
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Our official website address is: 
                            <a href="{{ route('home') }}" wire:navigate class="text-[#8b5cf6] hover:underline font-mono">{{ route('home') }}</a>
                        </p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">You agree to be of legal minimal age of 18 years in your country to be registered on this platform.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">{{ config('app.name') }} accepts investors with minimum age of 18.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">The sign-up process is necessary for you to be an investor with {{ config('app.name') }}.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">By signing up, you agree with terms of use by being an investor with {{ config('app.name') }}.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">{{ config('app.name') }} is not available to the public and is opened only to the qualified members of {{ config('app.name') }}, 
                        the use of this platform is restricted to our investors and to individuals personally referred by them.</p>
                    </li>
                </ul>
            </div>

            <!-- License to use website -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">License to use website</h3>
                <ul class="space-y-4 text-sm font-light text-gray-300">
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Unless otherwise stated, {{ config('app.name') }} and/or its licensors own the intellectual property rights of this website, 
                        including all text, downloads and the {{ config('app.name') }} logo on the website. Subject to the license below, all these 
                        intellectual property rights are reserved.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">You may view, download for caching purposes only, and print pages from the website for your own personal use, 
                        subject to the restrictions set out below and elsewhere in these terms and conditions.</p>
                    </li>
                </ul>
            </div>

            <!-- Acceptable Use -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">Acceptable Use</h3>
                <ul class="space-y-4 text-sm font-light text-gray-300">
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">You must not use this website in any way that causes, or may cause, 
                        damage to the website or impairment of the availability or accessibility of the website; 
                        or in any way which is unlawful, illegal, fraudulent or harmful, or in connection with any unlawful, 
                        illegal, fraudulent or harmful purpose or activity.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Furthermore, you must not use this website to copy, store, host, transmit, send, use, 
                        publish or distribute any material which consists of (or is linked to) any spyware, 
                        computer virus, Trojan horse, worm, keystroke logger, rootkit or other malicious computer software.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">You must not use this website to transmit or send unsolicited commercial communications.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">You must not use this website for any purposes related to marketing without {{ config('app.name') }}'s express written consent.</p>
                    </li>
                </ul>
            </div>

            <!-- Reasonableness -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">Reasonableness</h3>
                <ul class="space-y-4 text-sm font-light text-gray-300">
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">By using this website, you agree that the exclusions and 
                        limitations of liability set out in this website disclaimer are reasonable.</p>
                    </li>
                </ul>
                <p class="mt-4 text-sm font-light text-gray-300 leading-relaxed">
                    If you do not think they are reasonable, you must not use this website.
                </p>
            </div>

            <!-- Anti-spam Rules -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">Anti-spam Rules</h3>
                <ul class="space-y-4 text-sm font-light text-gray-300">
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Spam is commercial e-mail or unsolicited bulk e-mail, including "junk mail", 
                        which has not been requested by the recipient. It is intrusive and often irrelevant or offensive, 
                        and it wastes valuable resources. Inappropriate newsgroup activities, 
                        consisting of excessive posting of the same materials to several newsgroups, are also deemed to be spam.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">We don't tolerate SPAMMING in our company.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">We forbid unsolicited e-mails of any kind in connection with the marketing of the services provided by {{ config('app.name') }}.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">If any law enforcement agency, internet provider, web hosting provider or other person or entity provide us with notice 
                        that you may have engaged in transmission of unsolicited e-mails or may have engaged in otherwise unlawful conduct or 
                        conduct in violation of an internet service provider's terms of service or any such policies or regulations, 
                        we will reserve the right to cooperate in any investigation relating to your activities including disclosure of 
                        your account information.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">If you didn't receive a letter or email from {{ config('app.name') }}, please don't forget to check your spam folder because some 
                        email services may mark our email as SPAM.</p>
                    </li>
                </ul>
            </div>

            <!-- Support Services -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">Support Services</h3>
                <ul class="space-y-4 text-sm font-light text-gray-300">
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Every investor has the right to get any additional information from our support service.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Investor may contact our support service via our contact form or another method which is convenient for them.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Investor agrees to behave politely with our support service and follow the instructions to prevent anyone from a potentially negative situation.</p>
                    </li>
                </ul>
            </div>

            <!-- Amendment Of Terms & Conditions -->
            <div class="bg-[#111116] border border-white/10 p-8 lg:p-10 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                <h3 class="text-base font-mono font-bold text-white uppercase tracking-widest mb-6">Amendment Of Terms &amp; Conditions</h3>
                <ul class="space-y-4 text-sm font-light text-gray-300">
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">{{ config('app.name') }} reserves the right to make changes to the current document without the consent of investors.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">{{ config('app.name') }} will inform investors about changes by publishing a notice on the site of the company.</p>
                    </li>
                    <li class="flex items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <span class="text-[#8b5cf6] font-mono mr-3 text-xs mt-0.5">▪</span>
                        <p class="leading-relaxed">Terms &amp; Conditions changes come into force since the date of publishing information on the site, unless otherwise provided in the text.</p>
                    </li>
                </ul>
            </div>

        </div>
    </section>

</div>