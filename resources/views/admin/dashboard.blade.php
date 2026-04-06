<!-- File: resources/views/admin/dashboard.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h2 class="text-4xl font-semibold text-gray-900">Dashboard</h2>
            <p class="text-gray-600 mt-1">Overview of your trading platform – {{ now()->format('F j, Y') }}</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Total Users -->
        <div class="bg-white rounded-3xl p-8 shadow hover:shadow-lg transition-shadow text-center">
            <p class="text-sm text-gray-500 font-medium uppercase tracking-wide">Total Users</p>
            <p class="text-5xl font-bold text-gray-900 mt-4">{{ $totalUsers }}</p>
            <p class="text-sm text-gray-500 mt-1">
                @if($newUsersToday > 0)
                    +{{ $newUsersToday }} today
                @endif
            </p>
            <div class="mt-6 text-emerald-500 opacity-90">
                <i class="fas fa-users fa-4x"></i>
            </div>
        </div>

        <!-- Pending Deposits -->
        <div class="bg-white rounded-3xl p-8 shadow hover:shadow-lg transition-shadow text-center">
            <p class="text-sm text-gray-500 font-medium uppercase tracking-wide">Pending Deposits</p>
            <p class="text-5xl font-bold text-amber-600 mt-4">{{ $pendingDeposits }}</p>
            @if($pendingDeposits > 0)
            <p class="text-sm text-amber-700 mt-1 font-medium">
                Awaiting approval
            </p>
            @endif
            <div class="mt-6 text-amber-500 opacity-90">
                <i class="fas fa-money-bill-wave fa-4x"></i>
            </div>
        </div>

        <!-- Pending Withdrawals -->
        <div class="bg-white rounded-3xl p-8 shadow hover:shadow-lg transition-shadow text-center">
            <p class="text-sm text-gray-500 font-medium uppercase tracking-wide">Pending Withdrawals</p>
            <p class="text-5xl font-bold text-red-600 mt-4">{{ $pendingWithdrawals }}</p>
            @if($pendingWithdrawals > 0)
            <p class="text-sm text-red-700 mt-1 font-medium">
                Requires review
            </p>
            @endif
            <div class="mt-6 text-red-500 opacity-90">
                <i class="fas fa-hand-holding-usd fa-4x"></i>
            </div>
        </div>

        <!-- Active Trades -->
        <div class="bg-white rounded-3xl p-8 shadow hover:shadow-lg transition-shadow text-center">
            <p class="text-sm text-gray-500 font-medium uppercase tracking-wide">Active Trades</p>
            <p class="text-5xl font-bold text-blue-600 mt-4">{{ $activeTrades }}</p>
            <p class="text-sm text-gray-500 mt-1">
                Currently open
            </p>
            <div class="mt-6 text-blue-500 opacity-90">
                <i class="fas fa-chart-line fa-4x"></i>
            </div>
        </div>
    </div>

    <!-- Optional: small footer note -->
    <div class="mt-16 text-center text-gray-400 text-sm">
        More detailed analytics, charts, recent activity and quick actions coming in next updates.
    </div>
</div>
@endsection