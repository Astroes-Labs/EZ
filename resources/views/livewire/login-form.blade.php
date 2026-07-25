<div>
    <form wire:submit="login" class="space-y-6">
        @csrf

        <!-- Honeypot -->
        <input type="text" wire:model="honeypot" class="hidden">

        <!-- Email -->
        <div>
            <label class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Email Address *</label>
            <input wire:model.debounce.500ms="email" 
                   type="email" 
                   required 
                   autofocus
                   class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                   placeholder="email@example.com">
            @error('email') 
                <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p> 
            @enderror
        </div>

        <!-- Password -->
        <div x-data="{ showPassword: false }">
            <label class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Password *</label>
            <div class="relative">
                <input wire:model.debounce.500ms="password" 
                       :type="showPassword ? 'text' : 'password'" 
                       required
                       class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                       placeholder="Password">
                <button type="button" 
                        @click="showPassword = !showPassword"
                        class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#8b5cf6] transition-colors">
                    <i :class="showPassword ? 'fa-eye-slash' : 'fa-eye'" class="fa text-base"></i>
                </button>
            </div>
            @error('password') 
                <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p> 
            @enderror
        </div>

        <!-- Remember Me + Forgot Password -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pt-2 text-xs font-mono text-gray-300">
            <label class="flex items-center cursor-pointer">
                <input wire:model="remember" type="checkbox" class="h-4 w-4 bg-black border-white/20 text-[#8b5cf6] focus:ring-0 rounded-none">
                <span class="ml-3">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" wire:navigate
                   class="text-[#8b5cf6] hover:underline">
                    Forgot password?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit" 
                    wire:loading.attr="disabled"
                    class="w-full py-5 bg-[#8b5cf6] hover:bg-[#7c3aed] text-white font-mono text-xs uppercase tracking-widest font-bold transition-all active:scale-[0.99] shadow-[0_0_25px_rgba(139,92,246,0.4)] disabled:opacity-70">
                <span wire:loading.remove>Sign In</span>
                <span wire:loading class="flex items-center justify-center gap-3">
                    <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    Signing In...
                </span>
            </button>
        </div>

    </form>
</div>