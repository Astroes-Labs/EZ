<!-- File: resources/views/admin/withdrawals/edit.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Edit Withdrawal #' . $withdrawal->id . ' - ' . $user->name)

@section('content')
<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Edit Withdrawal Record</h1>
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

    <form method="POST" action="{{ route('admin.users.withdrawals.update', [$user, $withdrawal]) }}"
          class="bg-white rounded-xl shadow p-8 space-y-6">

        @csrf @method('PUT')

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium mb-2">Amount</label>
                <input type="number" name="amount" step="0.01" min="0.01" required value="{{ old('amount', $withdrawal->amount) }}"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Currency</label>
                <input type="text" name="currency" required value="{{ old('currency', $withdrawal->currency) }}"
                       class="w-full border rounded-lg px-4 py-3 uppercase focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">From Balance</label>
                <select name="from" required class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="trading" {{ $withdrawal->from === 'trading' ? 'selected' : '' }}>Trading Balance</option>
                    <option value="locked" {{ $withdrawal->from === 'locked' ? 'selected' : '' }}>Locked Funds</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Status</label>
                <select name="status" required class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="Pending" {{ $withdrawal->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Confirmed" {{ $withdrawal->status === 'Confirmed' ? 'selected' : '' }}>Completed</option>
                    <option value="Failed" {{ $withdrawal->status === 'Failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Wallet Address</label>
                <input type="text" name="wallet_address" required value="{{ old('wallet_address', $withdrawal->wallet_address) }}"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Payment Method</label>
                <select name="payment_method" required class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="BTC" {{ $withdrawal->payment_method === 'BTC' ? 'selected' : '' }}>Bitcoin</option>
                    <option value="ETH" {{ $withdrawal->payment_method === 'ETH' ? 'selected' : '' }}>Ethereum</option>
                    <option value="USDT" {{ $withdrawal->payment_method === 'USDT' ? 'selected' : '' }}>USDT</option>
                    <option value="XRP" {{ $withdrawal->payment_method === 'XRP' ? 'selected' : '' }}>Ripple</option>
                    <option value="DOGE" {{ $withdrawal->payment_method === 'DOGE' ? 'selected' : '' }}>Dogecoin</option>
                    <option value="BNB" {{ $withdrawal->payment_method === 'BNB' ? 'selected' : '' }}>Binance Coin</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Created At</label>
                <input type="datetime-local" name="created_at" required
                       value="{{ old('created_at', $withdrawal->created_at->format('Y-m-d\TH:i')) }}"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition">
                Update Withdrawal
            </button>
        </div>
    </form>

</div>
@endsection