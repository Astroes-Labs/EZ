<?php

namespace App\Http\Traits;

use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\Trade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait SharedDashboardData
{
    /**
     * Returns all shared layout/dashboard data needed by both
     * DashboardController and SettingsController (and any future controller).
     *
     * Includes:
     *  - Deposit/withdrawal/trade totals
     *  - totalProfit (used by sidebar wallet balance)
     *  - charts (used by trade hub)
     *  - userClass (used by ranking badge)
     *  - transactions (merged deposit + withdrawal list)
     *  - allTransactionsCount
     */
    protected function getSharedData(): array
    {
        $user = Auth::user();

        // ── Deposit totals ──
        $totalDeposited = Deposit::where('user_id', $user->id)
            ->where('status', 'Confirmed')
            ->sum('price');

        $depositCount = Deposit::where('user_id', $user->id)
            ->where('status', 'Confirmed')
            ->count();

        // ── Withdrawal totals ──
        $totalWithdrawn = Withdrawal::where('user_id', $user->id)
            ->where('status', 'Confirmed')
            ->sum('amount');

        $withdrawalCount = Withdrawal::where('user_id', $user->id)
            ->where('status', 'Confirmed')
            ->count();

        // ── Trade totals ──
        $totalTrade = Trade::where('user_id', $user->id)
            ->sum('investment');

        $totalTradeProfit = Trade::where('user_id', $user->id)
            ->where('status', 'CLOSED')
            ->sum('profit');

        // ── Portfolio balance (mirrors DashboardController exactly) ──
        $totalProfit = $user->trading_balance + $totalDeposited;

        // ── Transaction count ──
        $allTransactionsCount = $depositCount + $withdrawalCount;

        // ── Merged transaction list ──
        $deposits = Deposit::where('user_id', $user->id)
            ->select([
                'id', 'comment', 'crypto_currency',
                'price', 'created_at', 'status',
                DB::raw("'Deposit' as type"),
            ])
            ->get()
            ->map(function ($deposit) {
                return [
                    'transaction_id'  => '',
                    'comment'         => $deposit->comment,
                    'amount'          => $deposit->price,
                    'fee'             => '0',
                    'created_at'      => $deposit->created_at,
                    'status'          => $deposit->status,
                    'crypto_currency' => $deposit->crypto_currency,
                    'status_class'    => $this->getStatusClass($deposit->status),
                    'gateway'         => 'Bank Transfer',
                    'type'            => 'Deposit',
                    'currency'        => null,
                    'payment_method'  => null,
                ];
            });

        $withdrawals = Withdrawal::where('user_id', $user->id)
            ->select([
                'id', 'currency', 'payment_method',
                'amount', 'created_at', 'status',
                DB::raw("'Withdrawal' as type"),
            ])
            ->get()
            ->map(function ($withdrawal) {
                return [
                    'transaction_id'  => '',
                    'currency'        => $withdrawal->currency,
                    'amount'          => $withdrawal->amount,
                    'fee'             => '0',
                    'created_at'      => $withdrawal->created_at,
                    'status'          => $withdrawal->status,
                    'payment_method'  => $withdrawal->payment_method,
                    'status_class'    => $this->getStatusClass($withdrawal->status),
                    'gateway'         => 'PayPal',
                    'type'            => 'Withdrawal',
                    'crypto_currency' => null,
                    'comment'         => null,
                ];
            });

        $transactions = $deposits
            ->merge($withdrawals)
            ->sortByDesc('created_at')
            ->values()
            ->all();

        // ── Charts & user ranking ──
        $charts    = $user->charts();
        $userClass = $user->userClassArray();

        return compact(
            'totalDeposited',
            'depositCount',
            'totalWithdrawn',
            'withdrawalCount',
            'totalTrade',
            'totalTradeProfit',
            'totalProfit',
            'allTransactionsCount',
            'transactions',
            'charts',
            'userClass',
        );
    }

    /**
     * Shared status → CSS class mapper.
     * Both controllers previously duplicated this — now in one place.
     */
    protected function getStatusClass(string $status): string
    {
        return match ($status) {
            'Confirmed' => 'success',
            'Pending'   => 'warnning',
            'Failed'    => 'failed',
            default     => 'default',
        };
    }
}