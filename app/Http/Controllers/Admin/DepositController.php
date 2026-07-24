<?php
// File: app/Http/Controllers/Admin/DepositController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Deposit;
use App\Services\FinancialDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepositController extends Controller
{
    // User-specific deposits list
    public function userDeposits(User $user)
    {
        $deposits = $user->deposits()->latest()->get();
        $tradingBalance = $user->trading_balance ?? 0; // adjust field name if needed

        return view('admin.deposits.user-index', compact('user', 'deposits', 'tradingBalance'));
    }

    // All deposits (global view)
    public function allDeposits()
    {
        $deposits = Deposit::with('user')->latest()->get();
        return view('admin.deposits.all-index', compact('deposits'));
    }

    // Create form (for specific user)
    public function createForUser(User $user)
    {
        return view('admin.deposits.create', compact('user'));
    }

    // Store new deposit
    public function storeForUser(Request $request, User $user)
    {
        $request->validate([
            'amount'          => 'required|numeric|min:0.01',
            'currency'        => 'required|string|max:10',
            'crypto_currency' => 'nullable|string|max:20',
            'status'          => 'required|in:Pending,Confirmed,Failed',
        ]);

        try {

            DB::beginTransaction();

            $priceService = app(FinancialDataService::class);

            $cryptoCurrency = $request->crypto_currency
                ? strtoupper($request->crypto_currency)
                : null;

            $openingPrice = null;
            $cryptoAmount = null;

            if ($cryptoCurrency) {

                // price of 1 coin in USD
                $openingPrice = $priceService->coinValue($cryptoCurrency, 1);

                // calculate how much crypto the user receives
                $cryptoAmount = $request->amount / $openingPrice;
            }

            $deposit = Deposit::create([
                'user_id'         => $user->id,
                'price'           => $request->amount,
                'currency'        => strtoupper($request->currency),
                'crypto_currency' => $cryptoCurrency,
                'opening_price'   => $openingPrice,
                'crypto_amount'   => $cryptoAmount,
                'status'          => $request->status,
                'timestamp'       => now(),
            ]);

            DB::commit();

            // Adjust balance if status changed to/from Confirmed
            if ($request->status === 'Confirmed') {
                $user->increment('trading_balance', $deposit->price);
            } elseif ($request->status !== 'Confirmed') {
                //$user->decrement('trading_balance', $deposit->amount);
            }

            return redirect()
                ->route('admin.users.deposits.index', $user)
                ->with('success', 'Deposit record created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create deposit: ' . $e->getMessage());
        }
    }

    // Edit form (user context)
    public function edit(User $user, Deposit $deposit)
    {
        $this->authorizeDeposit($user, $deposit);
        return view('admin.deposits.edit', compact('user', 'deposit'));
    }

    // Update (user context)
    public function update(Request $request, User $user, Deposit $deposit)
    {
        $this->authorizeDeposit($user, $deposit);

        $request->validate([
            'status'          => 'required|in:Pending,Confirmed,Failed',
            'amount'          => 'sometimes|numeric|min:0.01',
            // 'crypto_currency' => 'nullable|string|max:20',
        ]);

        try {
            

            $priceService = app(FinancialDataService::class);

            $cryptoCurrency = $request->crypto_currency
                ? strtoupper($request->crypto_currency)
                : null;

            $openingPrice = null;
            $cryptoAmount = null;

            if ($cryptoCurrency) {

                // price of 1 coin in USD
                $openingPrice = $priceService->coinValue($cryptoCurrency, 1);

                // calculate how much crypto the user receives
                $cryptoAmount = $request->amount / $openingPrice;
            }

            $oldStatus = $deposit->status;
            $deposit->update([
                'status'          => $request->status,
                'price'          => $request->amount ?? $deposit->amount,
                'crypto_currency' => $request->crypto_currency ? strtoupper($request->crypto_currency) : $deposit->crypto_currency,
                'opening_price'   => $openingPrice,
                'crypto_amount'   => $cryptoAmount,
            ]);

            // Adjust balance if status changed to/from Confirmed
            if ($oldStatus !== 'Confirmed' && $request->status === 'Confirmed') {
                //$user->increment('trading_balance', $deposit->amount);
            } elseif ($oldStatus === 'Confirmed' && $request->status !== 'Confirmed') {
                //$user->decrement('trading_balance', $deposit->amount);
            }

            return redirect()
                ->route('admin.users.deposits.index', $user)
                ->with('success', 'Deposit updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    // Global edit
    public function editGlobal(Deposit $deposit)
    {
        $deposit->load('user');
        return view('admin.deposits.edit-global', compact('deposit'));
    }

    // Global update (status only – no balance adjustment here)
    public function updateGlobal(Request $request, Deposit $deposit)
    {
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,Failed',
        ]);

        $deposit->update(['status' => $request->status]);

        return redirect()
            ->route('admin.deposits.index')
            ->with('success', 'Deposit updated successfully.');
    }

    // Delete
    public function destroy(User $user, Deposit $deposit)
    {
        $this->authorizeDeposit($user, $deposit);

        if ($deposit->status === 'Confirmed') {
            //  $user->decrement('trading_balance', $deposit->amount);
        }

        $deposit->delete();

        return redirect()
            ->route('admin.users.deposits.index', $user)
            ->with('success', 'Deposit deleted successfully.');
    }

    private function authorizeDeposit(User $user, Deposit $deposit)
    {
        if ($deposit->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
    }
}
