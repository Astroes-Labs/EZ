<!-- File: resources/views/admin/traders/create.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Add New Trader')

@section('content')
<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Add New Trader</h1>
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

    <form method="POST" action="{{ route('admin.traders.store') }}"
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow p-8 space-y-6">

        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium mb-2">Name</label>
                <input type="text" name="name" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-green-500 focus:border-green-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Email</label>
                <input type="email" name="email" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-green-500 focus:border-green-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Win Rate (%)</label>
                <input type="number" name="win_rate" min="0" max="100" step="0.1" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-green-500 focus:border-green-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Profit Share (%)</label>
                <input type="number" name="profit_share" min="0" max="100" step="0.1" required
                       class="w-full border rounded-lg px-4 py-3 focus:ring-green-500 focus:border-green-500">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Description</label>
                <textarea name="description" rows="4"
                          class="w-full border rounded-lg px-4 py-3 focus:ring-green-500 focus:border-green-500"></textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Photo</label>
                <input type="file" name="photo" accept="image/*"
                       class="w-full border rounded-lg px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
            </div>
        </div>

        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-medium transition shadow">
            Add Trader
        </button>
    </form>
</div>
@endsection