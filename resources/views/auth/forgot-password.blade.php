@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
    <div
        class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12 lg:py-20 bg-gradient-to-br from-gray-950 via-black to-red-950">
        <div class="w-full max-w-lg space-y-12 animate-fade-in">
            <!-- Logo / Header -->

            <x-auth-header title="Forgot Your  <span class='text-red-500'>Password?</span>"
                subtitle="No problem. Just let us know your email address and we’ll send you a password reset link." />

            <!-- Main Card -->
            <div
                class="bg-white/5 dark:bg-gray-900/70 backdrop-blur-lg p-8 lg:p-12 rounded-2xl border border-red-600/30 shadow-2xl">
                <!-- Session Status (success message after sending link) -->
                <x-auth-session-status class="mb-6 text-center text-green-400" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-8">
                    @csrf

                    <!-- Email Input -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="mt-2 block w-full rounded-xl border-0 bg-gray-800/70 text-white placeholder-gray-400 px-5 py-4 focus:ring-2 focus:ring-red-600 focus:border-transparent transition">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Submit Button with Loader -->
                    <div class="flex items-center justify-end">
                        <button type="submit"
                            class="w-full inline-flex items-center px-10 py-4 bg-red-600 text-white rounded-xl font-bold justify-center text-lg hover:bg-red-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1 disabled:opacity-50">
                            <span wire:loading.remove wire:target="submit">
                                {{ __('Email Password Reset Link') }}
                            </span>
                            <span wire:loading wire:target="submit" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Sending...
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