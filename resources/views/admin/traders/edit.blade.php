<!-- File: resources/views/admin/traders/edit.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Edit Trader - ' . $trader->name)

@section('content')
<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Edit Trader: {{ $trader->name }}</h1>
        <a href="{{ route('admin.traders.index') }}"
           class="px-6 py-3 bg-gray-200 hover:bg-gray-300 rounded-lg transition">
            ← Back to Traders
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.traders.update', $trader) }}"
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow p-8 space-y-6">

        @csrf @method('PUT')

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium mb-2">Name</label>
                <input type="text" name="name" value="{{ old('name', $trader->name) }}" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $trader->email) }}" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Win Rate (%)</label>
                <input type="number" name="win_rate" value="{{ old('win_rate', $trader->win_rate) }}" min="0" max="100" step="0.1" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Profit Share (%)</label>
                <input type="number" name="profit_share" value="{{ old('profit_share', $trader->profit_share) }}" min="0" max="100" step="0.1" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Description</label>
                <textarea name="description" rows="4"
                          class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $trader->description) }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Current Photo</label>
                <div class="mb-3">
                    <img src="{{ $trader->photo_url }}" alt="{{ $trader->name }}" class="h-32 w-32 rounded-full object-cover border border-gray-200">
                </div>
                <label class="block text-sm font-medium mb-2">New Photo (optional)</label>
                <input type="file" name="photo" accept="image/*"
                       class="w-full border rounded-lg px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition shadow">
                Update Trader
            </button>
        </div>
    </form>
</div>
@endsection