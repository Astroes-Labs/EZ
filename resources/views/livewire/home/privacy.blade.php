<div class="min-h-screen bg-[#0a0f1c] text-gray-100 font-sans">

    {{-- Reusable Hero Banner --}}
    <livewire:shared.hero-banner 
        title="PRIVACY &amp; <span class='text-[#eac46e]'>POLICY</span>" 
        subtitle="How we collect, use, and protect your information at {{ config('app.name') }}" />

    {{-- Main Content Section --}}
    <section class="py-20 lg:py-28 bg-[#111827]">
        <div class="max-w-4xl mx-auto px-6 space-y-12">

            {{-- Introduction --}}
            <livewire:shared.content-card title="Introduction">
                <p>At {{ config('app.name') }}, we are committed to maintaining the privacy and security of your
                personal information. This Privacy Policy outlines the types of information we collect, how we
                use it, and the measures we take to safeguard it. By accessing or using the services provided by
                {{ config('app.name') }}, you consent to the collection and use of your information in
                accordance with this policy.</p>
            </livewire:shared.content-card>

            {{-- Collection of Information --}}
            <livewire:shared.content-card title="Collection of Information">
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
            </livewire:shared.content-card>

            {{-- Use of Information --}}
            <livewire:shared.content-card title="Use of Information">
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
            </livewire:shared.content-card>

            {{-- Data Security --}}
            <livewire:shared.content-card title="Data Security">
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
            </livewire:shared.content-card>

            {{-- Data Sharing and Disclosure --}}
            <livewire:shared.content-card title="Data Sharing and Disclosure">
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
            </livewire:shared.content-card>

            {{-- Cookies and Tracking Technologies --}}
            <livewire:shared.content-card title="Cookies and Tracking Technologies">
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
            </livewire:shared.content-card>

            {{-- Your Rights and Choices --}}
            <livewire:shared.content-card title="Your Rights and Choices">
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
            </livewire:shared.content-card>

            {{-- Children's Privacy --}}
            <livewire:shared.content-card title="Children's Privacy">
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
            </livewire:shared.content-card>

            {{-- Changes to this Privacy Policy --}}
            <livewire:shared.content-card title="Changes to this Privacy Policy">
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
            </livewire:shared.content-card>

        </div>
    </section>

</div>