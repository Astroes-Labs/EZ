@props([
    'title',
    'subtitle'
])

<div class="text-center">
    <a href="{{ route('home') }}">
        <img src="{{ url('assets/images/icon.png') }}"
             alt="{{ config('app.name') }}"
             class="h-16 w-auto mx-auto">
    </a>

    <h2 class="mt-8 text-4xl font-extrabold text-white tracking-tight">
        {!! $title !!}
    </h2>

    <p class="mt-3 text-lg text-gray-400">
        {{ $subtitle }}
    </p>
</div>
