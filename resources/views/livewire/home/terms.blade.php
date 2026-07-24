<div class="min-h-screen bg-[#0a0f1c] text-gray-100 font-sans">

    {{-- Hero Banner --}}
    <livewire:shared.hero-banner 
        title="TERMS &amp; <span class='text-[#eac46e]'>CONDITIONS</span>" />

    {{-- Main Content --}}
    <section class="py-20 lg:py-28 bg-[#111827]">
        <div class="max-w-4xl mx-auto px-6 space-y-12">

            {{-- Introduction --}}
            <livewire:shared.content-card title="Introduction">
                <p>These terms and conditions govern your use of this website; by using this website, 
                you accept these terms and conditions in full. If you disagree with these terms & conditions or any part 
                of these terms and conditions, you must not use this website.</p>
            </livewire:shared.content-card>

            {{-- Membership --}}
            <livewire:shared.content-card title="Membership">
                <ul class="space-y-6 text-gray-300 text-lg">
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>Our official website address is: 
                            <a href="{{ route('home') }}" wire:navigate class="text-[#eac46e] hover:underline">{{ route('home') }}</a>
                        </p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>You agree to be of legal minimal age of 18 years in your country to be registered on this platform.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>{{ config('app.name') }} accepts investors with minimum age of 18.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>The sign-up process is necessary for you to be an investor with {{ config('app.name') }}.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>By signing up, you agree with terms of use by being an investor with {{ config('app.name') }}.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>{{ config('app.name') }} is not available to the public and is opened only to the qualified members of {{ config('app.name') }}, 
                        the use of this platform is restricted to our investors and to individuals personally referred by them.</p>
                    </li>
                </ul>
            </livewire:shared.content-card>

            {{-- License to use website --}}
            <livewire:shared.content-card title="License to use website">
                <ul class="space-y-6 text-gray-300 text-lg">
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>Unless otherwise stated, {{ config('app.name') }} and/or its licensors own the intellectual property rights of this website, 
                        including all text, downloads and the {{ config('app.name') }} logo on the website. Subject to the license below, all these 
                        intellectual property rights are reserved.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>You may view, download for caching purposes only, and print pages from the website for your own personal use, 
                        subject to the restrictions set out below and elsewhere in these terms and conditions.</p>
                    </li>
                </ul>
            </livewire:shared.content-card>

            {{-- Acceptable Use --}}
            <livewire:shared.content-card title="Acceptable Use">
                <ul class="space-y-6 text-gray-300 text-lg">
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>You must not use this website in any way that causes, or may cause, 
                        damage to the website or impairment of the availability or accessibility of the website; 
                        or in any way which is unlawful, illegal, fraudulent or harmful, or in connection with any unlawful, 
                        illegal, fraudulent or harmful purpose or activity.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>Furthermore, you must not use this website to copy, store, host, transmit, send, use, 
                        publish or distribute any material which consists of (or is linked to) any spyware, 
                        computer virus, Trojan horse, worm, keystroke logger, rootkit or other malicious computer software.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>You must not use this website to transmit or send unsolicited commercial communications.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>You must not use this website for any purposes related to marketing without {{ config('app.name') }}'s express written consent.</p>
                    </li>
                </ul>
            </livewire:shared.content-card>

            {{-- Reasonableness --}}
            <livewire:shared.content-card title="Reasonableness">
                <ul class="space-y-6 text-gray-300 text-lg">
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>By using this website, you agree that the exclusions and 
                        limitations of liability set out in this website disclaimer are reasonable.</p>
                    </li>
                </ul>
                <p class="mt-6 text-lg text-gray-300">
                    If you do not think they are reasonable, you must not use this website.
                </p>
            </livewire:shared.content-card>

            {{-- Anti-spam Rules --}}
            <livewire:shared.content-card title="Anti-spam Rules">
                <ul class="space-y-6 text-gray-300 text-lg">
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>Spam is commercial e-mail or unsolicited bulk e-mail, including "junk mail", 
                        which has not been requested by the recipient. It is intrusive and often irrelevant or offensive, 
                        and it wastes valuable resources. Inappropriate newsgroup activities, 
                        consisting of excessive posting of the same materials to several newsgroups, are also deemed to be spam.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>We don't tolerate SPAMMING in our company.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>We forbid unsolicited e-mails of any kind in connection with the marketing of the services provided by {{ config('app.name') }}.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>If any law enforcement agency, internet provider, web hosting provider or other person or entity provide us with notice 
                        that you may have engaged in transmission of unsolicited e-mails or may have engaged in otherwise unlawful conduct or 
                        conduct in violation of an internet service provider's terms of service or any such policies or regulations, 
                        we will reserve the right to cooperate in any investigation relating to your activities including disclosure of 
                        your account information.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>If you didn't receive a letter or email from {{ config('app.name') }}, please don't forget to check your spam folder because some 
                        email services may mark our email as SPAM.</p>
                    </li>
                </ul>
            </livewire:shared.content-card>

            {{-- Support Services --}}
            <livewire:shared.content-card title="Support Services">
                <ul class="space-y-6 text-gray-300 text-lg">
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>Every investor has the right to get any additional information from our support service.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>Investor may contact our support service via our contact form or another method which is convenient for them.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>Investor agrees to behave politely with our support service and follow the instructions to prevent anyone from a potentially negative situation.</p>
                    </li>
                </ul>
            </livewire:shared.content-card>

            {{-- Amendment Of Terms & Conditions --}}
            <livewire:shared.content-card title="Amendment Of Terms & Conditions">
                <ul class="space-y-6 text-gray-300 text-lg">
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>{{ config('app.name') }} reserves the right to make changes to the current document without the consent of investors.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>{{ config('app.name') }} will inform investors about changes by publishing a notice on the site of the company.</p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                        <p>Terms & Conditions changes come into force since the date of publishing information on the site, unless otherwise provided in the text.</p>
                    </li>
                </ul>
            </livewire:shared.content-card>

        </div>
    </section>

</div>