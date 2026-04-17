<div class="w-full max-w-md space-y-10 pt-20">

    <!-- Header -->
   
    <x-auth-header :title="__('Join Us Today')" :subtitle="__('Create an account and start investing today')" />

    <!-- Livewire Form -->
    <livewire:register-form />

    <!-- Login Link -->
    <p class="text-center text-gray-400">
        Already have an account? 
        <a href="{{ route('login') }}" class="text-[#eac46e] hover:text-amber-300 font-medium">Sign in here →</a>
    </p>
</div>