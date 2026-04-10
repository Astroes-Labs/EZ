<div class="w-full max-w-md space-y-10">

    <!-- Header -->
    <div class="text-center">
        <img src="{{ url('assets/images/icon.png') }}" alt="{{ config('app.name') }}" class="h-16 mx-auto mb-6">
        <h1 class="text-4xl font-black tracking-tighter">
            Join <span class="text-[#eac46e]">{{ config('app.name') }}</span>
        </h1>
        <p class="mt-3 text-gray-400">Create your account and start investing today</p>
    </div>

    <!-- Livewire Form -->
    <livewire:register-form />

    <!-- Login Link -->
    <p class="text-center text-gray-400">
        Already have an account? 
        <a href="{{ route('login') }}" class="text-[#eac46e] hover:text-amber-300 font-medium">Sign in here →</a>
    </p>

</div>