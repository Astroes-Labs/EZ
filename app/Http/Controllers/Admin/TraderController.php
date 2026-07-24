<?php
// File: app/Http/Controllers/Admin/TraderController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TraderController extends Controller
{
    public function index()
    {
        $traders = Trader::latest()->get();
        return view('admin.traders.index', compact('traders'));
    }

    public function create()
    {
        return view('admin.traders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:traders,email',
            'win_rate'     => 'required|numeric|min:0|max:100',
            'profit_share' => 'required|numeric|min:0|max:100',
            'description'  => 'nullable|string',
            'photo'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('traders', 'public');
            $validated['photo'] = $path;
        }

        Trader::create($validated);

        return redirect()->route('admin.traders.index')
            ->with('success', 'Trader added successfully.');
    }

    public function edit(Trader $trader)
    {
        return view('admin.traders.edit', compact('trader'));
    }

    public function update(Request $request, Trader $trader)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:traders,email,' . $trader->id,
            'win_rate'     => 'required|numeric|min:0|max:100',
            'profit_share' => 'required|numeric|min:0|max:100',
            'description'  => 'nullable|string',
            'photo'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($trader->photo) {
                Storage::disk('public')->delete($trader->photo);
            }
            $path = $request->file('photo')->store('traders', 'public');
            $validated['photo'] = $path;
        }

        $trader->update($validated);

        return redirect()->route('admin.traders.index')
            ->with('success', 'Trader updated successfully.');
    }

    public function destroy(Trader $trader)
    {
        if ($trader->photo) {
            Storage::disk('public')->delete($trader->photo);
        }

        $trader->delete();

        return redirect()->route('admin.traders.index')
            ->with('success', 'Trader deleted successfully.');
    }
}