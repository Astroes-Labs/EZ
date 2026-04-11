{{-- <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12 shadow-2xl"> --}}
<div>
    <form wire:submit="login" class="space-y-8">
        @csrf

        <!-- Honeypot -->
        <input type="text" wire:model="honeypot" class="hidden">

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">Email Address</label>
            <input wire:model.debounce.500ms="email" 
                   type="email" 
                   required 
                   autofocus
                   class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
            @error('email') 
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p> 
            @enderror
        </div>

        <!-- Password -->
        <div x-data="{ showPassword: false }">
            <label class="block text-sm font-medium text-gray-400 mb-2">Password</label>
            <div class="relative">
                <input wire:model.debounce.500ms="password" 
                       :type="showPassword ? 'text' : 'password'" 
                       required
                       class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                <button type="button" 
                        @click="showPassword = !showPassword"
                        class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#eac46e]">
                    <i :class="showPassword ? 'fa-eye-slash' : 'fa-eye'" class="fa text-xl"></i>
                </button>
            </div>
            @error('password') 
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p> 
            @enderror
        </div>

        <!-- Remember Me + Forgot Password -->
        <div class="flex items-center justify-between">
            <label class="flex items-center text-sm text-gray-400">
                <input wire:model="remember" type="checkbox" class="h-5 w-5 rounded border-[#222f53] text-[#eac46e] focus:ring-[#eac46e]">
                <span class="ml-3">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" 
                   class="text-sm text-[#eac46e] hover:text-amber-300 transition">
                    Forgot password?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" 
                wire:loading.attr="disabled"
                class="w-full py-4 bg-[#eac46e] hover:bg-amber-300 text-[#111827] font-bold rounded-2xl transition-all active:scale-95 disabled:opacity-70">
            <span wire:loading.remove>Sign In</span>
            <span wire:loading class="flex items-center justify-center gap-3">
                <svg class="animate-spin h-5 w-5 text-[#111827]" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                Signing In...
            </span>
        </button>

        <!-- Global Errors -->
        @if($errors->any())
            <div class="p-5 bg-red-900/50 border border-red-600 rounded-2xl text-red-300 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>

</div>