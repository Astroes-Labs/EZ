@extends('layouts.home.layout')

@section('title', 'Contact Us | ' . config('app.name'))

@section('content')

    <!-- Hero Banner -->
    <section class="relative min-h-[50vh] flex items-center justify-center bg-gradient-to-br from-red-900 via-black to-gray-950 overflow-hidden" id="banner">
        <!-- Subtle red overlay for depth -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/40 pointer-events-none"></div>
        
        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-20 lg:py-32">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight drop-shadow-2xl animate-fade-in">
                CONTACT <span class="text-red-500">US</span>
            </h1>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 lg:py-32 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
                <!-- Left: Contact Info -->
                <div class="space-y-12 animate-fade-in-left">
                    <div>
                        <h3 class="text-4xl lg:text-5xl font-bold text-red-600 mb-8">Contact Info</h3>
                        <p class="text-xl text-gray-700 leading-relaxed">
                            Our contact information and addresses, so you can reach us anyway you choose.
                            We'll be available 24/7 to answer all questions & inquiries.
                        </p>
                    </div>

                    <ul class="space-y-8 text-lg lg:text-xl">
                        <li class="flex items-start">
                            <i class="fa fa-envelope text-red-600 text-3xl mr-6 mt-1"></i>
                            <div>
                                <a href="mailto:{{ config('app.email') }}" 
                                   class="text-red-600 hover:text-red-400 transition-colors">
                                    {{ config('app.email') }}
                                </a>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fa fa-map-marker text-red-600 text-3xl mr-6 mt-1"></i>
                            <span class="text-gray-700">
                                {{ config('app.company_address') }}
                            </span>
                        </li>
                    </ul>
                </div>

                <!-- Right: Contact Form -->
                <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-xl animate-fade-in-right">
                    <h3 class="text-3xl lg:text-4xl font-bold text-red-600 mb-10">Leave a Message Here</h3>

                    <form method="post" action="" class="space-y-8">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <input type="text" name="name" id="name" 
                                       class="w-full px-6 py-4 bg-gray-100 border border-gray-300 rounded-xl focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-600/30 transition-all"
                                       placeholder="Full Name *" required>
                            </div>
                            <div>
                                <input type="email" name="email" id="email" 
                                       class="w-full px-6 py-4 bg-gray-100 border border-gray-300 rounded-xl focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-600/30 transition-all"
                                       placeholder="Email *" required>
                            </div>
                        </div>

                        <div>
                            <input type="text" name="subject" id="subject" 
                                   class="w-full px-6 py-4 bg-gray-100 border border-gray-300 rounded-xl focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-600/30 transition-all"
                                   placeholder="Subject *" required>
                        </div>

                        <div>
                            <textarea name="message" id="message" rows="6" 
                                      class="w-full px-6 py-4 bg-gray-100 border border-gray-300 rounded-xl focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-600/30 transition-all resize-none"
                                      placeholder="Message *" required></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="send" 
                                    class="inline-block bg-red-600 text-white px-10 py-4 rounded-xl font-bold text-lg hover:bg-red-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Google Map -->
            <div class="mt-20 lg:mt-32 animate-fade-in">
                <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-red-600/30">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3592.75265558727!2d-80.18004938497874!3d25.778732183628996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b422b9598609%3A0x181a73ff0696e231!2s1007%20N%20America%20Way%2C%20Miami%2C%20FL%2033132%2C%20USA!5e0!3m2!1sen!2sng!4v1658941334544!5m2!1sen!2sng"
                            width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('xtraJs')
    <script>
        // Optional: any extra JS if needed (e.g. form validation, success message)
    </script>
@endsection