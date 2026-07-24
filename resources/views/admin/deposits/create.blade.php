{{-- resources/views/admin/deposits/create.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Add Deposit - ' . $user->name)

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Add Manual Deposit</h1>
            <a href="{{ route('admin.users.deposits.index', $user) }}"
                class="px-5 py-3 bg-gray-200 hover:bg-gray-300 rounded-lg">← Back to Deposits</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-center">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-center">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow p-8">
            <form method="POST" action="{{ route('admin.users.deposits.store', $user) }}" class="space-y-6 w-full">
                @csrf

                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Amount (in {{ $user->currency ?? 'USD' }})
                    </label>

                    <input type="number" name="amount" step="0.01" min="0.01" required value="{{ old('amount') }}"
                        class="w-full px-5 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Currency</label>

                    <input type="text" name="currency" value="{{ old('currency', $user->currency ?? 'USD') }}" required
                        class="w-full px-5 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 uppercase">
                </div>

                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Crypto Currency (optional)
                    </label>

                    <select name="crypto_currency"
                        class="w-full px-5 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">— None —</option>
                        <option value="BTC" {{ old('crypto_currency') == 'BTC' ? 'selected' : '' }}>Bitcoin (BTC)</option>
                        <option value="ETH" {{ old('crypto_currency') == 'ETH' ? 'selected' : '' }}>Ethereum (ETH)</option>
                        <option value="USDT" {{ old('crypto_currency') == 'USDT' ? 'selected' : '' }}>USDT</option>
                        <option value="XRP" {{ old('crypto_currency') == 'XRP' ? 'selected' : '' }}>Ripple (XRP)</option>
                        <option value="DOGE" {{ old('crypto_currency') == 'DOGE' ? 'selected' : '' }}>Dogecoin (DOGE)</option>
                        <option value="BNB" {{ old('crypto_currency') == 'BNB' ? 'selected' : '' }}>Binance Coin (BNB)
                        </option>
                    </select>
                </div>

                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>

                    <select name="status" required
                        class="w-full px-5 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Confirmed" {{ old('status') == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="Failed" {{ old('status') == 'Failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                </div>

                <div class="pt-4 w-full">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-4 rounded-lg transition">
                        Create Deposit Record
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection