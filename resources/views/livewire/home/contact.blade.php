<div class="min-h-screen bg-[#0a0f1c] text-gray-100 font-sans">

    <!-- Page Hero / Banner -->
    <livewire:shared.hero-banner title="CONTACT <span class='text-[#eac46e]'>US</span>" />

    <!-- Contact Section -->
    <section class="py-20 lg:py-28 bg-[#111827]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">

                <!-- Left: Contact Info -->
                <div class="space-y-12">
                    <div>
                        <h3 class="text-4xl lg:text-5xl font-bold tracking-tight mb-6">
                            Get In Touch
                        </h3>
                        <p class="text-lg text-gray-400 leading-relaxed">
                            Our team is ready to assist you with any questions or inquiries about
                            {{ config('app.name') }}.
                            Feel free to reach out through any of the channels below.
                        </p>
                    </div>

                    <div class="space-y-10">
                        <div class="flex items-start gap-6">
                            <div
                                class="w-12 h-12 bg-[#222f53] rounded-2xl flex items-center justify-center flex-shrink-0">
                                <i class="fa fa-envelope text-[#eac46e] text-2xl"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-400 tracking-wider mb-1">EMAIL</div>
                                <a href="mailto:{{ config('app.support_email') }}"
                                    class="text-lg text-white hover:text-[#eac46e] transition-colors">
                                    {{ config('app.support_email') }}
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-6">
                            <div
                                class="w-12 h-12 bg-[#222f53] rounded-2xl flex items-center justify-center flex-shrink-0">
                                <i class="fa fa-map-marker text-[#eac46e] text-2xl"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-400 tracking-wider mb-1">LOCATION</div>
                                <p class="text-lg text-gray-300 leading-relaxed">
                                    {{ config('app.company_address') }}
                                </p>
                            </div>


                        </div>
                    </div>

                    <div class="pt-6 border-t border-[#222f53]">
                        <p class="text-gray-400">
                            Available 24/7 via email, live chat, WhatsApp, and Telegram.
                        </p>
                    </div>

                    <!-- Google Map -->
                    <div class="mt-20 lg:mt-24">
                        {{-- <div>
                            <h3 class="text-4xl lg:text-5xl font-bold tracking-tight mb-6">
                                Location
                            </h3>
                            <p class="text-lg text-gray-400 leading-relaxed">
                                Our team is ready to assist you with any questions or inquiries about {{
                                config('app.name') }}.
                                Feel free to reach out through any of the channels below.
                            </p>
                        </div> --}}
                        <div class="rounded-3xl overflow-hidden border border-[#222f53] shadow-2xl">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!3m2!1sen!2sng!4v1775730105485!5m2!1sen!2sng!6m8!1m7!1s69GUOw6ljqIexBnrs_BxIg!2m2!1d47.60757425112291!2d-122.3340924182106!3f194.15288198048398!4f0.4182379478932887!5f0.7820865974627469"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

                <!-- Right: Contact Form -->
                <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12">
                    <h3 class="text-3xl lg:text-4xl font-bold text-white mb-10">Leave a Message</h3>

                    <form method="POST" action="#" class="space-y-8">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <input type="text" name="name" id="name"
                                    class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl focus:outline-none focus:border-[#eac46e] text-gray-100 placeholder-gray-500 transition-all"
                                    placeholder="Full Name *" required>
                            </div>
                            <div>
                                <input type="email" name="email" id="email"
                                    class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl focus:outline-none focus:border-[#eac46e] text-gray-100 placeholder-gray-500 transition-all"
                                    placeholder="Email Address *" required>
                            </div>
                        </div>

                        <div>
                            <input type="text" name="subject" id="subject"
                                class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl focus:outline-none focus:border-[#eac46e] text-gray-100 placeholder-gray-500 transition-all"
                                placeholder="Subject *" required>
                        </div>

                        <div>
                            <textarea name="message" id="message" rows="7"
                                class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl focus:outline-none focus:border-[#eac46e] text-gray-100 placeholder-gray-500 resize-none transition-all"
                                placeholder="Your Message *" required></textarea>
                        </div>

                        <div class="text-center pt-4">
                            <button type="submit"
                                class="inline-block w-full sm:w-auto px-12 py-4 bg-[#eac46e] text-[#111827] font-bold rounded-2xl hover:bg-amber-300 transition-all active:scale-95">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

</div>