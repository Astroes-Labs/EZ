{{-- resources\views\admin\deposits\edit-global.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Update Deposit (Global)')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-8 text-gray-900">Update Deposit</h1>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center shadow-sm">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-center shadow-sm">
            {{ session('error') }}
        </div>
    @endif
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-center shadow-sm">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Deposit Card --}}
    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Deposit Details</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Left Info --}}
                <div class="space-y-3">
                    <p class="text-gray-600"><span class="font-semibold text-gray-800">User:</span> {{ $deposit->user->name ?? 'Unknown' }}</p>
                    <p class="text-gray-600"><span class="font-semibold text-gray-800">Email:</span> {{ $deposit->user->email ?? '—' }}</p>
                    <p class="text-gray-600"><span class="font-semibold text-gray-800">Amount:</span> 
                        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full font-medium">
                            {{ number_format($deposit->amount, 2) }} {{ $deposit->currency }}
                        </span>
                    </p>
                    <p class="text-gray-600"><span class="font-semibold text-gray-800">Crypto:</span> {{ $deposit->crypto_currency ?? '—' }}</p>
                    <p class="text-gray-500 text-sm"><span class="font-semibold">Created:</span> {{ $deposit->created_at->format('d M Y H:i') }}</p>
                </div>

                {{-- Right Info --}}
                <div class="space-y-3">
                    <p class="text-gray-600">
                        <span class="font-semibold text-gray-800">Current Status:</span>
                        @php
                            $statusColor = match($deposit->status) {
                                'Pending' => 'bg-yellow-100 text-yellow-800',
                                'Confirmed' => 'bg-green-100 text-green-800',
                                'Failed' => 'bg-red-100 text-red-800',
                                default => 'bg-gray-100 text-gray-800',
                            };
                        @endphp
                        <span class="px-3 py-1 rounded-full font-medium {{ $statusColor }}">
                            {{ $deposit->status }}
                        </span>
                    </p>
                    <p class="text-gray-500 text-sm"><span class="font-semibold">Last Updated:</span> {{ $deposit->updated_at->format('d M Y H:i') }}</p>
                    <p class="text-gray-600"><span class="font-semibold text-gray-800">Transaction ID:</span> 
                        <span class="text-indigo-600 font-medium">{{ $deposit->transaction_id ?? '—' }}</span>
                    </p>
                </div>
            </div>
        </div>

        {{-- Update Status Form --}}
        <form method="POST" action="{{ route('admin.deposits.update', $deposit) }}" class="space-y-6 max-w-lg">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">New Status</label>
                <select name="status" required
                        class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700">
                    <option value="Pending"   {{ $deposit->status === 'Pending'   ? 'selected' : '' }}>Pending</option>
                    <option value="Confirmed" {{ $deposit->status === 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="Failed"    {{ $deposit->status === 'Failed'    ? 'selected' : '' }}>Failed</option>
                </select>
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg transition">
                Update Status
            </button>
        </form>

        {{-- Back Button --}}
        <div class="mt-8">
            <a href="{{ route('admin.deposits.index') }}"
               class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-800 font-medium transition">
                ← Back to All Deposits
            </a>
        </div>
    </div>
</div>
@endsection