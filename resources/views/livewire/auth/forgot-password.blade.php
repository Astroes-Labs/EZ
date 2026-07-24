<div class="w-full max-w-md space-y-10">

    <div class="text-center">
        <h1 class="text-4xl font-black tracking-tighter text-white">Reset Your Password</h1>
        <p class="mt-4 text-gray-400">Enter your email address and we'll send you a link to reset your password.</p>
    </div>

    <form method="POST"   wire:submit="store"   class="space-y-6">
        @csrf

        <div>
            <input type="email"  wire:model.debounce.500ms="email"  
                   class="w-full px-6 py-4 bg-[#1a2238] border border-[#222f53] rounded-2xl focus:border-[#eac46e] text-white placeholder-gray-400 focus:outline-none"
                   placeholder="Your Email Address" required autofocus>
            @error('email')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

       <button 
            type="submit"
            wire:loading.attr="disabled"
            class="w-full py-4 bg-[#eac46e] hover:bg-amber-300 text-[#111827] font-bold rounded-2xl transition-all active:scale-95 disabled:opacity-70 flex items-center justify-center gap-3">
            
            <!-- Normal State -->
            <span wire:loading.remove class="flex items-center justify-center">
                Send Reset Link
            </span>

            <!-- Loading State -->
            <span wire:loading class="flex items-center justify-center gap-3">
                <svg class="animate-spin h-5 w-5 text-[#111827]" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                Sending...
            </span>
        </button>
    </form>

    <p class="text-center">
        <a href="{{ route('login') }}" wire:navigate class="text-gray-400 hover:text-white transition">← Back to Login</a>
    </p>

</div>