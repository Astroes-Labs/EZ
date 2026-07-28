<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all();
        return view('admin.settings.showcase', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        SiteSetting::create([
            'key' => Str::slug($request->label, '_'),
            'label' => $request->label,
            'value' => $request->value,
        ]);

        return redirect()->back()->with('success', 'New showcase metric added successfully.');
    }

    public function update(Request $request, SiteSetting $setting)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        $setting->update([
            'label' => $request->label,
            'value' => $request->value,
        ]);

        return redirect()->back()->with('success', 'Metric updated successfully.');
    }

    public function updateAll(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
            'settings.*' => 'required|string|max:255',
        ]);

        foreach ($request->settings as $id => $value) {
            SiteSetting::where('id', $id)->update(['value' => $value]);
        }

        return redirect()->back()->with('success', 'All showcase metrics updated successfully.');
    }

    public function destroy(SiteSetting $setting)
    {
        $setting->delete();
        return redirect()->back()->with('success', 'Metric removed successfully.');
    }

    public function updatePlans(Request $request)
    {
        // Update sub-tier minimums and maximums
        if ($request->has('tiers')) {
            foreach ($request->tiers as $id => $data) {
                \App\Models\TradingPlan::where('id', $id)->update([
                    'min' => $data['min'],
                    'max' => $data['max'],
                ]);
            }
        }

        // Update shared plan metadata (ratings and reviews grouped by plan_name)
        if ($request->has('meta')) {
            foreach ($request->meta as $planName => $data) {
                \App\Models\TradingPlan::where('plan_name', $planName)->update([
                    'rating' => $data['rating'],
                    'reviews' => $data['reviews'],
                ]);
            }
        }

        return back()->with('success', 'Trading plans updated successfully.');
    }
}