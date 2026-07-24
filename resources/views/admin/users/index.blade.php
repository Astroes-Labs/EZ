 {{-- File: resources/views/admin/users/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Users</h1>
            <p class="text-gray-600 mt-1">Manage all registered platform users</p>
        </div>
        <div class="flex items-center gap-3">
            <!-- Optional: Add New User button later -->
            <span class="text-sm text-gray-500">Total: {{ $users->count() }}</span>
        </div>
    </div>

    <!-- Message (Toastr already handles via session in layout) -->
    @if (session('success') || session('error'))
        <!-- Handled by Toastr in app.blade.php -->
    @endif

    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Avatar / Name</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pending Deposits</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pending Withdrawals</th>
                        <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-5 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <img class="h-12 w-12 rounded-full object-cover border-2 border-gray-200"
                                             src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random"
                                             alt="{{ $user->name }}">
                                    </div>
                                    <div class="ml-4">
                                        <a href="{{ route('admin.users.show', $user) }}"
                                           class="text-blue-600 hover:text-blue-800 font-medium">
                                            {{ $user->name ?? 'Unnamed' }}
                                        </a>
                                        <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-700">
                                {{ $user->country ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-amber-600 font-medium">
                                {{ $user->deposits()->where('status', 'pending')->count() }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-red-600 font-medium">
                                {{ $user->withdrawals()->where('status', 'pending')->count() }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-medium">
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete {{ addslashes($user->name) }}? This action cannot be undone.');"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:text-red-900 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination (if you add ->paginate(15) in controller instead of ->get()) -->
        <div class="px-6 py-4 border-t">
            {{ $users->links('pagination::tailwind') }} <!-- if paginated -->
        </div>
    </div>
</div>
@endsection