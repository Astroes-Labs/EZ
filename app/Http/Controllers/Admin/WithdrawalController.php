<?php
// File: app/Http/Controllers/Admin/WithdrawalController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WithdrawalController extends Controller
{
    // User-specific withdrawals list
    public function userWithdrawals(User $user)
    {
        $withdrawals = $user->withdrawals()->latest()->get();
        $tradingBalance = $user->trading_balance ?? 0; // adjust field name if different

        return view('admin.withdrawals.user-index', compact('user', 'withdrawals', 'tradingBalance'));
    }

    // All withdrawals (global)
    public function allWithdrawals()
    {
        $withdrawals = Withdrawal::with('user')->latest()->get();
        return view('admin.withdrawals.all-index', compact('withdrawals'));
    }

    // Create form (for specific user)
    public function createForUser(User $user)
    {
        return view('admin.withdrawals.create', compact('user'));
    }

    // Store new withdrawal

    public function storeForUser(Request $request, User $user)
    {
        Log::info('Withdrawal request received', [
            'user_id' => $user->id,
            'payload' => $request->all()
        ]);

        $validated = $request->validate([
            'amount'         => 'required|numeric|min:0.01',
            'status'         => 'required|in:Pending,Confirmed,Failed',
            'from'           => 'required|in:trading,locked',
            'wallet_address' => 'required|string|max:255',
            'payment_method' => 'required|string|max:50',
            'currency'       => 'required|string|max:10',
        ]);

        Log::info('Withdrawal validated', $validated);

        $amount = (float) $validated['amount'];

        $balanceField = $validated['from'] === 'trading'
            ? 'trading_balance'
            : 'locked_funds';

        $validated['from'] = $validated['from'] === 'trading' ? 1 : 0;

        Log::info('Balance source resolved', [
            'balance_field' => $balanceField,
            'balance_value' => $user->$balanceField,
            'requested_amount' => $amount
        ]);

        if ($user->$balanceField < $amount) {
            Log::warning('Withdrawal blocked due to insufficient balance', [
                'user_id' => $user->id,
                'balance' => $user->$balanceField,
                'amount'  => $amount
            ]);

            return back()->with('error', 'Insufficient balance in selected source.');
        }

        try {

            DB::transaction(function () use ($user, $validated, $amount, $balanceField) {

                Log::info('Creating withdrawal record', [
                    'user_id' => $user->id,
                    'data' => $validated
                ]);

                $withdrawal = Withdrawal::create([
                    'user_id'         => $user->id,
                    'amount'          => $amount,
                    'currency'        => strtoupper($validated['currency']),
                    'status'          => $validated['status'],
                    'from'            => $validated['from'],
                    'wallet_address'  => $validated['wallet_address'],
                    'payment_method'  => $validated['payment_method'],
                ]);

                Log::info('Withdrawal created', [
                    'withdrawal_id' => $withdrawal->id
                ]);

                if ($validated['status'] === 'Confirmed') {

                    Log::info('Decrementing balance', [
                        'field' => $balanceField,
                        'amount' => $amount
                    ]);

                    $user->decrement($balanceField, $amount);
                }
            });

            Log::info('Withdrawal transaction completed');

            return redirect()
                ->route('admin.users.withdrawals.index', $user)
                ->with('success', 'Withdrawal record added successfully.');
        } catch (\Exception $e) {

            Log::error('Withdrawal creation failed', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->with('error', 'Failed to create withdrawal: ' . $e->getMessage());
        }
    }

    // Edit form (user context)
    public function edit(User $user, Withdrawal $withdrawal)
    {
        $this->authorizeWithdrawal($user, $withdrawal);
        return view('admin.withdrawals.edit', compact('user', 'withdrawal'));
    }

    // Update (user context)
    public function update(Request $request, User $user, Withdrawal $withdrawal)
    {
        $this->authorizeWithdrawal($user, $withdrawal);

        $validated = $request->validate([
            'amount'         => 'required|numeric|min:0.01',
            'status'         => 'required|in:Pending,Confirmed,Failed',
            'from'           => 'required|in:trading,locked',
            'wallet_address' => 'required|string|max:255',
            'payment_method' => 'required|string|max:50',
            'currency'       => 'required|string|max:10',
            'created_at'     => 'required|date',
        ]);

        $oldStatus = $withdrawal->status;
        $oldAmount = (float) $withdrawal->amount;
        $oldFrom   = $withdrawal->from;

        $newAmount = (float) $validated['amount'];
        $newStatus = $validated['status'];
        $newFrom   = $validated['from'] === 'trading' ? 1 : 0;

        try {

            DB::transaction(function () use (
                $withdrawal,
                $user,
                $validated,
                $oldStatus,
                $oldAmount,
                $oldFrom,
                $newAmount,
                $newStatus,
                $newFrom
            ) {

                $oldField = $oldFrom == 1 ? 'trading_balance' : 'locked_funds';
                $newField = $newFrom == 1 ? 'trading_balance' : 'locked_funds';

                /*
            |--------------------------------------------------------------------------
            | Balance Adjustments
            |--------------------------------------------------------------------------
            */

                if ($oldStatus === 'Confirmed' && $newStatus === 'Confirmed') {

                    // difference logic
                    $difference = $newAmount - $oldAmount;

                    if ($difference > 0) {

                        if ($user->$newField < $difference) {
                            throw new \Exception("Insufficient balance to increase withdrawal.");
                        }

                        $user->decrement($newField, $difference);
                    }

                    if ($difference < 0) {
                        $user->increment($oldField, abs($difference));
                    }
                } elseif ($oldStatus !== 'Confirmed' && $newStatus === 'Confirmed') {

                    if ($user->$newField < $newAmount) {
                        throw new \Exception("Insufficient balance.");
                    }

                    $user->decrement($newField, $newAmount);
                } elseif ($oldStatus === 'Confirmed' && $newStatus !== 'Confirmed') {

                    //$user->increment($oldField, $oldAmount);
                }

                /*
            |--------------------------------------------------------------------------
            | Update Withdrawal
            |--------------------------------------------------------------------------
            */

                $withdrawal->update([
                    'amount'         => $newAmount,
                    'currency'       => strtoupper($validated['currency']),
                    'status'         => $newStatus,
                    'from'           => $newFrom,
                    'wallet_address' => $validated['wallet_address'],
                    'payment_method' => $validated['payment_method'],
                    'created_at'     => $validated['created_at'],
                    'updated_at'     => now(),
                ]);
            });

            return redirect()
                ->route('admin.users.withdrawals.index', $user)
                ->with('success', 'Withdrawal updated successfully.');
        } catch (\Exception $e) {

            Log::error('Withdrawal update failed', [
                'withdrawal_id' => $withdrawal->id,
                'error' => $e->getMessage()
            ]);

            return back()->with('error', $e->getMessage());
        }
    }

    // Global edit
    public function editGlobal(Withdrawal $withdrawal)
    {
        $withdrawal->load('user');
        return view('admin.withdrawals.edit-global', compact('withdrawal'));
    }

    // Global update
    public function updateGlobal(Request $request, Withdrawal $withdrawal)
    {
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,Failed',
        ]);

        $withdrawal->update(['status' => $request->status]);

        return redirect()
            ->route('admin.withdrawals.index')
            ->with('success', 'Withdrawal updated successfully.');
    }

    // Delete
    public function destroy(User $user, Withdrawal $withdrawal)
    {
        $this->authorizeWithdrawal($user, $withdrawal);

        $withdrawal->delete();

        return redirect()
            ->route('users.withdrawals.index', $user)
            ->with('success', 'Withdrawal deleted successfully.');
    }

    private function authorizeWithdrawal(User $user, Withdrawal $withdrawal)
    {
        if ($withdrawal->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
    }
}
