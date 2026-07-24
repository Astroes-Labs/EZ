 {{-- File: resources/views/admin/users/copy-trading.blade.php  --}}
@extends('admin.layouts.app')

@section('title', 'Copy Trading - ' . $user->name)

@section('content')
<div class="max-w-7xl mx-auto space-y-8">

    <!-- Header with Dynamic Back Button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Copy Trading Setup</h1>
            <p class="text-gray-600 mt-1">Manage which traders {{ $user->name }} is copying</p>
        </div>

        <!-- Dynamic Back Button -->
        @php
            $previousUrl = url()->previous();
            $backRoute = route('admin.users.show', $user);
            $backText = '← Back to User Profile';

            // Check if came from trades create page
            if (str_contains($previousUrl, route('admin.users.trades.create', $user, false))) {
                $backRoute = route('admin.users.trades.create', $user);
                $backText = '← Back to Add Trade';
            }
        @endphp

        <a href="{{ $backRoute }}"
           class="inline-flex items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition font-medium shadow-sm">
            {{ $backText }}
        </a>
    </div>

    <!-- Current Copied Traders -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-xl font-semibold text-gray-800">Currently Copied Traders</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Photo</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Win Rate</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Profit Share</th>
                        <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($copiedTraders as $trader)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ $trader->photo_url }}" alt="{{ $trader->name }}"
                                     class="h-12 w-12 rounded-full object-cover border border-gray-200">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $trader->name }}</div>
                                <div class="text-sm text-gray-500">{{ $trader->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">
                                {{ $trader->win_rate }}%
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-purple-600 font-medium">
                                {{ $trader->profit_share }}%
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <form action="{{ route('admin.users.copy-trading.destroy', [$user, $trader]) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Stop copying {{ addslashes($trader->name) }}?')">
                                        <i class="fas fa-user-minus"></i> Stop Copy
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500 italic">
                                This user is not copying any traders yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Available Traders to Copy -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-xl font-semibold text-gray-800">Available Traders to Copy</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Photo</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Win Rate</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Profit Share</th>
                        <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($allTraders as $trader)
                        @if(!$copiedTraders->contains($trader->id))
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ $trader->photo_url }}" alt="{{ $trader->name }}"
                                         class="h-12 w-12 rounded-full object-cover border border-gray-200">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $trader->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $trader->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">
                                    {{ $trader->win_rate }}%
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-purple-600 font-medium">
                                    {{ $trader->profit_share }}%
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <form action="{{ route('admin.users.copy-trading.store', $user) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="trader_id" value="{{ $trader->id }}">
                                        <button type="submit" class="text-green-600 hover:text-green-900">
                                            <i class="fas fa-user-plus"></i> Start Copy
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500 italic">
                                No available traders to copy.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection