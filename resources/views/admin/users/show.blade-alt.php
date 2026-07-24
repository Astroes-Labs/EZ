 {{-- File: resources/views/admin/users/show.blade.php --}}
 @extends('admin.layouts.app')

@section('title', $user->name . ' | Profile')

@section('content')
<div class="max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
        <div>
            <h1 class="text-4xl font-bold text-gray-900">{{ $user->name ?? $user->first_name . ' ' . $user->last_name }}</h1>
            <p class="text-gray-600 mt-2">User ID: {{ $user->id }}</p>
        </div>

        <div class="flex flex-wrap gap-4">
            <a href="{{ route('admin.users.deposits.index', $user) }}"
               class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow transition">
                Deposits
            </a>
            <a href="{{ route('admin.users.withdrawals.index', $user) }}"
               class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow transition">
                Withdrawals
            </a>
            <!-- Placeholder links -->
            <a href="#" class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg shadow transition">
                Trades
            </a>
            <a href="#" class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg shadow transition">
                Add Locked Interest
            </a>
            <a href="#" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow transition">
                Send Email
            </a>
            <a href="#" class="px-6 py-3 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg shadow transition">
                Update Details
            </a>
        </div>
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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Left Column: Avatar + KYC Images + Actions -->
        <div class="lg:col-span-1 space-y-8">

            <!-- Profile Picture -->
            <div class="bg-white rounded-xl shadow p-6 text-center">
                <img src="{{ $user->photo_profile ? asset('storage/' . $user->photo_profile) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'User') . '&background=random' }}"
                     alt="Profile"
                     class="w-40 h-40 mx-auto rounded-full object-cover border-4 border-gray-200 shadow-lg">
                <h3 class="mt-4 text-xl font-semibold">{{ $user->name }}</h3>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>

            <!-- KYC Documents -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">KYC Documents</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600 mb-2">Front View</p>
                        <img src="{{ $user->photo_front_view ? asset('storage/' . $user->photo_front_view) : 'https://via.placeholder.com/300x200?text=No+Front+ID' }}"
                             alt="Front ID"
                             class="w-full rounded-lg shadow border">
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-2">Back View</p>
                        <img src="{{ $user->photo_back_view ? asset('storage/' . $user->photo_back_view) : 'https://via.placeholder.com/300x200?text=No+Back+ID' }}"
                             alt="Back ID"
                             class="w-full rounded-lg shadow border">
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow p-6 space-y-4">
                <h3 class="text-lg font-semibold">Quick Actions</h3>

                <!-- Account Verification -->
                <form action="{{ route('admin.users.toggle-verification', $user) }}" method="POST">
                    @csrf
                    <input type="hidden" name="field" value="identity_verified">
                    <input type="hidden" name="status" value="{{ $user->identity_verified ? 0 : 1 }}">

                    @if($user->identity_verified)
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg">
                            Deactivate Account
                        </button>
                    @else
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg">
                            Activate Account
                        </button>
                    @endif
                </form>

                <!-- KYC Verification -->
                <form action="{{ route('admin.users.toggle-verification', $user) }}" method="POST">
                    @csrf
                    <input type="hidden" name="field" value="account_verified">
                    <input type="hidden" name="status" value="{{ $user->account_verified ? 0 : 1 }}">

                    @if($user->account_verified)
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg">
                            Unverify KYC
                        </button>
                    @else
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg">
                            Verify KYC
                        </button>
                    @endif
                </form>

                <!-- Delete User -->
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full bg-red-800 hover:bg-red-900 text-white py-3 rounded-lg">
                        Delete User
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Column: User Details Table -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <div class="p-6 border-b">
                    <h2 class="text-2xl font-semibold">User Information</h2>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">ID</p>
                                <p class="text-lg">{{ $user->id }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">Country</p>
                                <p class="text-lg">{{ $user->country ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">Email</p>
                                <p class="text-lg">{{ $user->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">Trading Balance</p>
                                <p class="text-lg font-bold">{{ $user->currency ?? '$' }} {{ number_format($user->trading_balance ?? 0, 2) }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">Fixed Deposit</p>
                                <p class="text-lg">{{ $user->currency ?? '$' }} {{ number_format($user->locked_funds ?? 0, 2) }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">Pending Deposits</p>
                                <p class="text-lg text-amber-600">{{ $user->deposits()->where('status', 'Pending')->count() }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">Pending Withdrawals</p>
                                <p class="text-lg text-red-600">{{ $user->withdrawals()->where('status', 'Pending')->count() }}</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">First Name</p>
                                <p class="text-lg">{{ $user->first_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">Last Name</p>
                                <p class="text-lg">{{ $user->last_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">Date of Birth</p>
                                <p class="text-lg">{{ $user->dob ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">Mobile Number</p>
                                <p class="text-lg">{{ $user->mobile_number ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">Identity Verified</p>
                                <p class="text-lg {{ $user->identity_verified ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $user->identity_verified ? 'Yes' : 'No' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">Account (KYC) Verified</p>
                                <p class="text-lg {{ $user->account_verified ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $user->account_verified ? 'Yes' : 'No' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase">Created At</p>
                                <p class="text-lg">{{ $user->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection