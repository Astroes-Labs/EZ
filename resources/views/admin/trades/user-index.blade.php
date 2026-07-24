@extends('admin.layouts.app')

@section('title', 'Trades - ' . $user->name)

@section('content')
    <div class="max-w-7xl mx-auto">

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold">Trades</h1>
                <p class="text-gray-600 mt-1">
                    <a href="{{ route('admin.users.show', $user) }}" class="text-blue-600 hover:underline">
                        {{ $user->name }}
                    </a> → Trades
                </p>
            </div>
            <a href="{{ route('admin.users.trades.create', $user) }}"
                class="inline-flex items-center px-5 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
                <i class="fas fa-plus mr-2"></i> Add Trade
            </a>
        </div>

        <!-- Messages -->
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

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="p-6 border-b">
                <h5 class="text-xl font-semibold">
                    Balance: {{ $user->currency ?? '$' }} {{ number_format($tradingBalance, 2) }}
                </h5>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Type / Symbol</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Investment</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Profit</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Opened</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Trader</th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($trades as $trade)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="font-medium {{ $trade->type === 'BUY' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $trade->type }} {{ $trade->symbol }}
                                    </div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    {{ number_format($trade->investment, 2) }} {{ $user->currency ?? '$' }}
                                </td>
                                <td
                                    class="px-6 py-5 whitespace-nowrap {{ $trade->profit > 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ number_format($trade->profit ?? 0, 2) }} {{ $user->currency ?? '$' }}
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                                                            {{ $trade->status === 'CLOSED' ? 'bg-gray-100 text-gray-800' : 'bg-amber-100 text-amber-800' }}">
                                        {{ $trade->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-600">
                                    {{ $trade->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-600">
                                    {{ $trade->trader->name ?? 'Unknown Trader' }}
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-right text-sm">
                                    @if($trade->status === 'OPEN')
                                        {{-- <form action="{{ route('admin.users.trades.close', [$user, $trade]) }}" method="POST"
                                            class="inline" onsubmit="return confirm('Close this trade? Balance will be updated.');">
                                            @csrf
                                            <button type="submit" class="text-red-600 hover:text-orange-900">Close</button>
                                        </form> --}}
                                        <a href="{{ route('admin.users.trades.edit', [$user, $trade]) }}"
                                            class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                    @else
                                        <i class="fas fa-ban text-red-500 ml-2" title="Cancelled"></i>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500">No trades found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection