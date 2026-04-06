{{-- resources\views\admin\withdrawals\all-index.blade.php  --}}

@extends('admin.layouts.app')

@section('title', 'All Withdrawals')

@section('content')
<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">All Withdrawals</h1>
            <p class="text-gray-600 mt-1">Overview of all withdrawal requests across all users</p>
        </div>
        <div class="text-sm text-gray-500">
            Total: {{ $withdrawals->count() }}
        </div>
    </div>

    <!-- Session Messages -->
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
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Currency</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($withdrawals as $wd)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-5 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover"
                                             src="https://ui-avatars.com/api/?name={{ urlencode($wd->user->name ?? 'User') }}&background=random"
                                             alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $wd->user->name ?? 'Unknown' }}
                                        </div>
                                        <div class="text-sm text-gray-500">{{ $wd->user->email ?? '—' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-lg font-medium {{ $wd->status === 'Confirmed' ? 'text-green-600' : ($wd->status === 'Failed' ? 'text-red-600' : 'text-amber-600') }}">
                                {{ number_format($wd->amount, 2) }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-gray-700">{{ $wd->currency }}</td>
                            <td class="px-6 py-5 whitespace-nowrap">
                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                                    {{ $wd->status === 'Confirmed' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $wd->status === 'Pending'   ? 'bg-amber-100 text-amber-800' : '' }}
                                    {{ $wd->status === 'Failed'    ? 'bg-red-100   text-red-800'   : '' }}">
                                    {{ $wd->status }}
                                </span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-600">
                                {{ $wd->created_at->format('d M Y H:i') }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.withdrawals.edit', $wd) }}"
                                   class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                No withdrawals found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection