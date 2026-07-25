<div class="min-h-screen bg-[#07070a] text-gray-100 font-sans">

    <!-- Page Hero / Banner -->
    <section class="relative min-h-[40vh] flex items-center justify-center bg-[#07070a] overflow-hidden pt-20" id="banner">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/40 pointer-events-none"></div>
        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>

        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-16 lg:py-24">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tighter uppercase font-mono mb-4">
                CONTACT <span class="text-[#8b5cf6]">US</span>
            </h1>
            <p class="text-sm text-gray-400 font-light max-w-2xl mx-auto uppercase tracking-wide">
                Reach out to our team for any assistance or inquiries regarding {{ config('app.name') }}
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 lg:py-28 bg-[#07070a]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">

                <!-- Left: Contact Info -->
                <div class="space-y-12">
                    <div>
                        <h3 class="text-2xl lg:text-3xl font-mono font-bold text-white tracking-wider uppercase mb-6">
                            Get In Touch
                        </h3>
                        <p class="text-sm font-light text-gray-300 leading-relaxed max-w-xl">
                            Our team is ready to assist you with any questions or inquiries about
                            {{ config('app.name') }}.
                            Feel free to reach out through any of the channels below.
                        </p>
                    </div>

                    <div class="space-y-8">
                        <div class="flex items-start gap-6 bg-[#111116] border border-white/10 p-6 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                            <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                            <div class="w-10 h-10 bg-black border border-white/10 rounded flex items-center justify-center flex-shrink-0">
                                <i class="fa fa-envelope text-[#8b5cf6] text-lg"></i>
                            </div>
                            <div>
                                <div class="text-xs font-mono text-gray-400 tracking-widest uppercase mb-1">Email</div>
                                <a href="mailto:{{ config('app.support_email') }}"
                                    class="text-sm font-light text-white hover:text-[#8b5cf6] transition-colors">
                                    {{ config('app.support_email') }}
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-6 bg-[#111116] border border-white/10 p-6 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                            <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                            <div class="w-10 h-10 bg-black border border-white/10 rounded flex items-center justify-center flex-shrink-0">
                                <i class="fa fa-map-marker text-[#8b5cf6] text-lg"></i>
                            </div>
                            <div>
                                <div class="text-xs font-mono text-gray-400 tracking-widest uppercase mb-1">Location</div>
                                <p class="text-sm font-light text-gray-300 leading-relaxed">
                                    {{ config('app.company_address') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-white/10">
                        <p class="text-xs font-mono text-gray-400 uppercase tracking-widest">
                            Available 24/7 via email, live chat, WhatsApp, and Telegram.
                        </p>
                    </div>

                    <!-- Google Map -->
                    <div class="mt-16 lg:mt-20">
                        <div class="bg-[#111116] border border-white/10 p-4 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
                            <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!3m2!1sen!2sng!4v1775730105485!5m2!1sen!2sng!6m8!1m7!1s69GUOw6ljqIexBnrs_BxIg!2m2!1d47.60757425112291!2d-122.3340924182106!3f194.15288198048398!4f0.4182379478932887!5f0.7820865974627469"
                                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="filter grayscale contrast-125 opacity-90 hover:opacity-100 transition-opacity"></iframe>
                        </div>
                    </div>
                </div>

                <!-- Right: Contact Form -->
                <div class="bg-[#111116] border border-white/10 p-8 lg:p-12 relative group shadow-[0_20px_50px_rgba(0,0,0,0.8)] self-start">
                    <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                    <h3 class="text-2xl font-mono font-bold text-white tracking-wider uppercase mb-8">Leave a Message</h3>

                    <form method="POST" action="#" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <input type="text" name="name" id="name"
                                    class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all"
                                    placeholder="Full Name *" required>
                            </div>
                            <div>
                                <input type="email" name="email" id="email"
                                    class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all"
                                    placeholder="Email Address *" required>
                            </div>
                        </div>

                        <div>
                            <input type="text" name="subject" id="subject"
                                class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all"
                                placeholder="Subject *" required>
                        </div>

                        <div>
                            <textarea name="message" id="message" rows="6"
                                class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 resize-none transition-all"
                                placeholder="Your Message *" required></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                class="w-full py-4 bg-[#8b5cf6] hover:bg-[#7c3aed] text-white font-mono text-xs uppercase tracking-widest transition-all active:scale-[0.99] shadow-[0_0_20px_rgba(139,92,246,0.3)]">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

</div>