@extends('layouts.auth')

@section('title', 'Verify Email')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12 lg:py-20 bg-gradient-to-br from-gray-950 via-black to-red-950">
    <div class="w-full max-w-lg space-y-12 animate-fade-in">
        <!-- Header -->
        <div class="text-center">
            <a href="{{ route('home') }}">
                <img src="{{ url('assets/images/logo/coinmaxe.png') }}" alt="{{ config('app.name') }}" class="h-16 w-auto mx-auto">
            </a>
            <h2 class="mt-8 text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                Verify Your <span class="text-red-500">Email Address</span>
            </h2>
            <p class="mt-4 text-lg text-gray-400">
                Thanks for signing up! Before getting started, could you verify your email address by clicking the link we just emailed you?
            </p>
        </div>

        <!-- Main Card -->
        <div class="bg-white/5 dark:bg-gray-900/70 backdrop-blur-lg p-8 lg:p-12 rounded-2xl border border-red-600/30 shadow-2xl">
            <!-- Success Message (after resend) -->
            @if (session('status') === 'verification-link-sent')
                <div class="mb-8 p-6 bg-green-900/50 border border-green-600 rounded-xl text-green-300 text-center font-medium">
                    A fresh verification link has been sent to your email inbox!
                </div>
            @endif

            <!-- Instructions & Resend -->
            <div class="text-center space-y-8 text-gray-300">
                <p class="text-lg">
                    If you didn't receive the email, don't worry — we can send you another one.
                </p>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button type="submit"
                            class="inline-block bg-red-600 text-white px-10 py-4 rounded-xl font-bold text-lg hover:bg-red-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Resend Verification Email
                    </button>
                </form>

                <!-- Logout -->
                <div class="pt-6 border-t border-gray-700">
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-red-400 transition underline">
                            Click here to log out
                        </button>
                    </form>
                </div>

                <!-- Extra note -->
                <p class="text-sm text-gray-500">
                    Didn't get it? Check your spam/junk folder or contact support.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection