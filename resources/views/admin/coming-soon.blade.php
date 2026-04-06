<!-- File: resources/views/admin/coming-soon.blade.php -->

@extends('admin.layouts.app')

@section('title', 'Coming Soon')

@section('content')
<div class="min-h-[70vh] flex flex-col items-center justify-center px-4 text-center">
    <div class="max-w-md w-full space-y-8">
        <!-- Icon with animation -->
        <div class="flex justify-center">
            <i class="fas fa-cog fa-6x text-blue-600 animate-spin-slow"></i>
        </div>

        <!-- Main heading -->
        <h1 class="text-5xl md:text-6xl font-bold text-gray-800 tracking-tight">
            Coming Soon
        </h1>

        <!-- Subtitle -->
        <p class="text-xl text-gray-600 mt-4">
            We're working hard to bring you something awesome.<br>
            Stay tuned — launching very soon!
        </p>

        <!-- Optional subtle message or CTA -->
        <div class="mt-10">
            <p class="text-gray-500">
                Thank you for your patience.
            </p>
        </div>

        <!-- Optional back button -->
        <div class="mt-12">
            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors shadow-md">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Dashboard
            </a>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    @keyframes spin-slow {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
    .animate-spin-slow {
        animation: spin-slow 8s linear infinite;
    }
</style>
@endpush