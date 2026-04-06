{{-- resources\views\admin\trades\create.blade.php --}}

@extends('admin.layouts.app')

@section('title', 'Add Trade - ' . $user->name)

@section('content')
    <div class="max-w-4xl mx-auto space-y-10">

        <!-- Header Section -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-3">
                Add New Trade for {{ $user->name }}
            </h1>

            <!-- Copy Trading Button -->
            <a href="{{ route('admin.users.copy-trading', $user) }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-700 bg-indigo-50 border border-indigo-200 rounded-lg hover:bg-indigo-100 hover:border-indigo-300 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                title="Manage which traders this user is copying">
                <i class="fas fa-copy mr-2"></i>
                Manage Copy Trading
            </a>
        </div>

        <!-- Back Button -->
        <div class="flex justify-end mb-8">
            <a href="{{ route('admin.users.trades.index', $user) }}"
                class="px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition">
                ← Back to Trades
            </a>
        </div>

        <!-- Messages -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Single Trade Form (unchanged) -->
        <div class="bg-white rounded-xl shadow-lg p-8 space-y-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Place Single Trade</h2>

            <form method="POST" action="{{ route('admin.users.trades.store', $user) }}" id="trade-form">
                @csrf


                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Trader</label>
                        <select name="trader" required class="w-full border border-gray-300 rounded-lg px-4 py-3 
                                                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                                           focus:outline-none transition">
                            <!-- Default / placeholder option -->
                            <option value="" disabled {{ old('trader') ? '' : 'selected' }}>
                                {{ $traders->isEmpty() ? 'No Trader Selected (User is not copying any traders)' : 'Select a Trader' }}
                            </option>

                            @forelse($traders as $trader)
                                <option value="{{ $trader->id }}" {{ old('trader') == $trader->id ? 'selected' : '' }}>
                                    {{ $trader->name }}
                                </option>
                            @empty
                                <!-- No extra options if empty - placeholder already shows message -->
                            @endforelse
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                        <select name="type" required class="w-full border border-gray-300 rounded-lg px-4 py-3 
                                                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                                           focus:outline-none transition">
                            <option value="BUY">BUY</option>
                            <option value="SELL">SELL</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Market</label>
                        <select name="market" required id="market" class="w-full border border-gray-300 rounded-lg px-4 py-3 
                                                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                                           focus:outline-none transition">
                            <option value="Forex">Forex</option>
                            <option value="Crypto">Crypto</option>
                            <option value="Stocks">Stocks</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Symbol</label>
                        <select name="sym" required id="sym" class="w-full border border-gray-300 rounded-lg px-4 py-3 uppercase 
                                                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                                           focus:outline-none transition">
                            @include('admin.trades.create.select-symbols')
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Investment</label>
                        <input type="number" step="0.01" name="inv" required value="1000" class="w-full border border-gray-300 rounded-lg px-4 py-3 
                                      focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Multiplier</label>
                        <input type="number" step="0.01" name="mult" required value="100" class="w-full border border-gray-300 rounded-lg px-4 py-3 
                                      focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Take Profit (%)</label>
                        <input type="number" step="0.01" name="tp" readonly value="200" class="w-full border border-gray-300 rounded-lg px-4 py-3 
                                      focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      focus:outline-none transition bg-gray-50 cursor-not-allowed">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Stop Loss (%)</label>
                        <input type="number" step="0.01" name="sl" readonly value="90" class="w-full border border-gray-300 rounded-lg px-4 py-3 
                                      focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      focus:outline-none transition bg-gray-50 cursor-not-allowed">
                    </div>

                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg transition mt-6">
                    Place Trade
                </button>
            </form>
        </div>

        <!-- ──────────────────────────────────────────────── -->
        <!-- Simulate Trades Form (new section) -->
        <!-- ──────────────────────────────────────────────── -->
        <div class="bg-white rounded-xl shadow-lg p-8 space-y-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Simulate Past Trades</h2>
            <p class="text-sm text-gray-600 mb-6">
                Generate realistic closed trades over a past period to increase balance and simulate activity.
            </p>

            <form method="POST" action="{{ route('admin.users.trades.simulate', $user) }}"
                onsubmit="return confirm('This will create simulated CLOSED trades and add profit to balance. Continue?');">
                @csrf

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Target Total Profit ($)</label>
                        <input type="number" name="profit_target" required min="1" step="0.01" value="4000" class="w-full border border-gray-300 rounded-lg px-4 py-3 
                                          focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                          focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Days in the Past</label>
                        <input type="number" name="days" required min="1" max="365" value="30" class="w-full border border-gray-300 rounded-lg px-4 py-3 
                                          focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                          focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Approx. Trading Days</label>
                        <input type="number" name="trade_days_count" required min="1" value="12" class="w-full border border-gray-300 rounded-lg px-4 py-3 
                                          focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                          focus:outline-none transition">
                        <p class="text-xs text-gray-500 mt-1">Trades will be randomly placed on ~this many days</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Max Investment per Trade (% of
                            balance)</label>
                        <input type="number" name="max_investment_pct" min="1" max="50" value="15" step="0.1" class="w-full border border-gray-300 rounded-lg px-4 py-3 
                                          focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                          focus:outline-none transition">
                    </div>

                </div>

                <button type="submit"
                    class="w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-3 rounded-lg transition mt-8">
                    Run Simulation
                </button>
            </form>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin/js/trades.js') }}"></script>
@endpush