 {{-- resources/views/admin/deposits/edit.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Update Deposit')

@section('content')
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold mb-8">Update Deposit</h1>

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
        <div class="mb-8">
            <h2 class="text-xl font-semibold">Deposit Details</h2>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p><strong>User:</strong> {{ $user->name }}</p>
                    <p><strong>Amount:</strong> {{ number_format($deposit->amount, 2) }} {{ $deposit->currency }}</p>
                    <p><strong>Crypto:</strong> {{ $deposit->crypto_currency ?? '—' }}</p>
                    <p><strong>Created:</strong> {{ $deposit->created_at->format('d M Y H:i') }}</p>
                </div>
                <div>
                    <p><strong>Current Status:</strong> <span class="font-bold">{{ $deposit->status }}</span></p>
                    <p><strong>Updated:</strong> {{ $deposit->updated_at->format('d M Y H:i') }}</p>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.users.deposits.update', [$user, $deposit]) }}" class="space-y-6 max-w-lg">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" required class="w-full px-5 py-4 border border-gray-300 rounded-lg">
                    <option value="Pending" {{ $deposit->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Confirmed" {{ $deposit->status === 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="Failed" {{ $deposit->status === 'Failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Amount ({{ $deposit->currency }})</label>
                <input type="number" name="amount" step="0.01" value="{{ $deposit->amount }}" required
                       class="w-full px-5 py-4 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Crypto Currency (optional)</label>
                <input type="text" name="crypto_currency" value="{{ $deposit->crypto_currency ?? '' }}"
                       class="w-full px-5 py-4 border border-gray-300 rounded-lg uppercase">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-4 rounded-lg transition">
                Update Deposit
            </button>
        </form>
    </div>
</div>
@endsection