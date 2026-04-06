<form wire:submit="login" class="space-y-6">
    @csrf

    <!-- Honeypot -->
    <input type="text" wire:model="honeypot" class="hidden">

    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
        <input wire:model.debounce.500ms="email" type="email" required autofocus
            class="mt-2 block w-full rounded-xl border-0 bg-gray-800/70 text-white placeholder-gray-400 px-5 py-4 focus:ring-2 focus:ring-red-600 focus:border-transparent transition">
        @error('email') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
    </div>

    <!-- Password -->
    <div x-data="{ showPassword: false }">
        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
        <div class="relative">
            <input wire:model.debounce.500ms="password" :type="showPassword ? 'text' : 'password'" required
                class="mt-2 block w-full rounded-xl border-0 bg-gray-800/70 text-white placeholder-gray-400 px-5 py-4 focus:ring-2 focus:ring-red-600 focus:border-transparent transition">
            <button type="button" @click="showPassword = !showPassword"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-red-400">
                <i :class="showPassword ? 'fa-eye-slash' : 'fa-eye'" class="fa text-xl"></i>
            </button>
        </div>
        @error('password') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
    </div>

    <!-- Remember Me -->
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <input wire:model="remember" id="remember" type="checkbox"
                class="h-5 w-5 rounded border-gray-600 text-red-600 focus:ring-red-600">
            <label for="remember" class="ml-3 block text-sm text-gray-300">Remember me</label>
        </div>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sm text-red-400 hover:text-red-300 transition">
                Forgot password?
            </a>
        @endif
    </div>

    <!-- Submit -->
    <div>
        <button type="submit" wire:loading.attr="disabled"
            class="w-full bg-red-600 text-white py-4 rounded-xl font-bold text-lg hover:bg-red-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1 disabled:opacity-50">
            <span wire:loading.remove>Sign In</span>
            <span wire:loading class="flex items-center justify-center">
                <svg class="animate-spin h-5 w-5 mr-3 text-white" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                Signing In...
            </span>
        </button>
    </div>

    <!-- Errors -->
    @if($errors->any())
        <div class="mt-6 p-4 bg-red-900/50 border border-red-600 rounded-xl text-red-300 text-center">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </ul>
        </div>
    @endif
</form>