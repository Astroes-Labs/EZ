<div class="w-full max-w-md space-y-10">

    <!-- Header -->
    <div class="text-center">
        <div class="flex justify-center mb-6">
            <img src="{{ url('assets/images/icon.png') }}" alt="{{ config('app.name') }}" class="h-16 w-auto">
        </div>
        <h1 class="text-4xl font-black tracking-tighter text-white">
            Reset Your Password
        </h1>
        <p class="mt-4 text-gray-400">Please enter your new password below</p>
    </div>

    <!-- Form Card -->
    <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12 shadow-2xl">

        <form method="POST" action="{{ route('password.store') }}" class="space-y-8">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Email Address</label>
                <input type="email" 
                       name="email" 
                       value="{{ $email }}" 
                       readonly
                       class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
            </div>

            <!-- New Password -->
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">New Password</label>
                <input type="password" 
                       name="password" 
                       required 
                       autocomplete="new-password"
                       class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                @error('password')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Confirm New Password</label>
                <input type="password" 
                       name="password_confirmation" 
                       required 
                       autocomplete="new-password"
                       class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="w-full py-5 bg-[#eac46e] hover:bg-amber-300 text-[#111827] font-bold rounded-2xl transition-all active:scale-95">
                Reset Password
            </button>
        </form>

    </div>

    <!-- Back to Login -->
    <p class="text-center text-gray-400 text-sm">
        <a href="{{ route('login') }}" class="hover:text-white transition">← Back to Login</a>
    </p>

</div>