{{-- <!-- File: resources/views/admin/traders/index.blade.php --> --}}
@extends('admin.layouts.app')

@section('title', 'Traders')

@section('content')
<div class="max-w-7xl mx-auto space-y-8">

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Traders</h1>
            <p class="text-gray-600 mt-2">Manage expert traders and analysts</p>
        </div>
        <a href="{{ route('admin.traders.create') }}"
           class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow transition">
            <i class="fas fa-plus mr-2"></i> Add New Trader
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-xl font-semibold text-gray-800">All Traders</h2>
        </div>
        <div class="overflow-x-auto">
            <table id="tradersTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Photo</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Name & Details</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Win Rate</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Profit Share</th>
                        <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($traders as $trader)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ $trader->photo_url }}" alt="{{ $trader->name }}"
                                     class="h-12 w-12 rounded-full object-cover border border-gray-200">
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $trader->name }}</div>
                                <div class="text-sm text-gray-500">{{ $trader->email }}</div>
                                <div class="text-xs text-gray-600 mt-1">{{ Str::limit($trader->description, 60) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">
                                {{ $trader->win_rate }}%
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-purple-600 font-medium">
                                {{ $trader->profit_share }}%
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                <a href="{{ route('admin.traders.edit', $trader) }}"
                                   class="text-indigo-600 hover:text-indigo-900 mr-4">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.traders.destroy', $trader) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Delete this trader?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center text-gray-500 italic">
                                No traders found. Add one to get started.
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
    $(document).ready(function() {
        $('#tradersTable').DataTable({
            responsive: true,
            pageLength: 10,
            language: { search: "Filter:" }
        });
    });
</script>
@endpush