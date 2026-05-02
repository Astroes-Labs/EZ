<?php

namespace App\Http\Controllers;

use App\Http\Traits\SharedDashboardData;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\NotificationController;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Shared Scope
    |--------------------------------------------------------------------------
    | getSharedData() and getStatusClass() now live in the trait.
    | Both DashboardController and SettingsController use the same
    | source of truth — no duplication.
    */

    use SharedDashboardData;

    /*
    |--------------------------------------------------------------------------
    | Theme Toggle
    |--------------------------------------------------------------------------
    */
    public function toggleTheme(Request $request)
    {
        $currentTheme = Cookie::get('theme');

        if ($currentTheme === 'dark') {
            Cookie::queue(Cookie::forget('theme'));
        } else {
            Cookie::queue('theme', 'dark');
        }

        return response()->json(['success' => true]);
    }


    /*
    |--------------------------------------------------------------------------
    | Dashboard Index
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return $this->renderDashboard('livewire.dashboard.partials.index');
    }

    /**
     * Dynamic partial load via openCustom() AJAX.
     */



    /*
    |--------------------------------------------------------------------------
    | Deposit
    |--------------------------------------------------------------------------
    */
    public function showDeposit()
    {
        return $this->renderDashboard('livewire.dashboard.partials.deposit');
    }

    public function storeDeposit(Request $request)
    {
        $validated = $request->validate([
            'crypto_currency' => 'required|string',
            'user_id'         => 'required|integer',
            'price'           => 'required|numeric',
            'price_in_crypto' => 'required|string',
            'status'          => 'required|string',
            'timestamp'       => 'required|string',
        ]);

        $deposit                  = new Deposit();
        $deposit->crypto_currency = $validated['crypto_currency'];
        $deposit->user_id         = $validated['user_id'];
        $deposit->price           = $validated['price'];
        $deposit->price_in_crypto = $validated['price_in_crypto'];
        $deposit->status          = $validated['status'];
        $deposit->timestamp       = $validated['timestamp'];
        $deposit->comment         = 'Deposited ';
        $deposit->save();

        $header     = Auth::user()->getCurrencySymbol() . " " . $validated['price'] . " Deposit Processing...";
        $url        = route('deposit');
        $message    = "Your transaction is being processed. The amount will be added to your account shortly after confirmation.";
        $buttonText = 'Deposit again';
        $price      = $validated['price_in_crypto'] . " " . $validated['crypto_currency'];

        app(NotificationController::class)->addNotification(
            $validated['user_id'],
            $header,
            "Your Deposit of " . Auth::user()->getCurrencySymbol() . " " . $validated['price'] . " is being processed."
        );

        $checkout = view(
            'livewire.dashboard.partials.payment-checkout',
            compact('header', 'url', 'message', 'buttonText', 'price')
        )->render();

        return response()->json(['message' => 'success', 'checkout' => $checkout]);
    }

    public function getDepositsHistory(Request $request)
    {
        $deposits = Deposit::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($deposits as $deposit) {
            $deposit->status_class = $this->getStatusClass($deposit->status);
        }

        // Just pass the extra data you need
        return $this->renderDashboard('livewire.dashboard.partials.deposit-history', [
            'deposits' => $deposits,
            // You can add more variables here if needed
            // 'title' => 'Deposit History',
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Plans
    |--------------------------------------------------------------------------
    */
    public function showPlans()
    {
        return $this->renderDashboard('livewire.dashboard.partials.plans');
    }


    /*
    |--------------------------------------------------------------------------
    | Withdrawal
    |--------------------------------------------------------------------------
    */
    public function showWithdraw()
    {
        return $this->renderDashboard('livewire.dashboard.partials.withdraw');
    }

    public function storeWithdraw(Request $request)
    {
        $validated = $request->validate([
            'from'           => 'required|in:1,2',
            'payment_method' => 'required|string',
            'amount'         => 'required|numeric|min:0.01',
            'wallet_address' => 'required|string',
        ]);

        $user   = Auth::user();
        $from   = $validated['from'];
        $amount = $validated['amount'];

        if ($from == 1 && $amount > $user->trading_balance) {
            return response()->json([
                'status'  => 'error',
                'message' => 'You have insufficient trading balance for this withdrawal request.',
            ], 400);
        }

        if ($from == 2 && $amount > $user->locked_funds) {
            return response()->json([
                'status'  => 'error',
                'message' => 'You have insufficient locked funds for this withdrawal request.',
            ], 400);
        }

        Withdrawal::create([
            'user_id'        => $user->id,
            'currency'       => $user->currency,
            'amount'         => $amount,
            'from'           => $from,
            'payment_method' => $validated['payment_method'],
            'wallet_address' => $validated['wallet_address'],
            'source'         => $from,
        ]);

        $header     = "Withdrawal of " . $amount . " " . $user->currency . " in Progress";
        $url        = route('withdraw.history');
        $message    = "Your withdrawal request has been successfully submitted. Please allow some time for processing.";
        $buttonText = 'View Withdrawal History';
        $price      = $amount . " " . $user->currency;

        app(NotificationController::class)->addNotification(
            $user->id,
            'Withdrawal Initiated',
            $header
        );

        $checkout = view(
            'partials.payment-checkout',
            compact('header', 'url', 'message', 'buttonText', 'price')
        )->render();

        return response()->json([
            'status'   => 'success',
            'message'  => 'Your withdrawal request has been successfully submitted.',
            'checkout' => $checkout,
        ], 200);
    }

    public function getWithdrawalsHistory()
    {
        $withdrawals = Withdrawal::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($withdrawals as $withdrawal) {
            $withdrawal->status_class = $this->getStatusClass($withdrawal->status);
        }

        return $this->renderDashboard('livewire.dashboard.partials.withdraw-history', compact('withdrawals'));
    }


    /*
    |--------------------------------------------------------------------------
    | Account Info
    |--------------------------------------------------------------------------
    */
    public function showAccountInfo()
    {
        return $this->renderDashboard('livewire.dashboard.partials.account-info');
    }

    public function editAccountInfo()
    {
        return $this->renderDashboard('livewire.dashboard.partials.account-info-edit');
    }

    public function updateAccountInfo(Request $request)
    {
        $validated = $request->validate([
            'address'       => 'nullable|string|max:255',
            'postcode'      => 'nullable|string|max:20',
            'city'          => 'nullable|string|max:100',
            'state'         => 'nullable|string|max:100',
            'country'       => 'nullable|string|max:100',
            'mobile_number' => 'nullable|string|max:15',
        ]);

        try {
            $user = auth()->user();
            $user->update($validated);

            app(NotificationController::class)->addNotification(
                $user->id,
                'Account Info Updated',
                'Your account information has been successfully updated.'
            );

            return response()->json(['message' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'error', 'error' => $e->getMessage()], 500);
        }
    }

    public function updateCurrency(Request $request)
    {
        $validated = $request->validate([
            'currency' => 'required|in:USD,GBP,EUR,AUD', // Add more currencies if needed
        ]);

        try {
            $user = auth()->user();
            $user->update(['currency' => $validated['currency']]);

            // Optional: Send notification
            app(NotificationController::class)->addNotification(
                $user->id,
                'Currency Updated',
                "Your display currency has been changed to {$validated['currency']}."
            );

            return response()->json([
                'message' => 'success',
                'currency' => $validated['currency']
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Avatar
    |--------------------------------------------------------------------------
    */
    public function editAvatar()
    {
        return $this->renderDashboard('livewire.dashboard.partials.avatar-edit');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            if ($user->photo_profile && file_exists(public_path($user->photo_profile))) {
                unlink(public_path($user->photo_profile));
            }

            $avatar     = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/avatars'), $avatarName);

            $user->photo_profile = 'uploads/avatars/' . $avatarName;
            $user->save();
        }

        return response()->json([
            'message'          => 'success',
            'photo_profile_url' => asset($user->photo_profile),
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Locked Funds
    |--------------------------------------------------------------------------
    */
    public function previewLockedFunds()
    {
        return $this->renderDashboard('livewire.dashboard.partials.locked-funds-preview');
    }

    public function showLockedFunds()
    {
        return $this->renderDashboard('livewire.dashboard.partials.locked-funds');
    }

    public function storeLockedFunds(Request $request)
    {
        $request->validate([
            'locked_funds'    => 'required|numeric|min:0',
            'locked_duration' => 'required|integer|in:4,5,6,7,8,9,10,11,12',
        ]);

        $user          = Auth::user();
        $lockedFunds   = $request->input('locked_funds');
        $lockedDuration = $request->input('locked_duration');

        if ($lockedFunds > $user->trading_balance) {
            return response()->json(
                ['message' => 'The specified amount exceeds your trading balance.'],
                400
            );
        }

        $deposit                  = new Deposit();
        $deposit->crypto_currency = "NIL";
        $deposit->user_id         = $user->id;
        $deposit->price           = $lockedFunds;
        $deposit->price_in_crypto = "NIL";
        $deposit->comment         = "Locked ($lockedDuration Months)";
        $deposit->status          = "Confirmed";
        $deposit->timestamp       = true;
        $deposit->save();

        $user->locked_funds     += $lockedFunds;
        $user->trading_balance  -= $lockedFunds;
        $user->locked_duration   = $lockedDuration;
        $user->save();

        $totalDeposited  = Deposit::where('user_id', $user->id)->where('status', 'Confirmed')->sum('price');
        $totalProfit     = $user->trading_balance + $totalDeposited;
        $locked_funds    = Auth::user()->getCurrencySymbol() . " " . Auth::user()->displayBalance($user->locked_funds);
        $trading_balance = Auth::user()->getCurrencySymbol() . " " . Auth::user()->displayBalance($totalProfit);

        return response()->json([
            'message'         => 'Locked funds and duration updated successfully!',
            'locked_funds'    => $locked_funds,
            'trading_balance' => $trading_balance,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Referrals / Rank
    |--------------------------------------------------------------------------
    */
    public function showReferralsRank()
    {
        $user      = auth()->user();
        $ranks     = $user->rankArray();
        $userClass = Auth::user()->userClassArray();

        return $this->renderDashboard('livewire.dashboard.partials.referrals-rank', compact('ranks', 'userClass'));
    }

    public function showUserRank()
    {
        $user  = auth()->user();
        $ranks = $user->userClassArray();

        return $this->renderDashboard('livewire.dashboard.partials.user-rank', compact('ranks'));
    }


    /*
    |--------------------------------------------------------------------------
    | Recent Transactions Helper
    |--------------------------------------------------------------------------
    */
    public function fetchRecentTransactions($userId)
    {
        $deposits    = Deposit::where('user_id', $userId)->get();
        $withdrawals = Withdrawal::where('user_id', $userId)->get();

        return $withdrawals->map(function ($w) {
            return (object) [
                'id'             => $w->id,
                'type'           => 'withdrawal',
                'amount'         => $w->amount,
                'currency'       => $w->currency ?? null,
                'transaction_id' => $w->transaction_id ?? 'N/A',
                'comment'        => 'Withdrawal',
                'created_at'     => $w->created_at,
                'fee'            => $w->fee ?? '0',
                'gateway'        => $w->gateway ?? 'N/A',
                'status'         => $w->status ?? 'pending',
                'status_class'   => $w->status_class ?? 'pending-bg',
            ];
        })->merge(
            $deposits->map(function ($d) {
                return (object) [
                    'id'             => $d->id,
                    'type'           => 'deposit',
                    'amount'         => $d->amount,
                    'currency'       => null,
                    'transaction_id' => $d->transaction_id ?? 'N/A',
                    'comment'        => $d->comment ?? 'Deposit',
                    'created_at'     => $d->created_at,
                    'fee'            => $d->fee ?? '0',
                    'gateway'        => $d->gateway ?? 'N/A',
                    'status'         => $d->status ?? 'completed',
                    'status_class'   => $d->status_class ?? 'completed-bg',
                ];
            })
        )->sortByDesc('created_at')->take(10);
    }
}
