@extends('layouts.auth') <!-- Keeps your auth layout + navigation -->

@section('title', 'Register')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
        <div class="w-full max-w-4xl space-y-12 animate-fade-in">
            <!-- Logo / Title -->
            <x-auth-header title="Two-Factor  <span class='text-red-500'>Verification</span>"
                subtitle="Enter the 4-digit code we sent to your email." />



            <!-- Your Livewire component replaces the default form -->
            <livewire:two-factor-verify />

            <!-- Optional login link -->
            <p class="text-center text-gray-400 mt-6 text-sm">
                Didn't receive the code? Check spam or 
                <a href="{{ route('login') }}" class="text-red-400 hover:underline">try logging in again</a>.
            </p>
        </div>

        
    </div>
@endsection