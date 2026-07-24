<?php
// File: app/Http/Controllers/Admin/DashboardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\Trade;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers'       => User::count(),
            'newUsersToday'    => User::whereDate('created_at', today())->count(),
            'pendingDeposits'  => Deposit::where('status', 'pending')->count(),
            'pendingWithdrawals'=> Withdrawal::where('status', 'pending')->count(),
            'activeTrades'     => Trade::where('status', 'OPEN')->count(),
        ]);
    }
}