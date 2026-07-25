<div class="w-full max-w-md space-y-10 pt-20">

    <!-- Header -->
   
    {{-- <x-auth-header :title="__('Join Us Today')" :subtitle="__('Create an account and start investing today')" /> --}}

    

    <!-- Livewire Register Form -->
    <livewire:register-form />

    <!-- Login Link -->
        <div class="pt-4 border-t border-white/10 text-center">
            <p class="text-xs font-mono text-gray-400 uppercase tracking-widest">
                Already have an account? 
                <a href="{{ route('login') }}" wire:navigate class="text-[#8b5cf6] hover:underline ml-1">Sign in here →</a>
            </p>
        </div>
</div>