{{-- resources/views/admin/users/show.blade.php --}}
@extends('admin.layouts.app')

@section('title', $user->name . ' | Profile')

@section('content')
    <div class="max-w-6xl mx-auto space-y-8">

        <!-- Header with Title & Quick Actions -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">
                    {{ $user->name ?? $user->first_name . ' ' . $user->last_name }}
                </h1>
                <p class="text-sm text-gray-500 mt-1">User ID: {{ $user->id }}</p>
            </div>

            <!-- Quick Access Buttons -->
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.users.deposits.index', $user) }}"
                   class="inline-flex items-center px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg transition font-medium shadow-sm">
                    <i class="fas fa-plus mr-2"></i> Deposits
                </a>

                <a href="{{ route('admin.users.withdrawals.index', $user) }}"
                   class="inline-flex items-center px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-lg transition font-medium shadow-sm">
                    <i class="fas fa-minus mr-2"></i> Withdrawals
                </a>

                <a href="{{ route('admin.users.trades.index', $user) }}"
                   class="inline-flex items-center px-5 py-2.5 border border-gray-300 hover:bg-gray-50 text-gray-700 rounded-lg transition font-medium">
                    <i class="fas fa-chart-line mr-2"></i> Trades
                </a>

                <a href="{{ route('admin.users.copy-trading', $user) }}"
                   class="inline-flex items-center px-5 py-2.5 border border-indigo-300 hover:bg-indigo-50 text-indigo-700 rounded-lg transition font-medium">
                    <i class="fas fa-copy mr-2"></i> Copy Trading
                </a>

                <a href="{{ route('admin.users.locked-funds', $user) }}"
                   class="inline-flex items-center px-5 py-2.5 border border-purple-300 hover:bg-purple-50 text-purple-700 rounded-lg transition font-medium">
                    <i class="fas fa-lock mr-2"></i> Fixed Deposit
                </a>
            </div>
        </div>

        <!-- Profile Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden relative">

            <!-- Edit Button (top-right) -->
            <a href="{{ route('admin.users.edit', $user) }}"
               class="absolute top-6 right-6 text-gray-500 hover:text-indigo-600 hover:bg-indigo-50 p-2 rounded-full transition"
               title="Edit User Profile">
                <i class="fas fa-pen text-lg"></i>
            </a>

            <div class="p-8">
                <div class="grid md:grid-cols-3 gap-10">

                    <!-- Avatar & Status -->
                    <div class="flex flex-col items-center text-center">
                        <img src="{{ $user->photo_profile ? asset('storage/' . $user->photo_profile) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'User') . '&background=random' }}"
                             class="w-32 h-32 rounded-full object-cover border-4 border-gray-100 shadow-md">

                        <p class="mt-5 font-semibold text-lg text-gray-900">{{ $user->email }}</p>

                        <div class="mt-4 text-sm space-y-2">
                            <p class="flex items-center gap-2 justify-center">
                                <span class="text-gray-500">Identity:</span>
                                <span class="{{ $user->identity_verified ? 'text-green-600 font-medium' : 'text-red-600' }}">
                                    {{ $user->identity_verified ? 'Verified' : 'Not Verified' }}
                                </span>
                            </p>
                            <p class="flex items-center gap-2 justify-center">
                                <span class="text-gray-500">KYC:</span>
                                <span class="{{ $user->account_verified ? 'text-green-600 font-medium' : 'text-red-600' }}">
                                    {{ $user->account_verified ? 'Verified' : 'Not Verified' }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- User Details -->
                    <div class="md:col-span-2 grid md:grid-cols-2 gap-x-12 gap-y-6 text-sm">

                        <div>
                            <p class="text-gray-500">First Name</p>
                            <p class="font-medium text-gray-900 mt-1">{{ $user->first_name ?? '—' }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">Last Name</p>
                            <p class="font-medium text-gray-900 mt-1">{{ $user->last_name ?? '—' }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">Country</p>
                            <p class="font-medium text-gray-900 mt-1">{{ $user->country ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">Mobile</p>
                            <p class="font-medium text-gray-900 mt-1">{{ $user->mobile_number ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">Date of Birth</p>
                            <p class="font-medium text-gray-900 mt-1">{{ $user->dob ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">Joined</p>
                            <p class="font-medium text-gray-900 mt-1">{{ $user->created_at->format('d M Y') }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">Trading Balance</p>
                            <p class="font-semibold text-green-700 mt-1">
                                {{ $user->currency ?? '$' }} {{ number_format($user->trading_balance ?? 0, 2) }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500">Fixed Deposit</p>
                            <p class="font-semibold text-purple-700 mt-1">
                                {{ $user->currency ?? '$' }} {{ number_format($user->locked_funds ?? 0, 2) }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500">Pending Deposits</p>
                            <p class="font-medium text-amber-600 mt-1">
                                {{ $user->deposits()->where('status', 'Pending')->count() }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500">Pending Withdrawals</p>
                            <p class="font-medium text-red-600 mt-1">
                                {{ $user->withdrawals()->where('status', 'Pending')->count() }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- KYC Documents -->
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-6">KYC Documents</h2>

            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <p class="text-sm text-gray-500 mb-3 font-medium">Front ID</p>
                    <img src="{{ $user->photo_front_view ? asset('storage/' . $user->photo_front_view) : 'https://via.placeholder.com/500x300?text=No+Front+ID' }}"
                         class="rounded-lg border border-gray-200 shadow-sm w-full object-cover">
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-3 font-medium">Back ID</p>
                    <img src="{{ $user->photo_back_view ? asset('storage/' . $user->photo_back_view) : 'https://via.placeholder.com/500x300?text=No+Back+ID' }}"
                         class="rounded-lg border border-gray-200 shadow-sm w-full object-cover">
                </div>
            </div>
        </div>

        <!-- Danger Actions -->
        <div class="flex flex-wrap gap-4 bg-white rounded-xl shadow-lg p-6 border-t-4 border-red-500">
            <form action="{{ route('admin.users.toggle-verification', $user) }}" method="POST" class="inline">
                @csrf
                <input type="hidden" name="field" value="identity_verified">
                <input type="hidden" name="status" value="{{ $user->identity_verified ? 0 : 1 }}">
                <button type="submit"
                        class="px-6 py-3 text-sm font-medium rounded-lg transition
                              {{ $user->identity_verified ? 'bg-yellow-100 text-yellow-800 hover:bg-yellow-200' : 'bg-green-600 text-white hover:bg-green-700' }}">
                    {{ $user->identity_verified ? 'Deactivate Identity' : 'Verify Identity' }}
                </button>
            </form>

            <form action="{{ route('admin.users.toggle-verification', $user) }}" method="POST" class="inline">
                @csrf
                <input type="hidden" name="field" value="account_verified">
                <input type="hidden" name="status" value="{{ $user->account_verified ? 0 : 1 }}">
                <button type="submit"
                        class="px-6 py-3 text-sm font-medium rounded-lg transition
                              {{ $user->account_verified ? 'bg-yellow-100 text-yellow-800 hover:bg-yellow-200' : 'bg-green-600 text-white hover:bg-green-700' }}">
                    {{ $user->account_verified ? 'Unverify KYC' : 'Verify KYC' }}
                </button>
            </form>

            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline"
                  onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                @csrf @method('DELETE')
                <button type="submit"
                        class="px-6 py-3 text-sm font-medium bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    Delete User
                </button>
            </form>
        </div>

    </div>
@endsection