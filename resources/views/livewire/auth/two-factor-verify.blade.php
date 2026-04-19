<div class="w-full max-w-md space-y-10 pt-20">

    
    <!-- Header -->
    <x-auth-header :title="__('Login Verification')" :subtitle="__('Enter the 4-digit code we sent to your email.')" />

    <!-- 2FA Form -->
    <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12 shadow-2xl">

        <form method="POST" wire:submit="verify" class="space-y-8">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-400 mb-3 text-center">Verification Code</label>
                <input wire:model.debounce.500ms="code" 
                       type="text" 
                       maxlength="4" 
                       inputmode="numeric" 
                       pattern="[0-9]*" 
                       placeholder="••••"
                       required
                       class="w-full text-center text-5xl tracking-[12px] bg-[#0a0f1c] border border-[#222f53] rounded-2xl py-8 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 text-white placeholder-gray-500 transition-all">
                @error('code') 
                    <p class="mt-3 text-center text-sm text-red-400">{{ $message }}</p> 
                @enderror
            </div>

            <button type="submit" 
                    wire:loading.attr="disabled"
                    class="w-full py-5 bg-[#eac46e] hover:bg-amber-300 text-[#111827] font-bold rounded-2xl transition-all active:scale-95 disabled:opacity-70">
                <span wire:loading.remove>Verify & Continue</span>
                <span wire:loading class="flex items-center justify-center gap-3">
                    <svg class="animate-spin h-5 w-5 text-[#111827]" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    Verifying...
                </span>
            </button>
        </form>

    </div>

    <!-- Helper Links -->
    <p class="text-center text-gray-400 text-sm">
        Didn't receive the code? 
        <a href="{{ route('login') }}" class="text-[#eac46e] hover:text-amber-300 transition">Try logging in again</a>
    </p>

</div>