@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12 lg:py-20 bg-gradient-to-br from-gray-950 via-black to-red-950">
    <div class="w-full max-w-lg space-y-12 animate-fade-in">
        <!-- Logo / Header -->
        <div class="text-center">
            <a href="{{ route('home') }}">
                <img src="{{ url('assets/images/logo/coinmaxe.png') }}" alt="{{ config('app.name') }}" class="h-16 w-auto mx-auto">
            </a>
            <h2 class="mt-8 text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                Reset Your <span class="text-red-500">Password</span>
            </h2>
            <p class="mt-4 text-lg text-gray-400">
                Enter your new password below to regain access to your account.
            </p>
        </div>

        <!-- Main Card -->
        <div class="bg-white/5 dark:bg-gray-900/70 backdrop-blur-lg p-8 lg:p-12 rounded-2xl border border-red-600/30 shadow-2xl">
            <!-- Session Status (e.g. success after reset) -->
            <x-auth-session-status class="mb-6 text-center text-green-400" :status="session('status')" />

            <form method="POST" action="{{ route('password.store') }}" class="space-y-8">
                @csrf

                <!-- Hidden Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email (read-only, shown for reference) -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required readonly
                           class="mt-2 block w-full rounded-xl border-0 bg-gray-700/50 text-gray-400 px-5 py-4 cursor-not-allowed">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <!-- New Password -->
                <div x-data="{ showPassword: false }">
                    <x-input-label for="password" :value="__('New Password')" class="text-gray-300" />
                    <div class="relative">
                        <input id="password" wire:model.debounce.500ms="password" 
                               :type="showPassword ? 'text' : 'password'" name="password" required autocomplete="new-password"
                               class="mt-2 block w-full rounded-xl border-0 bg-gray-800/70 text-white placeholder-gray-400 px-5 py-4 focus:ring-2 focus:ring-red-600 focus:border-transparent transition">
                        <button type="button" @click="showPassword = !showPassword" 
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-red-400 transition">
                            <i :class="showPassword ? 'fa-eye-slash' : 'fa-eye'" class="fa text-xl"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <!-- Confirm Password -->
                <div x-data="{ showConfirmPassword: false }">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-300" />
                    <div class="relative">
                        <input id="password_confirmation" wire:model.debounce.500ms="password_confirmation" 
                               :type="showConfirmPassword ? 'text' : 'password'" name="password_confirmation" required autocomplete="new-password"
                               class="mt-2 block w-full rounded-xl border-0 bg-gray-800/70 text-white placeholder-gray-400 px-5 py-4 focus:ring-2 focus:ring-red-600 focus:border-transparent transition">
                        <button type="button" @click="showConfirmPassword = !showConfirmPassword" 
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-red-400 transition">
                            <i :class="showConfirmPassword ? 'fa-eye-slash' : 'fa-eye'" class="fa text-xl"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
                </div>

                <!-- Submit Button with Loader -->
                <div class="flex items-center justify-end">
                    <button type="submit"
                            class="inline-flex items-center px-10 py-4 bg-red-600 text-white rounded-xl font-bold text-lg hover:bg-red-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1 disabled:opacity-50">
                        <span wire:loading.remove wire:target="submit">
                            {{ __('Reset Password') }}
                        </span>
                        <span wire:loading wire:target="submit" class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Resetting...
                        </span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Back to Login -->
        <p class="text-center text-gray-400">
            Remember your password? 
            <a href="{{ route('login') }}" class="text-red-400 hover:text-red-300 transition font-semibold">Sign in</a>
        </p>
    </div>
</div>
@endsection