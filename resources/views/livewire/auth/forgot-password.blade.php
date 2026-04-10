<div class="w-full max-w-md space-y-10">

    <div class="text-center">
        <h1 class="text-4xl font-black tracking-tighter text-white">Reset Your Password</h1>
        <p class="mt-4 text-gray-400">Enter your email address and we'll send you a link to reset your password.</p>
    </div>

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <div>
            <input type="email" name="email" 
                   class="w-full px-6 py-4 bg-[#1a2238] border border-[#222f53] rounded-2xl focus:border-[#eac46e] text-white placeholder-gray-400 focus:outline-none"
                   placeholder="Your Email Address" required autofocus>
            @error('email')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
                class="w-full py-4 bg-[#eac46e] hover:bg-amber-300 text-[#111827] font-bold rounded-2xl transition-all">
            Send Reset Link
        </button>
    </form>

    <p class="text-center">
        <a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition">← Back to Login</a>
    </p>

</div>