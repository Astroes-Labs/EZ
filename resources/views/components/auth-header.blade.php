@props([
    'title',
    'subtitle'
])




    <div class="text-center">
        <img src="{{ url('assets/images/rel-icon.png') }}" alt="{{ config('app.name') }}" class="h-16 mx-auto mb-6">
        <h1 class="text-4xl font-black tracking-tighter">
             {!! $title !!} <span class="text-[#eac46e]">{{ config('app.name') }}</span>
        </h1>
        <p class="mt-3 text-gray-400"> {{ $subtitle }}</p>
    </div>