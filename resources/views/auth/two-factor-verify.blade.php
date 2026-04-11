@extends('layouts.auth')

@section('title', 'Two-Factor Verification | ' . config('app.name'))

@section('content')
    <div class="w-full max-w-md space-y-10">

        <!-- Header -->
        <div class="text-center">
            <img src="{{ url('assets/images/icon.png') }}" alt="{{ config('app.name') }}" class="h-16 mx-auto mb-6">
            <h1 class="text-4xl font-black tracking-tighter text-white">
                Two-Factor <span class="text-[#eac46e]">Verification</span>
            </h1>
            <p class="mt-4 text-gray-400">Enter the 4-digit code we sent to your email</p>
        </div>

        <!-- Livewire Component -->
        <livewire:two-factor-verify />

        <!-- Helper Text -->
        <p class="text-center text-gray-400 text-sm">
            Didn't receive the code? Check your spam folder or 
            <a href="{{ route('login') }}" class="text-[#eac46e] hover:text-amber-300">try logging in again</a>.
        </p>

    </div>
@endsection