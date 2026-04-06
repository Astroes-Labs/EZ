@extends('layouts.home.layout')

@section('title', 'Testimonials | ' . config('app.name'))

@section('content')

    <!-- Page Banner / Hero -->
    <section
        class="relative min-h-[50vh] flex items-center justify-center bg-gradient-to-br from-red-900 via-black to-gray-950 overflow-hidden"
        id="banner">
        <!-- Subtle red overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/40 pointer-events-none"></div>

        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-20 lg:py-32">
            <h1
                class="text-5xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight drop-shadow-2xl animate-fade-in">
                INVESTOR'S <span class="text-red-500">TESTIMONIALS</span>
            </h1>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="team-part py-20 lg:py-32 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in">
                <p class="text-xl lg:text-2xl text-gray-700 max-w-4xl mx-auto leading-relaxed">
                    Here are a few words from our most trusted investors.
                    These words are like guides to us, and they help weave our deep legal and technical experience into our
                    financial and investments services.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                @php
                    $appName = config('app.name');
                @endphp

                @foreach([
                        [
                            'img' => 'S2yV3QjMr2uyTpA7K1qpO994sbfB6XH7gFzqYcvx.jpg',
                            'name' => 'ROB AALDERS',
                            'text' => "Becoming wealthy is not achieved through saving alone, but rather through investing. It is essential to prioritize saving and investing, even from a young age, with the aim of securing sufficient funds for the post-retirement period. Personally, my investment ventures have yielded greater financial gains than my time spent serving in the U.S Navy. Kudos to the world of cryptocurrency for this remarkable achievement!."
                        ],
                        [
                            'img' => '3WiTifZXIAbbb6yVkJPAXEh6pa4JbULM1DsbPKNV.jpg',
                            'name' => 'BLAKE HALL',
                            'text' => "I began investing in cryptocurrency in 2017, and at that time, I would rate my knowledge level as a 4 out of 10. However, I have since acquired a solid understanding of the fundamentals, and thanks to my investments with $appName, I have already made over 11 million. This sets me apart from several of my friends who chose to invest their money elsewhere."
                        ],
                        [
                            'img' => 'niisMgBnF7OKhgePR1aktjzRinZKtwDJYvRFAMpG.jpg',
                            'name' => 'SHANA ERIKSON',
                            'text' => "I have never lost in cryptocurrency, and I attribute that success to $appName and its community. This group has created more millionaires than any other, including myself."
                        ],
                        [
                            'img' => '1pw61oJzrC1LOyZXzwKBKkYSBPKMPhPt75BDTrAz.jpg',
                            'name' => 'DENNIS SAHLSTROM',
                            'text' => "A common myth about investing is that a big bank account is required just to get started. In reality, building a solid portfolio can begin with a few thousand or even a few hundred dollars. $appName has taught me all I need to know about the crypto space."
                        ],
                        [
                            'img' => 'DJ5Lyg8ap7Ivq0BCcFWh7UoNb0gOSxzp5Jjbq4hx.jpg',
                            'name' => 'HENRY COHEN',
                            'text' => "In January, I ventured into bitcoin and crypto trading. After seeing the significant profits a friend had made through bitcoin trading with $appName, I decided to give it a try. The outcome was beyond my expectations."
                        ],
                    ] as $testimonial)

                                            <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl hover:shadow-red-600/30 transition-all duration-500 transform hover:-translate-y-6 group animate-fade-in-up">
                                                <div class="p-8 lg:p-10 text-center">
                                            <!-- Avatar -->
                                            <div class="relative inline-block mb-8">
                                                <img src="{{ url('assets/images/' . $testimonial['img']) }}" 
                                                             alt="{{ $testimonial['name'] }}" 
                                                             class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-red-600 transition-transform duration-500 group-hover:scale-110 group-hover:rotate-3 group-hover:drop-shadow-[0_0_20px_rgba(239,68,68,0.4)]">
                                                    </div>

                                                    <!-- Testimonial Text -->
                                                    <p class="text-lg lg:text-xl text-gray-700 leading-relaxed italic mb-8">
                                                        "{{ $testimonial['text'] }}"
                                                    </p>

                                                    <!-- Name -->
                                                    <h6 class="text-xl font-bold text-red-600">
                                                        {{ $testimonial['name'] }}
                                                    </h6>
                                                </div>
                                            </div>
                @endforeach
                        </div>
                </div>
                </section>

@endsection

@section('xtraJs')
    <script>
        // Optional: smooth scroll or other JS if needed
    </script>
@endsection