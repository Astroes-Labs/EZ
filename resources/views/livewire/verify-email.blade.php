<div class="space-y-8">

    <!-- Info Box -->
    <div class="p-6 bg-[#111116] border border-white/10 text-gray-300 text-sm leading-relaxed">
        Thanks for signing up! Before getting started, please verify your email address by clicking the link we just
        emailed to you.

        <br><br>

        If you didn’t receive the email, we’ll gladly send you another.
    </div>

    <!-- Success Message -->
    @if (session('status') == 'verification-link-sent')
        <div class="p-5 bg-green-900/50 border border-green-600 rounded-2xl text-green-300 text-sm text-center">
            A new verification link has been sent to your email address.
        </div>
    @endif

    <!-- Actions -->
    <div class="space-y-4">

        <!-- Resend Button -->
        <button wire:click="resend" wire:loading.attr="disabled"
            class="w-full py-4 bg-[#8b5cf6] hover:bg-[#7c3aed] text-white font-mono text-xs uppercase tracking-widest transition-all active:scale-[0.99] shadow-[0_0_20px_rgba(139,92,246,0.3)]">
            <span wire:loading.remove>Resend Verification Email</span>
            <span wire:loading class="flex items-center justify-center gap-3">
                <svg class="animate-spin h-5 w-5 text-[#111827]" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                Sending...
            </span>
        </button>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="w-full py-4 font-bold text-sm sm:text-base bg-[#111116] hover:bg-[#181820] text-white font-mono  text-xs uppercase border border-white/10 rounded-none transition-all shadow-[inset_0_1px_0_0_rgba(255,255,255,0.06)] text-center">
                Log Out
            </button>
        </form>

    </div>

</div>
