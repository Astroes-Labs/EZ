<div class="w-full max-w-md space-y-10 pt-20">

    <!-- Header -->
    <x-auth-header :title="__('Welcome Back')" :subtitle="__('Sign in to manage your investments')" />


    <!-- Livewire Form -->
    <livewire:login-form />

    <!-- Register Link -->
    <div class="pt-6 mt-6 border-t border-white/10 text-center">
        <p class="text-xs font-mono text-gray-400 uppercase tracking-widest">
            Don't have an account?
            <a href="{{ route('register') }}" wire:navigate
                class="text-[#8b5cf6] hover:underline ml-1 font-semibold">Create one now →</a>
        </p>
    </div>

</div>
