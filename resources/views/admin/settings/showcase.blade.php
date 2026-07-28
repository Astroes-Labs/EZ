@extends('admin.layouts.app')

@section('title', 'Manage Showcase Metrics')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    <div>
        <h2 class="text-3xl font-bold text-gray-900">Home Page Showcase Metrics</h2>
        <p class="text-gray-600 mt-1">Manage dynamic indicators rendered on your front-end layout. Fields generate automatically.</p>
    </div>

    <!-- Dynamic Metrics Update Form -->
    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        <h3 class="text-lg font-semibold text-gray-900 mb-6">Current Metrics (Auto-Generated Fields)</h3>

        <form action="{{ route('admin.settings.update-all') }}" method="POST" class="space-y-6">
            @csrf @method('PUT')

            <div class="space-y-4">
                @forelse($settings as $setting)
                    <div class="grid sm:grid-cols-12 gap-4 items-center p-4 bg-gray-50 rounded-xl border border-gray-200">
                        <!-- Label (Readonly identifier) -->
                        <div class="sm:col-span-5">
                            <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Metric Label</label>
                            <input type="text" value="{{ $setting->label }}" disabled class="w-full rounded-lg bg-gray-200 border-gray-300 text-sm text-gray-700 shadow-sm cursor-not-allowed">
                        </div>

                        <!-- Value (Editable field) -->
                        <div class="sm:col-span-5">
                            <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Value</label>
                            <input type="text" name="settings[{{ $setting->id }}]" value="{{ $setting->value }}" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm shadow-sm">
                        </div>

                        <!-- Delete button -->
                        <div class="sm:col-span-2 flex justify-end items-end h-full pt-5">
                            <a href="{{ route('admin.settings.destroy', $setting) }}" 
                               onclick="event.preventDefault(); if(confirm('Delete this metric?')) document.getElementById('delete-setting-{{ $setting->id }}').submit();"
                               class="text-red-600 hover:text-red-800 p-2 text-sm font-medium">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 text-sm py-4">No dynamic metrics found. Add one below!</p>
                @endforelse
            </div>

            @if($settings->count() > 0)
                <div class="flex justify-end pt-4 border-t border-gray-100">
                    <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition font-medium text-sm shadow-sm">
                        <i class="fas fa-save mr-2"></i> Save All Changes
                    </button>
                </div>
            @endif
        </form>

        <!-- Hidden delete forms -->
        @foreach($settings as $setting)
            <form id="delete-setting-{{ $setting->id }}" action="{{ route('admin.settings.destroy', $setting) }}" method="POST" style="display: none;">
                @csrf @method('DELETE')
            </form>
        @endforeach
    </div>

    <!-- Add New Metric Form Card -->
    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Add New Metric</h3>
        <form action="{{ route('admin.settings.store') }}" method="POST" class="grid sm:grid-cols-12 gap-4 items-end">
            @csrf
            <div class="sm:col-span-5">
                <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Metric Label</label>
                <input type="text" name="label" required placeholder="e.g. AVG YIELD" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            </div>
            <div class="sm:col-span-5">
                <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Initial Value</label>
                <input type="text" name="value" required placeholder="e.g. +21.5%" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            </div>
            <div class="sm:col-span-2">
                <button type="submit" class="w-full px-5 py-2.5 bg-gray-900 hover:bg-gray-800 text-white rounded-lg transition font-medium text-sm shadow-sm">
                    Add
                </button>
            </div>
        </form>
    </div>
</div>


<!-- Manage Trading Plans Form Card -->
    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100 mt-8">
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Manage Investment Plans & Tiers</h3>
            <p class="text-gray-600 text-sm mt-1">Update price ranges, ratings, and reviews for your trading plans.</p>
        </div>

        <form action="{{ route('admin.settings.plans.update-all') }}" method="POST" class="space-y-6">
            @csrf @method('PUT')

            <div class="space-y-6">
                @php
                    $plans = \App\Models\TradingPlan::all()->groupBy('plan_name');
                @endphp

                @forelse($plans as $planName => $tiers)
                    <div class="p-6 bg-gray-50 rounded-xl border border-gray-200 space-y-4">
                        <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                            <h4 class="text-base font-bold text-gray-900 uppercase font-mono">{{ $planName }} Plan</h4>
                            
                            <!-- Shared Plan Metadata (Rating & Reviews) -->
                            <div class="flex gap-4 items-center">
                                <div>
                                    <label class="block text-[10px] font-medium text-gray-500 uppercase">Rating</label>
                                    <input type="text" name="meta[{{ $planName }}][rating]" value="{{ $tiers->first()->rating }}" required class="w-24 rounded-lg border-gray-300 text-xs shadow-sm">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-medium text-gray-500 uppercase">Reviews Count</label>
                                    <input type="text" name="meta[{{ $planName }}][reviews]" value="{{ $tiers->first()->reviews }}" required class="w-28 rounded-lg border-gray-300 text-xs shadow-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Sub-tiers -->
                        <div class="space-y-3">
                            @foreach($tiers as $tier)
                                <div class="grid sm:grid-cols-12 gap-3 items-center bg-white p-3 rounded-lg border border-gray-100">
                                    <div class="sm:col-span-4">
                                        <span class="text-xs font-semibold text-gray-700 font-mono">{{ $tier->sub_tier_name }}</span>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label class="block text-[10px] font-medium text-gray-400 uppercase">Minimum</label>
                                        <input type="number" step="0.01" name="tiers[{{ $tier->id }}][min]" value="{{ $tier->min }}" required class="w-full rounded-lg border-gray-300 text-sm shadow-sm">
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label class="block text-[10px] font-medium text-gray-400 uppercase">Maximum</label>
                                        <input type="number" step="0.01" name="tiers[{{ $tier->id }}][max]" value="{{ $tier->max }}" required class="w-full rounded-lg border-gray-300 text-sm shadow-sm">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 text-sm py-4">No trading plans found.</p>
                @endforelse
            </div>

            @if($plans->count() > 0)
                <div class="flex justify-end pt-4 border-t border-gray-100">
                    <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition font-medium text-sm shadow-sm">
                        <i class="fas fa-save mr-2"></i> Save All Plan Changes
                    </button>
                </div>
            @endif
        </form>
    </div>
@endsection