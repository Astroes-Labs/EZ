@extends('layouts.auth') <!-- Keeps your auth layout + navigation -->

@section('title', 'Register')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
        <div class="w-full max-w-4xl space-y-12 animate-fade-in">
            <!-- Logo / Title -->
            <x-auth-header title="Create Your <span class='text-red-500'>Investment Account</span>"
                subtitle="Join {{ config('app.name') }} in a few minutes and start building your financial future." />



            <!-- Your Livewire component replaces the default form -->
            <livewire:register-form />

            <!-- Optional login link -->
            <p class="text-center text-gray-400 mt-8">
                Already have an account?
                <a href="{{ route('login') }}" class="text-red-400 hover:text-red-300 transition font-semibold">Sign in</a>
            </p>
        </div>

        
    </div>
@endsection