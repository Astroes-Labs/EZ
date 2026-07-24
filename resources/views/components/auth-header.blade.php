@props(['title', 'subtitle'])

<div class="text-center max-w-md mx-auto">
    <h1 class="text-5xl font-black tracking-tighter mb-4">
        {!! $title !!}
    </h1>
    
    <p class="text-lg text-gray-400">
        {{ $subtitle }}
    </p>
</div>