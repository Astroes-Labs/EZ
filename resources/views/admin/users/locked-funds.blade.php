 {{-- File: resources/views/admin/users/locked-funds.blade.php  --}}
@extends('admin.layouts.app')

@section('title', 'Locked Funds - ' . $user->name)

@section('content')
<div class="max-w-4xl mx-auto space-y-8">

    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Locked Funds Management</h1>
            <p class="text-gray-600 mt-1">Move funds from trading balance to locked funds with expiration</p>
        </div>
        <a href="{{ route('admin.users.show', $user) }}"
           class="px-6 py-3 bg-gray-200 hover:bg-gray-300 rounded-lg transition">
            ← Back to User Profile
        </a>
    </div>

    <!-- Current Status -->
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Current Locked Funds</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <div>
                <p class="text-sm text-gray-500">Locked Amount</p>
                <p class="text-2xl font-bold text-indigo-600">{{ number_format($user->locked_funds ?? 0, 2) }} USD</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Expires At</p>
                <p class="text-lg font-medium">
                    {{ $user->login_code_expires_at ? $user->login_code_expires_at->format('M d, Y H:i') : 'No lock active' }}
                </p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Trading Balance</p>
                <p class="text-lg font-medium">{{ number_format($user->trading_balance ?? 0, 2) }} USD</p>
            </div>
        </div>
    </div>

    <!-- Form to Lock Funds -->
    <form method="POST" action="{{ route('admin.users.locked-funds.store', $user) }}"
          class="bg-white rounded-xl shadow p-8 space-y-6">

        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium mb-2">Amount to Lock (USD)</label>
                <input type="number" name="amount" step="0.01" min="0.01" max="{{ $user->trading_balance ?? 0 }}" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Lock Duration (days)</label>
                <input type="number" name="days" min="1" max="365" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="e.g. 30">
            </div>
        </div>

        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg font-medium transition shadow">
            Lock Funds
        </button>
    </form>

    <p class="text-center text-gray-500 text-sm mt-6">
        Note: Locked funds will be unavailable until the expiration date. You can add unlock logic later.
    </p>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mt-6">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-6">
            {{ session('error') }}
        </div>
    @endif
</div>
@endsection