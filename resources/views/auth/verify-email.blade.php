<div class="w-full max-w-sm mx-auto space-y-12 text-center">
    
    <x-auth-header 
        :title="__('Verify Your Email')" 
        :subtitle="__('We sent a verification link to your email address')" 
    />

    <livewire:verify-email />

</div>