@extends('admin.layouts.app')

@section('title', 'Deposits - ' . $user->name)

@section('content')
    <div class="max-w-7xl mx-auto space-y-8">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Deposits for {{ $user->name }}</h1>
                <p class="text-gray-600 mt-2">
                    Trading Balance:
                    <span class="font-semibold text-green-600">
                        {{ number_format($tradingBalance, 2) }} {{ $user->currency ?? 'USD' }}
                    </span>
                </p>
                <div>
                    <p class="text-gray-600 mt-1">
                        <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:underline">Users</a> →
                        <a href="{{ route('admin.users.show', $user) }}"
                            class="text-blue-600 hover:underline">{{ $user->name }}</a> →
                        Deposits
                    </p>
                </div>
            </div>

            <a href="{{ route('admin.users.deposits.create', $user) }}"
                class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow transition">
                <i class="fas fa-plus mr-2"></i> Add Deposit
            </a>
        </div>

        {{-- Messages --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold text-gray-800">Deposit History</h2>
            </div>

            <div class="overflow-x-auto">
                <table id="depositsTable" class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Crypto</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @forelse($deposits as $dep)

                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    {{-- {{ $dep->id }} --}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold
                                    {{ $dep->status === 'Confirmed' ? 'text-green-600' : '' }}
                                    {{ $dep->status === 'Pending' ? 'text-yellow-600' : '' }}
                                    {{ $dep->status === 'Failed' ? 'text-red-600' : '' }}">
                                    {{ number_format($dep->price, 2) }} {{ $dep->currency }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    {{ $dep->crypto_currency ?? '—' }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">

                                    @if($dep->status === 'Confirmed')
                                        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                            Confirmed
                                        </span>

                                    @elseif($dep->status === 'Pending')
                                        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                            Pending
                                        </span>

                                    @else
                                        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">
                                            Failed
                                        </span>
                                    @endif

                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $dep->created_at->format('M d, Y H:i') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center">

                                    <a href="{{ route('admin.users.deposits.edit', [$user, $dep]) }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.users.deposits.destroy', [$user, $dep]) }}" method="POST"
                                        class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Delete this deposit record?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center text-gray-500 italic">
                                    No deposit records found.
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

            $('#depositsTable').DataTable({
                responsive: true,
                ordering: false,
                pageLength: 10,
                language: {
                    search: "Filter:"
                }
            });

        });
    </script>
@endpush