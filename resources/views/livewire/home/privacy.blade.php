<div class="min-h-screen bg-[#0a0f1c] text-gray-100 font-sans">

    <!-- Page Hero / Banner -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden pt-20" id="banner">
        <div class="absolute inset-0 bg-[#0a0f1c]">
            <img src="{{ url('assets/images/banner-img.png') }}" 
                 alt="Privacy Policy Banner"
                 class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0f1c]/90 via-[#222f53]/80 to-[#0a0f1c]"></div>
        </div>

        <div class="max-w-screen-2xl mx-auto px-6 relative z-20 text-center">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black tracking-tighter leading-none">
                PRIVACY & <span class="text-[#eac46e]">POLICY</span>
            </h1>
            <p class="mt-6 text-xl text-gray-400 max-w-lg mx-auto">
                How we collect, use, and protect your information at {{ config('app.name') }}
            </p>
        </div>
    </section>

    <!-- Main Privacy Content -->
    <section class="py-20 lg:py-28 bg-[#111827]">
        <div class="max-w-4xl mx-auto px-6">
            <div class="space-y-12">

                <!-- Introduction -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Introduction</h5>
                    <p class="text-lg text-gray-300 leading-relaxed">
                        At {{ config('app.name') }}, we are committed to maintaining the privacy and security of your
                        personal information. This Privacy Policy outlines the types of information we collect, how we
                        use it, and the measures we take to safeguard it. By accessing or using the services provided by
                        {{ config('app.name') }}, you consent to the collection and use of your information in
                        accordance with this policy.
                    </p>
                </div>

                <!-- Collection of Information -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Collection of Information</h5>
                    <ul class="space-y-6 text-gray-300 text-lg">
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>We collect personal information that you provide to us directly when you register on our
                            platform, create an account, or communicate with us.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>This information may include your name, email address, phone number, financial details,
                            and other data required to use our services.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>In addition, we automatically collect certain information such as IP addresses, browser
                            types, device information, and browsing activity through cookies and other tracking
                            technologies.</p>
                        </li>
                    </ul>
                </div>

                <!-- Use of Information -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Use of Information</h5>
                    <ul class="space-y-6 text-gray-300 text-lg">
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>The personal information we collect is used to provide, maintain, and improve our
                            services, including facilitating transactions, processing requests, and delivering
                            content.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>We may also use this information to communicate with you regarding updates, newsletters,
                            promotions, or other information related to our services. You can opt-out of marketing
                            communications at any time.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>We may use your data to personalize your experience on the platform, monitor and analyze
                            usage patterns, and improve the functionality and security of the website.</p>
                        </li>
                    </ul>
                </div>

                <!-- Data Security -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Data Security</h5>
                    <ul class="space-y-6 text-gray-300 text-lg">
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>We implement a range of technical, administrative, and physical measures to protect your
                            personal information from unauthorized access, disclosure, or alteration.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>Despite our efforts, no security system is completely foolproof. While we take steps to
                            protect your data, we cannot guarantee the absolute security of your information.</p>
                        </li>
                    </ul>
                </div>

                <!-- Data Sharing and Disclosure -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Data Sharing and Disclosure</h5>
                    <ul class="space-y-6 text-gray-300 text-lg">
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>We do not sell, rent, or lease your personal information to third parties. However, we
                            may share your information in certain circumstances such as:</p>
                            <ul class="ml-8 mt-4 space-y-3 list-disc list-inside text-gray-400">
                                <li>To comply with legal obligations or protect against fraud.</li>
                                <li>With trusted service providers who assist us in operating our platform and
                                conducting our business (e.g., payment processors, email service providers).</li>
                                <li>In the event of a merger, acquisition, or sale of assets, your data may be
                                transferred to the acquiring party.</li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- Cookies and Tracking Technologies -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Cookies and Tracking Technologies</h5>
                    <ul class="space-y-6 text-gray-300 text-lg">
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>We use cookies and similar tracking technologies to enhance your browsing experience,
                            track website usage, and gather information to improve our services.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>Cookies are small text files stored on your device that allow us to recognize your
                            preferences and provide tailored content. You can control cookie settings through your
                            browser.</p>
                        </li>
                    </ul>
                </div>

                <!-- Your Rights and Choices -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Your Rights and Choices</h5>
                    <ul class="space-y-6 text-gray-300 text-lg">
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>You have the right to access, correct, update, or delete your personal information at
                            any time. To do so, please contact us through the available communication channels.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>You may also choose to opt out of marketing communications by following the instructions
                            provided in each communication.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>If you believe your rights under applicable data protection laws have been violated, you
                            may lodge a complaint with the relevant authorities.</p>
                        </li>
                    </ul>
                </div>

                <!-- Children's Privacy -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Children's Privacy</h5>
                    <ul class="space-y-6 text-gray-300 text-lg">
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>Our services are not intended for children under the age of 18. We do not knowingly
                            collect personal information from children.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>If we learn that we have inadvertently collected information from a child, we will take
                            steps to delete such information as soon as possible.</p>
                        </li>
                    </ul>
                </div>

                <!-- Changes to this Privacy Policy -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h5 class="text-3xl lg:text-4xl font-bold text-[#eac46e] mb-8">Changes to this Privacy Policy</h5>
                    <ul class="space-y-6 text-gray-300 text-lg">
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>{{ config('app.name') }} reserves the right to modify this Privacy Policy at any time.
                            Any changes will be posted on this page with an updated date.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#eac46e] text-3xl mr-4 mt-1">•</span>
                            <p>By continuing to use our services after changes have been made to this policy, you
                            acknowledge and accept those changes.</p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

</div>