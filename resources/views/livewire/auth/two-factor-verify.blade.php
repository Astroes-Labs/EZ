<div class="min-h-screen bg-[#07070a] text-gray-100 font-sans flex flex-col justify-between">

    <!-- Header Section -->
    <section class="relative py-12 px-6 lg:px-12 text-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/40 pointer-events-none"></div>
        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>

        <div class="container mx-auto max-w-xl relative z-10 pt-10">
            <h1 class="text-3xl sm:text-4xl font-black text-white tracking-tighter uppercase font-mono mb-2">
                LOGIN <span class="text-[#8b5cf6]">VERIFICATION</span>
            </h1>
            <p class="text-xs text-gray-400 font-light uppercase tracking-widest font-mono">
                Enter the 4-digit code we sent to your email.
            </p>
        </div>
    </section>

    <!-- Verification Section -->
    <section class="pb-24 pt-2 bg-[#07070a] flex-grow flex items-center">
        <div class="w-full max-w-xl mx-auto px-4 sm:px-6">
            <div class="bg-[#111116] border border-white/10 p-6 sm:p-10 lg:p-12 relative group shadow-[0_20px_60px_rgba(0,0,0,0.9)]">
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>

                <form method="POST" wire:submit="verify" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-3 text-center">Verification Code *</label>
                        <input wire:model.debounce.500ms="code" type="text" maxlength="4" inputmode="numeric" pattern="[0-9]*"
                            placeholder="••••" required
                            class="w-full text-center text-4xl sm:text-5xl tracking-[12px] bg-black border border-white/10 py-6 focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none">
                        @error('code')
                            <p class="mt-2 text-center text-xs font-mono text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-4">
                        <button type="submit" wire:loading.attr="disabled" wire:target="verify"
                            class="w-full py-5 bg-[#8b5cf6] hover:bg-[#7c3aed] text-white font-mono text-xs uppercase tracking-widest font-bold transition-all active:scale-[0.99] shadow-[0_0_25px_rgba(139,92,246,0.4)] disabled:opacity-70">
                            <span wire:loading.remove wire:target="verify">
                                Verify & Continue
                            </span>

                            <span wire:loading wire:target="verify" class="flex items-center justify-center gap-3 text-center">
                                <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                                Verifying...
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Helper Links -->
                <div class="pt-6 mt-6 border-t border-white/10 text-center">
                    <p class="text-xs font-mono text-gray-400 uppercase tracking-widest">
                        Didn't receive the code?
                        <a href="#" wire:click.prevent="restartLogin" class="text-[#8b5cf6] hover:underline ml-1 font-semibold">
                            Try logging in again
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>

</div>