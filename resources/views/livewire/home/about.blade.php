@extends('layouts.home.layout')

@section('title', 'Testimonials | ' . config('app.name'))

@section('content')

    <!-- Page Banner / Hero -->
    <section
        class="relative min-h-[50vh] flex items-center justify-center bg-[#07070a] overflow-hidden pt-20"
        id="banner">
        <!-- Subtle dark/violet overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/40 pointer-events-none"></div>
        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>

        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-20 lg:py-32">
            <h1
                class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tighter uppercase font-mono">
                INVESTOR'S <span class="text-[#8b5cf6]">TESTIMONIALS</span>
            </h1>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="team-part py-20 lg:py-32 bg-[#07070a]">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="text-center mb-16">
                <p class="text-base lg:text-lg text-gray-400 font-light max-w-3xl mx-auto leading-relaxed">
                    Here are a few words from our most trusted investors.
                    These words are like guides to us, and they help weave our deep legal and technical experience into our
                    financial and investments services.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $appName = config('app.name');
                @endphp

                @foreach([
                        [
                            'img' => 'S2yV3QjMr2uyTpA7K1qpO994sbfB6XH7gFzqYcvx.jpg',
                            'name' => 'DAVID LEE',
                            'text' => "Becoming wealthy is not achieved through saving alone, but rather through investing. It is essential to prioritize saving and investing, even from a young age, with the aim of securing sufficient funds for the post-retirement period. Personally, my investment ventures have yielded greater financial gains than my time spent working. Kudos to the world of cryptocurrency for this remarkable achievement!."
                        ],
                        [
                            'img' => '3WiTifZXIAbbb6yVkJPAXEh6pa4JbULM1DsbPKNV.jpg',
                            'name' => 'MICHAEL DYRE',
                            'text' => "I began investing in cryptocurrency in 2017, and at that time, I would rate my knowledge level as a 4 out of 10. However, I have since acquired a solid understanding of the fundamentals, and thanks to my investments with $appName, I have already made over 11 million. This sets me apart from several of my friends who chose to invest their money elsewhere."
                        ],
                        [
                            'img' => 'niisMgBnF7OKhgePR1aktjzRinZKtwDJYvRFAMpG.jpg',
                            'name' => "SKYLAR O'CONNER",
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

                                            <div class="bg-[#111116] border border-white/10 rounded-none overflow-hidden transition-all duration-300 hover:border-[#8b5cf6]/60 shadow-[0_20px_50px_rgba(0,0,0,0.8)] relative group">
                                                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                                                <div class="p-8 lg:p-10 flex flex-col justify-between h-full">
                                            <!-- Avatar -->
                                            <div class="relative inline-block mb-6">
                                                <img src="{{ url('assets/images/' . $testimonial['img']) }}" 
                                                           alt="{{ $testimonial['name'] }}" 
                                                           class="w-20 h-20 rounded-none object-cover border border-white/20 filter grayscale contrast-125 transition-all duration-300 group-hover:scale-105 group-hover:border-[#8b5cf6]">
                                            </div>

                                                    <!-- Testimonial Text -->
                                                    <p class="text-sm text-gray-300 font-light leading-relaxed italic mb-8 flex-grow">
                                                        "{{ $testimonial['text'] }}"
                                                    </p>

                                                    <!-- Name -->
                                                    <h6 class="text-xs font-mono font-bold tracking-widest text-[#8b5cf6] uppercase">
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