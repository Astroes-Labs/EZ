<!-- File: resources/views/admin/withdrawals/create.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Add Withdrawal - ' . $user->name)

@section('content')
<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Add New Withdrawal for {{ $user->name }}</h1>
        <a href="{{ route('admin.users.withdrawals.index', $user) }}"
           class="px-6 py-3 bg-gray-200 hover:bg-gray-300 rounded-lg transition">
            ← Back
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.users.withdrawals.store', $user) }}"
          class="bg-white rounded-xl shadow p-8 space-y-6">

        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium mb-2">Amount</label>
                <input type="number" name="amount" step="0.01" min="0.01" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Currency</label>
                <input type="text" name="currency" value="USD" maxlength="10" required
                       class="w-full border rounded-lg px-4 py-3 uppercase focus:ring-red-500 focus:border-red-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">From Balance</label>
                <select name="from" required class="w-full border rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500">
                    <option value="trading">Trading Balance ({{ number_format($user->trading_balance ?? 0, 2) }} USD)</option>
                    <option value="locked">Fixed Deposit ({{ number_format($user->locked_funds ?? 0, 2) }} USD)</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Status</label>
                <select name="status" required class="w-full border rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500">
                    <option value="Pending">Pending</option>
                    <option value="Confirmed">Completed</option>
                    <option value="Failed">Failed</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Wallet Address</label>
                <input type="text" name="wallet_address" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500"
                       placeholder="Enter recipient wallet address">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Payment Method</label>
                <select name="payment_method" required class="w-full border rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500">
                    <option value="">-- Select Method --</option>
                    <option value="BTC">Bitcoin</option>
                    <option value="ETH">Ethereum</option>
                    <option value="USDT">USDT</option>
                    <option value="XRP">Ripple</option>
                    <option value="DOGE">Dogecoin</option>
                    <option value="BNB">Binance Coin</option>
                </select>
            </div>
        </div>

        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg font-medium transition shadow">
            Add Withdrawal Request
        </button>
    </form>

    <p class="text-center text-gray-500 text-sm mt-6">
        Note: If status is "Completed", the amount will be deducted from the selected balance immediately.
    </p>
</div>
@endsection