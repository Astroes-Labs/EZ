<!-- File: resources/views/admin/withdrawals/user-index.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Withdrawals - ' . $user->name)

@section('content')
    <div class="max-w-7xl mx-auto space-y-8">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Withdrawals for {{ $user->name }}</h1>
                <p class="text-gray-600 mt-2">
                    Trading Balance: <span class="font-semibold text-green-600">{{ number_format($tradingBalance, 2) }}
                        USD</span>
                </p>
                <div>
                    <p class="text-gray-600 mt-1">
                        <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:underline">Users</a> →
                        <a href="{{ route('admin.users.show', $user) }}"
                            class="text-blue-600 hover:underline">{{ $user->name }}</a> →
                        Withdrawals
                    </p>
                </div>
            </div>
            <a href="{{ route('admin.users.withdrawals.create', $user) }}"
                class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow transition">
                <i class="fas fa-plus mr-2"></i> Add Withdrawal
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">{{ session('error') }}</div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold text-gray-800">Withdrawal History</h2>
            </div>
            <div class="overflow-x-auto">
                <table id="withdrawalsTable" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">From</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Method</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Wallet</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($withdrawals as $withdrawal)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{-- {{ $withdrawal->id }} --}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    {{ number_format($withdrawal->amount, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ ucfirst($withdrawal->from) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $withdrawal->payment_method }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-600">
                                    {{ $withdrawal->wallet_address }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($withdrawal->status === 'Confirmed')
                                        <span
                                            class="px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Completed</span>
                                    @elseif($withdrawal->status === 'Pending')
                                        <span
                                            class="px-2.5 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                    @else
                                        <span
                                            class="px-2.5 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">Failed</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $withdrawal->created_at->format('M d, Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <a href="{{ route('admin.users.withdrawals.edit', [$user, $withdrawal]) }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.users.withdrawals.destroy', [$user, $withdrawal]) }}"
                                        method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Delete this withdrawal? Balance may be restored.')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-16 text-center text-gray-500 italic">
                                    No withdrawal records found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#withdrawalsTable').DataTable({
                responsive: true,
                ordering: false,
                pageLength: 10,
                language: { search: "Filter:" }
            });
        });
    </script>
@endpush