<div class="min-h-screen bg-[#07070a] text-gray-100 font-sans flex flex-col justify-between">

    <!-- Header Section -->
    <section class="relative py-12 px-6 lg:px-12 text-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/40 pointer-events-none"></div>
        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>

        <div class="container mx-auto max-w-xl relative z-10 pt-10">
            <h1 class="text-3xl sm:text-4xl font-black text-white tracking-tighter uppercase font-mono mb-2">
                RESET YOUR <span class="text-[#8b5cf6]">PASSWORD</span>
            </h1>
            <p class="text-xs text-gray-400 font-light uppercase tracking-widest font-mono">
                Please enter your new password below
            </p>
        </div>
    </section>

    <!-- Reset Password Section -->
    <section class="pb-24 pt-2 bg-[#07070a] flex-grow flex items-center">
        <div class="w-full max-w-xl mx-auto px-4 sm:px-6">
            <div class="bg-[#111116] border border-white/10 p-6 sm:p-10 lg:p-12 relative group shadow-[0_20px_60px_rgba(0,0,0,0.9)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>

                <form wire:submit="store" class="space-y-6">
                    @csrf

                    <!-- Token -->
                    <input type="hidden" name="token" value="{{ $token }}">

                    <!-- Email -->
                    <div>
                        <label class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Email Address *</label>
                        <input type="email" 
                               wire:model.debounce.500ms="email" 
                               value="{{ $email }}" 
                               readonly
                               class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-400 cursor-not-allowed transition-all rounded-none">
                    </div>

                    <!-- New Password -->
                    <div x-data="{ showPassword: false }">
                        <label class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">New Password *</label>
                        <div class="relative">
                            <input type="password" 
                                   wire:model.debounce.500ms="password" 
                                   :type="showPassword ? 'text' : 'password'"
                                   required 
                                   autocomplete="new-password"
                                   class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                   placeholder="New Password">
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

                    <!-- Confirm Password -->
                    <div x-data="{ showConfirmPassword: false }">
                        <label class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Confirm New Password *</label>
                        <div class="relative">
                            <input type="password" 
                                   wire:model.debounce.500ms="password_confirmation" 
                                   :type="showConfirmPassword ? 'text' : 'password'"
                                   required 
                                   autocomplete="new-password"
                                   class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                   placeholder="Confirm New Password">
                            <button type="button" 
                                    @click="showConfirmPassword = !showConfirmPassword"
                                    class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#8b5cf6] transition-colors">
                                <i :class="showConfirmPassword ? 'fa-eye-slash' : 'fa-eye'" class="fa text-base"></i>
                            </button>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                                wire:loading.attr="disabled"
                                class="w-full py-5 bg-[#8b5cf6] hover:bg-[#7c3aed] text-white font-mono text-xs uppercase tracking-widest font-bold transition-all active:scale-[0.99] shadow-[0_0_25px_rgba(139,92,246,0.4)] disabled:opacity-70 flex items-center justify-center gap-3">
                            
                            <!-- Normal State -->
                            <span wire:loading.remove>
                                Reset Password
                            </span>

                            <!-- Loading State -->
                            <span wire:loading class="flex items-center gap-3">
                                <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                                Resetting Password...
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Back to Login Link -->
                <div class="pt-6 mt-6 border-t border-white/10 text-center">
                    <p class="text-xs font-mono text-gray-400 uppercase tracking-widest">
                        <a href="{{ route('login') }}" wire:navigate class="text-[#8b5cf6] hover:underline font-semibold">← Back to Login</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

</div>