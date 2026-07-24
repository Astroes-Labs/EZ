<div class="min-h-screen bg-[#0a0f1c] text-gray-100 font-sans">

    <!-- Page Hero / Banner -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden pt-20" id="banner">
        <div class="absolute inset-0 bg-[#0a0f1c]">
            <img src="{{ url('assets/images/banner-img.png') }}" 
                 alt="Testimonials Banner"
                 class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0f1c]/90 via-[#222f53]/80 to-[#0a0f1c]"></div>
        </div>

        <div class="max-w-screen-2xl mx-auto px-6 relative z-20 text-center">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black tracking-tighter leading-none">
                INVESTOR <span class="text-[#eac46e]">TESTIMONIALS</span>
            </h1>
            <p class="mt-6 text-xl text-gray-400 max-w-lg mx-auto">
                Real stories from real investors who are growing with {{ config('app.name') }}
            </p>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section class="py-20 lg:py-28 bg-[#111827]">
        <div class="max-w-screen-2xl mx-auto px-6">
            <livewire:shared.section-heading 
                title="What Our Investors Say" 
                subtitle="Here are a few words from our most trusted investors..." 
            />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                @foreach([
                    [
                        'img' => 'S2yV3QjMr2uyTpA7K1qpO994sbfB6XH7gFzqYcvx.jpg',
                        'name' => 'ROB AALDERS',
                        'text' => "Becoming wealthy is not achieved through saving alone, but rather through investing. It is essential to prioritize saving and investing, even from a young age, with the aim of securing sufficient funds for the post-retirement period. Personally, my investment ventures have yielded greater financial gains than my time spent serving in the U.S Navy. Kudos to the world of cryptocurrency for this remarkable achievement!"
                    ],
                    [
                        'img' => '3WiTifZXIAbbb6yVkJPAXEh6pa4JbULM1DsbPKNV.jpg',
                        'name' => 'BLAKE HALL',
                        'text' => "I began investing in cryptocurrency in 2017, and at that time, I would rate my knowledge level as a 4 out of 10. However, I have since acquired a solid understanding of the fundamentals, and thanks to my investments with " . config('app.name') . ", I have already made over 11 million. This sets me apart from several of my friends who chose to invest their money elsewhere."
                    ],
                    [
                        'img' => 'niisMgBnF7OKhgePR1aktjzRinZKtwDJYvRFAMpG.jpg',
                        'name' => 'SHANA ERIKSON',
                        'text' => "I have never lost in cryptocurrency, and I attribute that success to " . config('app.name') . " and its community. This group has created more millionaires than any other, including myself."
                    ],
                    [
                        'img' => '1pw61oJzrC1LOyZXzwKBKkYSBPKMPhPt75BDTrAz.jpg',
                        'name' => 'DENNIS SAHLSTROM',
                        'text' => "A common myth about investing is that a big bank account is required just to get started. In reality, building a solid portfolio can begin with a few thousand or even a few hundred dollars. " . config('app.name') . " has taught me all I need to know about the crypto space."
                    ],
                    [
                        'img' => 'DJ5Lyg8ap7Ivq0BCcFWh7UoNb0gOSxzp5Jjbq4hx.jpg',
                        'name' => 'HENRY COHEN',
                        'text' => "In January, I ventured into bitcoin and crypto trading. After seeing the significant profits a friend had made through bitcoin trading with " . config('app.name') . ", I decided to give it a try. The outcome was beyond my expectations."
                    ],
                ] as $testimonial)
                <div class="bg-[#1a2238] border border-[#222f53] hover:border-[#eac46e]/40 rounded-3xl overflow-hidden transition-all duration-500 hover:-translate-y-2 group">
                    <div class="p-8 lg:p-10 text-center">
                        
                        <!-- Avatar -->
                        <div class="relative inline-block mb-8">
                            <img src="{{ url('assets/images/' . $testimonial['img']) }}"
                                 alt="{{ $testimonial['name'] }}"
                                 class="w-28 h-28 sm:w-32 sm:h-32 rounded-full mx-auto object-cover border-4 border-[#eac46e]/30 group-hover:border-[#eac46e] transition-all duration-500 group-hover:scale-110 group-hover:rotate-3">
                        </div>

                        <!-- Testimonial Text -->
                        <p class="text-gray-300 italic leading-relaxed text-base lg:text-lg mb-10">
                            "{{ $testimonial['text'] }}"
                        </p>

                        <!-- Name -->
                        <h6 class="text-xl font-semibold text-[#eac46e]">
                            {{ $testimonial['name'] }}
                        </h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>