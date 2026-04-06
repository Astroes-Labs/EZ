{{-- resources\views\auth\login.blade.php --}}
@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
        <div class="w-full max-w-md space-y-10 animate-fade-in">
            <!-- Logo / Title -->
            <x-auth-header title="Welcome Back to <span class='text-red-500'>{{ config('app.name') }}</span>"
                subtitle="Sign in to continue your investment journey" />


            <!-- Session Status / Errors -->
            <x-auth-session-status class="text-center text-red-400" :status="session('status')" />
            <x-auth-validation-errors class="text-red-400 text-center" :errors="$errors" />

            
            <!-- Your Livewire component replaces the default form -->
            <livewire:login-form />

            <!-- Register link -->
            <p class="text-center text-gray-400">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-red-400 hover:text-red-300 transition font-semibold">Create
                    one now</a>
            </p>
        </div>
    </div>
@endsection