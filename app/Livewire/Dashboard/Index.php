<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\Trade;

class Index extends Component
{
    public $totalDeposited;
    public $depositCount;
    public $totalWithdrawn;
    public $withdrawalCount;
    public $allTransactionsCount;
    public $transactions = [];
    public $charts;
    public $userClass;
    public $totalTrade;
    public $totalTradeProfit;
    public $totalProfit;

    public function mount()
    {
        $this->loadDashboardData();
    }

    public function loadDashboardData()
    {
        $user = Auth::user();

        $this->totalDeposited = Deposit::where('user_id', $user->id)
            ->where('status', 'Confirmed')
            ->sum('price');

        $this->depositCount = Deposit::where('user_id', $user->id)
            ->where('status', 'Confirmed')
            ->count();

        $this->totalWithdrawn = Withdrawal::where('user_id', $user->id)
            ->where('status', 'Confirmed')
            ->sum('amount');

        $this->withdrawalCount = Withdrawal::where('user_id', $user->id)
            ->where('status', 'Confirmed')
            ->count();

        $this->totalTrade = Trade::where('user_id', $user->id)
            ->sum('investment');

        $this->totalTradeProfit = Trade::where('user_id', $user->id)
            ->where('status', 'CLOSED')
            ->sum('profit');

        $this->totalProfit = $user->trading_balance + $this->totalDeposited;

        $deposits = Deposit::where('user_id', $user->id)
            ->get()
            ->map(function ($deposit) {
                return [
                    'transaction_id' => '',
                    'comment' => $deposit->comment,
                    'amount' => $deposit->price,
                    'fee' => '0',
                    'created_at' => $deposit->created_at,
                    'status' => $deposit->status,
                    'crypto_currency' => $deposit->crypto_currency,
                    'status_class' => $this->getStatusClass($deposit->status),
                    'gateway' => 'Bank Transfer',
                    'type' => 'Deposit',
                ];
            });

        $withdrawals = Withdrawal::where('user_id', $user->id)
            ->get()
            ->map(function ($withdrawal) {
                return [
                    'transaction_id' => '',
                    'currency' => $withdrawal->currency,
                    'amount' => $withdrawal->amount,
                    'fee' => '0',
                    'created_at' => $withdrawal->created_at,
                    'status' => $withdrawal->status,
                    'payment_method' => $withdrawal->payment_method,
                    'status_class' => $this->getStatusClass($withdrawal->status),
                    'gateway' => 'PayPal',
                    'type' => 'Withdrawal',
                ];
            });

        $this->transactions = $deposits
            ->merge($withdrawals)
            ->sortByDesc('created_at')
            ->values()
            ->all();

        $this->allTransactionsCount = $this->depositCount + $this->withdrawalCount;

        $this->charts = $user->charts();
        $this->userClass = $user->userClassArray();
    }

    public function getStatusClass($status)
    {
        return match ($status) {
            'Confirmed' => 'text-green-500',
            'Pending' => 'text-yellow-500',
            'Rejected' => 'text-red-500',
            default => 'text-gray-500',
        };
    }

    public function render()
    {
        return view('livewire.dashboard.index');
            //->layout('layouts.app');
    }
}