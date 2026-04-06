@extends('admin.layouts.app')

@section('title', 'Edit Trade')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">
                Edit {{ $trade->type }} {{ $trade->symbol }} ({{ number_format($trade->investment, 2) }})
            </h1>
            <a href="{{ route('admin.users.trades.index', $user) }}"
               class="px-5 py-3 bg-gray-200 hover:bg-gray-300 rounded-lg transition">
                ← Back
            </a>
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

        <!-- Main Edit Form -->
        <form method="POST" action="{{ route('admin.users.trades.update', [$user, $trade]) }}"
              class="bg-white rounded-xl shadow p-8 space-y-6 mb-8">
            @csrf @method('PUT')

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Investment</label>
                    <input type="number" step="0.01" name="investment" value="{{ old('investment', $trade->investment) }}" required
                           class="w-full border rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Profit</label>
                    <input type="number" step="0.01" name="profit" value="{{ old('profit', $trade->profit ?? 0) }}" required
                           class="w-full border rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">Date Opened</label>
                    <input type="datetime-local" name="created_at" value="{{ old('created_at', $trade->created_at->format('Y-m-d\TH:i')) }}"
                           required class="w-full border rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div class="flex gap-4 pt-6">
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-medium transition">
                    Update Trade
                </button>
            </div>
        </form>

        <!-- Separate Close Trade Section (only shown if trade is OPEN) -->
        @if($trade->status === 'OPEN')
            <div class="bg-white rounded-xl shadow p-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Close Trade</h2>
                <p class="text-gray-600 mb-6">
                    Closing this trade will add the investment + profit back to the user's trading balance.
                </p>

                <form action="{{ route('admin.users.trades.close', [$user, $trade]) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to close this trade? This action will update the balance.');">
                    @csrf

                    <!-- Optional: You can pre-fill or show current values for reference -->
                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium mb-2">Current Investment</label>
                            <input type="text" value="{{ number_format($trade->investment, 2) }}" disabled
                                   class="w-full border rounded-lg px-4 py-3 bg-gray-100 cursor-not-allowed">

                                   
                            <input type="text" name="investment" value="{{ $trade->investment }}" hidden>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Expected Profit</label>
                            <input type="number" step="0.01" name="profit" value="{{ old('profit', $trade->profit ?? 0) }}" required
                                   class="w-full border rounded-lg px-4 py-3 focus:ring-red-500 focus:border-red-500">
                        </div>
                    </div>

                    <button type="submit"
                            class="w-full flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg font-medium transition">
                        <i class="fas fa-times"></i> End & Close Trade
                    </button>
                </form>
            </div>
        @endif
    </div>
@endsection