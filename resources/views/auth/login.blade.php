@extends('layouts.auth')

@section('title', 'Login | ' . config('app.name'))

@section('content')
    <div class="w-full max-w-md space-y-10">

        <!-- Logo & Title -->
        <div class="text-center">
            <div class="flex justify-center mb-6">
                <img src="{{ url('assets/images/icon.png') }}" alt="{{ config('app.name') }}" class="h-16 w-auto">
            </div>
            <h1 class="text-4xl font-black tracking-tighter text-white">
                Welcome Back to <span class="text-[#eac46e]">{{ config('app.name') }}</span>
            </h1>
            <p class="mt-3 text-gray-400">Sign in to continue your investment journey</p>
        </div>

        <!-- Status & Errors -->
        <x-auth-session-status class="text-center" :status="session('status')" />
        <x-auth-validation-errors class="text-center" :errors="$errors" />

        <!-- Livewire Login Form -->
        <livewire:login-form />

        <!-- Register Link -->
        <p class="text-center text-gray-400 text-sm">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-[#eac46e] hover:text-amber-300 font-semibold transition">Create one now →</a>
        </p>

    </div>
@endsection