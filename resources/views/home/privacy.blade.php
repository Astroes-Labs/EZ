@extends('layouts.home.layout')

@section('title', 'Privacy Policy | ' . config('app.name'))

@section('content')

    <!-- Hero Banner -->
    <section class="relative min-h-[50vh] flex items-center justify-center bg-gradient-to-br from-red-900 via-black to-gray-950 overflow-hidden" id="banner">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/40 pointer-events-none"></div>
        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-20 lg:py-32">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight drop-shadow-2xl animate-fade-in">
                PRIVACY & <span class="text-red-500">POLICY</span>
            </h1>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 lg:py-32 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl">
            <div class="space-y-16">
                <!-- Introduction -->
                <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-xl animate-fade-in">
                    <h5 class="text-3xl lg:text-4xl font-bold text-red-600 mb-8">Introduction</h5>
                    <p class="text-lg lg:text-xl text-gray-700 leading-relaxed">
                        At {{ config('app.name') }}, we are committed to maintaining the privacy and security of your
                        personal information. This Privacy Policy outlines the types of information we collect, how we
                        use it, and the measures we take to safeguard it. By accessing or using the services provided by
                        {{ config('app.name') }}, you consent to the collection and use of your information in
                        accordance with this policy.
                    </p>
                </div>

                <!-- Collection of Information -->
                <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-xl animate-fade-in">
                    <h5 class="text-3xl lg:text-4xl font-bold text-red-600 mb-8">Collection of Information</h5>
                    <ul class="space-y-6 text-lg lg:text-xl text-gray-700">
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>We collect personal information that you provide to us directly when you register on our
                            platform, create an account, or communicate with us.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>This information may include your name, email address, phone number, financial details,
                            and other data required to use our services.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>In addition, we automatically collect certain information such as IP addresses, browser
                            types, device information, and browsing activity through cookies and other tracking
                            technologies.</p>
                        </li>
                    </ul>
                </div>

                <!-- Use of Information -->
                <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-xl animate-fade-in">
                    <h5 class="text-3xl lg:text-4xl font-bold text-red-600 mb-8">Use of Information</h5>
                    <ul class="space-y-6 text-lg lg:text-xl text-gray-700">
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>The personal information we collect is used to provide, maintain, and improve our
                            services, including facilitating transactions, processing requests, and delivering
                            content.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>We may also use this information to communicate with you regarding updates, newsletters,
                            promotions, or other information related to our services. You can opt-out of marketing
                            communications at any time.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>We may use your data to personalize your experience on the platform, monitor and analyze
                            usage patterns, and improve the functionality and security of the website.</p>
                        </li>
                    </ul>
                </div>

                <!-- Data Security -->
                <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-xl animate-fade-in">
                    <h5 class="text-3xl lg:text-4xl font-bold text-red-600 mb-8">Data Security</h5>
                    <ul class="space-y-6 text-lg lg:text-xl text-gray-700">
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>We implement a range of technical, administrative, and physical measures to protect your
                            personal information from unauthorized access, disclosure, or alteration.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>Despite our efforts, no security system is completely foolproof. While we take steps to
                            protect your data, we cannot guarantee the absolute security of your information.</p>
                        </li>
                    </ul>
                </div>

                <!-- Data Sharing and Disclosure -->
                <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-xl animate-fade-in">
                    <h5 class="text-3xl lg:text-4xl font-bold text-red-600 mb-8">Data Sharing and Disclosure</h5>
                    <ul class="space-y-6 text-lg lg:text-xl text-gray-700">
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>We do not sell, rent, or lease your personal information to third parties. However, we
                            may share your information in certain circumstances such as:</p>
                            <ul class="ml-8 mt-4 space-y-3 list-disc list-inside text-gray-600">
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
                <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-xl animate-fade-in">
                    <h5 class="text-3xl lg:text-4xl font-bold text-red-600 mb-8">Cookies and Tracking Technologies</h5>
                    <ul class="space-y-6 text-lg lg:text-xl text-gray-700">
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>We use cookies and similar tracking technologies to enhance your browsing experience,
                            track website usage, and gather information to improve our services.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>Cookies are small text files stored on your device that allow us to recognize your
                            preferences and provide tailored content. You can control cookie settings through your
                            browser.</p>
                        </li>
                    </ul>
                </div>

                <!-- Your Rights and Choices -->
                <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-xl animate-fade-in">
                    <h5 class="text-3xl lg:text-4xl font-bold text-red-600 mb-8">Your Rights and Choices</h5>
                    <ul class="space-y-6 text-lg lg:text-xl text-gray-700">
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>You have the right to access, correct, update, or delete your personal information at
                            any time. To do so, please contact us through the available communication channels.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>You may also choose to opt out of marketing communications by following the instructions
                            provided in each communication.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>If you believe your rights under applicable data protection laws have been violated, you
                            may lodge a complaint with the relevant authorities.</p>
                        </li>
                    </ul>
                </div>

                <!-- Children's Privacy -->
                <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-xl animate-fade-in">
                    <h5 class="text-3xl lg:text-4xl font-bold text-red-600 mb-8">Children's Privacy</h5>
                    <ul class="space-y-6 text-lg lg:text-xl text-gray-700">
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>Our services are not intended for children under the age of 18. We do not knowingly
                            collect personal information from children.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>If we learn that we have inadvertently collected information from a child, we will take
                            steps to delete such information as soon as possible.</p>
                        </li>
                    </ul>
                </div>

                <!-- Changes to this Privacy Policy -->
                <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-xl animate-fade-in">
                    <h5 class="text-3xl lg:text-4xl font-bold text-red-600 mb-8">Changes to this Privacy Policy</h5>
                    <ul class="space-y-6 text-lg lg:text-xl text-gray-700">
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>{{ config('app.name') }} reserves the right to modify this Privacy Policy at any time.
                            Any changes will be posted on this page with an updated date.</p>
                        </li>
                        <li class="flex items-start">
                            <span class="text-red-600 text-3xl mr-4 mt-1">•</span>
                            <p>By continuing to use our services after changes have been made to this policy, you
                            acknowledge and accept those changes.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('xtraJs')
    <script>
        // Optional JS if needed
    </script>
@endsection