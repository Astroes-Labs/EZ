<div class="w-full max-w-md space-y-10">

    <!-- Header -->
    <x-auth-header :title="__('Welcome Back')" :subtitle="__('Sign in to manage your investments')" />


    <!-- Livewire Form -->
    <livewire:login-form />

    <!-- Register Link -->
    <p class="text-center text-gray-400">
        Don't have an account? 
        <a href="{{ route('register') }}" class="text-[#eac46e] hover:text-amber-300 font-medium">Create one now →</a>
    </p>

</div>