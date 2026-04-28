<?php

namespace App\Http\Controllers;

use App\Http\Traits\SharedDashboardData;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use SharedDashboardData;

    /**
     * Full page load — direct URL visit.
     * Passes all shared layout variables so dashboard.blade.php
     * gets $totalProfit, $charts, $userClass, etc.
     */
    public function index()
    {
        $data = $this->getSharedData();
        return view('livewire.dashboard.partials.settings', $data);
    }

    /**
     * AJAX partial load — called via openCustom().
     */
    public function show()
    {
        $data = $this->getSharedData();
        return view('livewire.dashboard.partials.settings', $data);
    }
}