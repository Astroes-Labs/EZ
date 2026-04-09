<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden pt-20" id="banner">
    <div class="absolute inset-0 bg-[#0a0f1c]">
        <img src="{{ url('assets/images/banner-img.png') }}" 
             alt="Banner"
             class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-b from-[#0a0f1c]/90 via-[#222f53]/80 to-[#0a0f1c]"></div>
    </div>

    <div class="max-w-screen-2xl mx-auto px-6 relative z-20 text-center">
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black tracking-tighter leading-none">
            {!! $title !!}
        </h1>
        @if($subtitle)
            <p class="mt-6 text-xl text-gray-400 max-w-lg mx-auto">{{ $subtitle }}</p>
        @endif
    </div>
</section>