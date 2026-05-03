@extends('admin.layouts.app')

@section('title', 'Edit ' . ($user->name ?? $user->first_name . ' ' . $user->last_name))

@section('content')
<div class="max-w-5xl mx-auto space-y-8">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">
            Edit {{ $user->first_name }} {{ $user->last_name }}
        </h1>
        <a href="{{ route('admin.users.show', $user) }}"
           class="px-5 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-gray-800">
            ← Back to Profile
        </a>
    </div>

    <!-- Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-center">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded text-center">
            {{ session('error') }}
        </div>
    @endif
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <form method="POST" action="{{ route('admin.users.update', $user) }}"
          class="bg-white border rounded-xl shadow p-8 space-y-6">
        @csrf @method('PUT')

        <div class="grid md:grid-cols-2 gap-6">

            <!-- Personal Info -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password (leave blank to keep current)</label>
                <input type="text" name="password" placeholder="••••••••"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Financial -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Trading Balance</label>
                <input type="number" step="0.01" name="trading_balance" value="{{ old('trading_balance', $user->trading_balance) }}" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Fixed Deposit</label>
                <input type="number" step="0.01" name="locked_funds" value="{{ old('locked_funds', $user->locked_funds ?? 0) }}" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Plan</label>
                <select name="plan" required class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="BASIC"    {{ old('plan', $user->plan) === 'BASIC'    ? 'selected' : '' }}>BASIC (10,000)</option>
                    <option value="SILVER"   {{ old('plan', $user->plan) === 'SILVER'   ? 'selected' : '' }}>SILVER (25,000)</option>
                    <option value="GOLD"     {{ old('plan', $user->plan) === 'GOLD'     ? 'selected' : '' }}>GOLD (50,000)</option>
                    <option value="DIAMOND"  {{ old('plan', $user->plan) === 'DIAMOND'  ? 'selected' : '' }}>DIAMOND (200,000)</option>
                    <option value="PLATINUM" {{ old('plan', $user->plan) === 'PLATINUM' ? 'selected' : '' }}>PLATINUM (500,000)</option>
                    <option value="CUSTOM"   {{ old('plan', $user->plan) === 'CUSTOM'   ? 'selected' : '' }}>CUSTOM</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Currency</label>
                <select name="currency" required class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="USD" {{ old('currency', $user->currency) === 'USD' ? 'selected' : '' }}>USD</option>
                    <option value="GBP" {{ old('currency', $user->currency) === 'GBP' ? 'selected' : '' }}>GBP</option>
                    <option value="EUR" {{ old('currency', $user->currency) === 'EUR' ? 'selected' : '' }}>EUR</option>
                    <option value="AUD" {{ old('currency', $user->currency) === 'AUD' ? 'selected' : '' }}>AUD</option>
                </select>
            </div>

            <!-- Personal / Address -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                <input type="date" name="dob" value="{{ old('dob', $user->dob) }}"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mobile Number</label>
                <input type="text" name="mobile_number" value="{{ old('mobile_number', $user->mobile_number) }}"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                <input type="text" name="country" value="{{ old('country', $user->country) }}"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">State</label>
                <input type="text" name="state" value="{{ old('state', $user->state) }}"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                <input type="text" name="city" value="{{ old('city', $user->city) }}"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Post Code</label>
                <input type="text" name="post_code" value="{{ old('post_code', $user->post_code) }}"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Street Address</label>
                <input type="text" name="street_address" value="{{ old('street_address', $user->street_address) }}"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Timestamps (read-only or editable) -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Created At</label>
                <input type="datetime-local" name="created_at" value="{{ old('created_at', $user->created_at->format('Y-m-d\TH:i')) }}"
                       class="w-full border rounded-lg px-4 py-3 bg-gray-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Updated At</label>
                <input type="datetime-local" name="updated_at" value="{{ old('updated_at', now()->format('Y-m-d\TH:i')) }}"
                       class="w-full border rounded-lg px-4 py-3 bg-gray-50">
            </div>

        </div>

        <!-- Submit -->
        <div class="pt-6 border-t">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg transition">
                Update User Details
            </button>
        </div>
    </form>

</div>
@endsection