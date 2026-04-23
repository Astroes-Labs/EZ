<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;



use App\Http\Controllers\NotificationController;
use App\Models\Notification;
use App\Models\Trade;

class DashboardController extends Controller
{


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

    public function getDashboardData()
    {
        // Data preparation as shown previously
        $user = Auth::user();

        $totalDeposited = Deposit::where('user_id', $user->id)
            ->where('status', 'Confirmed')
            ->sum('price');

        $depositCount = Deposit::where('user_id', $user->id)
            ->where('status', 'Confirmed')
            ->count();

        $totalWithdrawn = Withdrawal::where('user_id', $user->id)
            ->where('status', 'Confirmed')
            ->sum('amount');

        $withdrawalCount = Withdrawal::where('user_id', $user->id)
            ->where('status', 'Confirmed')
            ->count();

        $totalTrade = Trade::where('user_id', $user->id)
            ->sum('investment');

        $totalTradeProfit = Trade::where('user_id', $user->id)
            ->where('status', 'CLOSED')
            ->sum('profit');

        //$totalProfit = $totalTrade + $totalTradeProfit + $user->trading_balance + $user->locked_funds - $totalDeposited;
        $totalProfit = $user->trading_balance + $totalDeposited;

        $deposits = Deposit::where('user_id', $user->id)
            ->select(['id',  'comment', 'crypto_currency', 'price', 'created_at', 'status', DB::raw("'deposit' as type")])
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
                    'gateway' => 'Bank Transfer', // Example, update as per actual data
                    'type' => 'Deposit',
                ];
            });

        $withdrawals = Withdrawal::where('user_id', $user->id)
            ->select(['id', 'currency', 'payment_method', 'amount', 'created_at', 'status', DB::raw("'withdrawal' as type")])
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
                    'gateway' => 'PayPal', // Example, update as per actual data
                    'type' => 'Withdrawal',
                ];
            });

        $transactions = $deposits->merge($withdrawals)
            ->sortByDesc('created_at')
            ->values()
            ->all();

        $allTransactionsCount = $depositCount + $withdrawalCount;
        $charts = Auth::user()->charts();
        $locked_funds = Auth::user()->locked_funds;
        $trading_balance = Auth::user()->trading_balance;
        $userClass = Auth::user()->userClassArray();
        return compact(
            'totalDeposited',
            'depositCount',
            'totalWithdrawn',
            'withdrawalCount',
            'allTransactionsCount',
            'transactions',
            'charts',
            'userClass',
            'totalTrade',
            'totalTradeProfit',
            'totalProfit',
        );
    }
 

    public function index()
    {
        // Reuse the shared method to get the dashboard data
        $dashboardData = $this->getDashboardData();

        // Return the view with the necessary data
        // return view('livewire.dashboard.index', $dashboardData);
        return view('livewire.dashboard.new-indexv2', $dashboardData);
    }

    // Dynamic load dashboard from menu
    public function showIndex()
    {
        // Reuse the shared method to get the dashboard data
        $dashboardData = $this->getDashboardData();

        // Return the dynamic view with the necessary data
        return view('livewire.dashboard.partials.index', $dashboardData);
    }

    public function showDeposit()
    {

        return view('livewire.dashboard.partials.deposit');
    }
    public function storeDeposit(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'crypto_currency' => 'required|string',
            'user_id' => 'required|integer',
            'price' => 'required|numeric',
            'price_in_crypto' => 'required|string',
            'status' => 'required|string',
            'timestamp' => 'required|string',
        ]);

        // Store the deposit data into the database
        $deposit = new Deposit();
        $deposit->crypto_currency = $validated['crypto_currency'];
        $deposit->user_id = $validated['user_id'];
        $deposit->price = $validated['price'];
        $deposit->price_in_crypto = $validated['price_in_crypto'];
        $deposit->status = $validated['status'];
        $deposit->timestamp = $validated['timestamp'];
        $deposit->comment = 'Deposited ';

        // Save the new deposit
        $deposit->save();

        // Insert successful
        $header =  Auth::user()->getCurrencySymbol() . " " . $validated['price'] . " Deposit Processing...";
        $url = route('deposit');
        $message = "Your transaction is being processed. The amount will be added to your account shortly after confirmation.";
        $buttonText = 'Deposit again';
        $price = $validated['price_in_crypto'] . " " . $validated['crypto_currency'];

        // Call the NotificationController to add a new notification
        app(NotificationController::class)->addNotification(
            $validated['user_id'],
            $header,
            "Your Deposit of " . Auth::user()->getCurrencySymbol() . " " . $validated['price'] . " is being processed. The amount will be added to your Trading Balance shortly after confirmation."
        );

        $checkout = view('livewire.dashboard.partials.payment-checkout', compact('header', 'url', 'message', 'buttonText', 'price'))->render();

        return response()->json(['message' => 'success', 'checkout' => $checkout]);
    }
    public function getDepositsHistory(Request $request)
    {

        // Fetch latest deposits for the logged-in user
        $deposits = Deposit::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc') // Order by 'created_at' in descending order
            ->get();


        // Map the statuses to their respective CSS classes
        foreach ($deposits as $deposit) {
            $deposit->status_class = $this->getStatusClass($deposit->status);
        }

        return view('livewire.dashboard.partials.deposit-history', compact('deposits'));
    }


    public function showPlans()
    {

        return view('livewire.dashboard.partials.plans');
    }


    public function showWithdraw()
    {

        return view('livewire.dashboard.partials.withdraw');
    }
    public function storeWithdraw(Request $request)
    {
        // Validate the request inputs and assign to a variable
        $validated = $request->validate([
            'from' => 'required|in:1,2', // Ensure "from" is either 1 or 2
            'payment_method' => 'required|string',
            'amount' => 'required|numeric|min:0.01',
            'wallet_address' => 'required|string',
        ]);

        $user = Auth::user();
        $from = $validated['from'];
        $amount = $validated['amount'];

        // Check if the amount is greater than the balance based on "from"
        if ($from == 1) {
            if ($amount > $user->trading_balance) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You have insufficient trading balance for this withdrawal request.',
                ], 400);
            }
        } elseif ($from == 2) {
            if ($amount > $user->locked_funds) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You have insufficient locked funds for this withdrawal request.',
                ], 400);
            }
        }

        // Perform withdrawal logic here (e.g., create a withdrawal record)
        Withdrawal::create([
            'user_id' => $user->id,
            'currency' => $user->currency,
            'amount' => $amount,
            'from' => $from,
            'payment_method' => $validated['payment_method'],
            'wallet_address' => $validated['wallet_address'],
            'source' => $from,
        ]);

        // Customize the checkout message and view rendering
        $header = "Withdrawal of " . $amount . " " . $user->currency . " in Progress";
        $url = route('withdraw.history');
        $message = "Your withdrawal request has been successfully submitted. Please allow some time for processing.";
        $buttonText = 'View Withdrawal History';
        $price = $amount . " " . $user->currency;

        // Call the NotificationController to add a new notification
        app(NotificationController::class)->addNotification(
            $user->id,
            'Withdrawal Initiated',
            $header
        );

        $checkout = view('partials.payment-checkout', compact('header', 'url', 'message', 'buttonText', 'price'))->render();

        return response()->json([
            'status' => 'success',
            'message' => 'Your withdrawal request has been successfully submitted.',
            'checkout' => $checkout,
        ], 200);
    }

    public function getWithdrawalsHistory()
    {

        // Fetch latest deposits for the logged-in user
        $withdrawals = Withdrawal::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc') // Order by 'created_at' in descending order
            ->get();


        // Map the statuses to their respective CSS classes
        foreach ($withdrawals as $withdrawal) {
            $withdrawal->status_class = $this->getStatusClass($withdrawal->status);
        }

        return view('livewire.dashboard.partials.withdraw-history', compact('withdrawals'));
    }

    public function showAccountInfo()
    {

        return view('livewire.dashboard.partials.account-info');
    }

    public function editAccountInfo()
    {

        return view('livewire.dashboard.partials.account-info-edit');
    }


    private function getStatusClass($status)
    {
        switch ($status) {
            case 'Confirmed':
                return 'success';
            case 'Pending':
                return 'warnning';
            case 'Failed':
                return 'failed';
            default:
                return 'default';
        }
    }

    public function updateAccountInfo(Request $request)
    {
        $validated = $request->validate([
            'address' => 'nullable|string|max:255',
            'postcode' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'mobile_number' => 'nullable|string|max:15',
        ]);

        try {
            $user = auth()->user();
            $user->update($validated);

            // Call the NotificationController to add a new notification
            app(NotificationController::class)->addNotification(
                $user->id,
                'Account Info Updated',
                'Your account information has been successfully updated.'
            );


            return response()->json([
                'message' => 'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function editAvatar()
    {

        return view('livewire.dashboard.partials.avatar-edit');
    }
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        $user = Auth::user();
        if ($request->hasFile('avatar')) {
            // Delete the old avatar if exists
            if ($user->photo_profile && file_exists(public_path($user->photo_profile))) {
                unlink(public_path($user->photo_profile));
            }

            // Save the new avatar
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/avatars'), $avatarName);

            // Update user profile
            $user->photo_profile = 'uploads/avatars/' . $avatarName;
            $user->save();
        }

        return response()->json([
            'message' => 'success',
            'photo_profile_url' => asset($user->photo_profile),
        ]);
    }

    public function previewLockedFunds()
    {
        return view('livewire.dashboard.partials.locked-funds-preview');
    }
    public function showLockedFunds()
    {
        return view('livewire.dashboard.partials.locked-funds');
    }
    public function storeLockedFunds(Request $request)
    {
        // Validate input fields
        $request->validate([
            'locked_funds' => 'required|numeric|min:0',
            'locked_duration' => 'required|integer|in:4,5,6,7,8,9,10,11,12', // Validates if the duration is between 4 and 12 months
        ]);

        $user = Auth::user();
        $lockedFunds = $request->input('locked_funds');
        $lockedDuration = $request->input('locked_duration');

        // Check if the locked funds exceed the user's trading balance
        if ($lockedFunds > $user->trading_balance) {
            return response()->json(['message' => 'The specified amount exceeds your trading balance.'], 400);
        }

        // Update the deposit table
        $deposit = new Deposit();
        $deposit->crypto_currency = "NIL";
        $deposit->user_id = $user->id;
        $deposit->price = $lockedFunds;
        $deposit->price_in_crypto = "NIL";
        $deposit->comment = "Locked ($lockedDuration Months)";
        $deposit->status = "Confirmed";
        $deposit->timestamp = true;

        // Save the locked funds as a new deposit
        $deposit->save();

        // Update the locked funds and deduct from trading balance
        $user->locked_funds += $lockedFunds;
        $user->trading_balance -= $lockedFunds;
        $user->locked_duration = $lockedDuration;  // Store the locked duration
        $user->save();
        
        $totalDeposited = Deposit::where('user_id', $user->id)
            ->where('status', 'Confirmed')
            ->sum('price');
        $totalProfit = $user->trading_balance + $totalDeposited;
        $locked_funds = Auth::user()->getCurrencySymbol() . " " . Auth::user()->displayBalance($user->locked_funds);
        $trading_balance = Auth::user()->getCurrencySymbol() . " " . Auth::user()->displayBalance($totalProfit);
        // Return the updated values in the JSON response
        return response()->json([
            'message' => 'Locked funds and duration updated successfully!',
            'locked_funds' => $locked_funds,
            'trading_balance' => $trading_balance,
        ]);
    }

    public function showReferralsRank()
    {
        $user = auth()->user();
        $ranks = $user->rankArray(); // Get the ranks
        
        $userClass = Auth::user()->userClassArray();

        return view('livewire.dashboard.partials.referrals-rank', compact('ranks', 'userClass'));
    }
    public function showUserRank()
    {
        $user = auth()->user();
        $ranks = $user->userClassArray(); //Get the user class

        return view('livewire.dashboard.partials.user-rank', compact('ranks'));
    }
    public function fetchRecentTransactions($userId)
    {
        // Fetch deposits and withdrawals for the user
        $deposits = Deposit::where('user_id', $userId)->get();
        $withdrawals = Withdrawal::where('user_id', $userId)->get();

        // Map transactions to include necessary fields and merge
        $transactions = $withdrawals->map(function ($withdrawal) {
            return (object) [
                'id' => $withdrawal->id,
                'type' => 'withdrawal',
                'amount' => $withdrawal->amount,
                'currency' => $withdrawal->currency ?? null,
                'transaction_id' => $withdrawal->transaction_id ?? 'N/A',
                'comment' => 'Withdrawal', // Default description for withdrawals
                'created_at' => $withdrawal->created_at,
                'fee' => $withdrawal->fee ?? '0',
                'gateway' => $withdrawal->gateway ?? 'N/A',
                'status' => $withdrawal->status ?? 'pending',
                'status_class' => $withdrawal->status_class ?? 'pending-bg',
            ];
        })->merge($deposits->map(function ($deposit) {
            return (object) [
                'id' => $deposit->id,
                'type' => 'deposit',
                'amount' => $deposit->amount,
                'currency' => null, // Deposits don't have a currency field
                'transaction_id' => $deposit->transaction_id ?? 'N/A',
                'comment' => $deposit->comment ?? 'Deposit', // Default description for deposits
                'created_at' => $deposit->created_at,
                'fee' => $deposit->fee ?? '0',
                'gateway' => $deposit->gateway ?? 'N/A',
                'status' => $deposit->status ?? 'completed',
                'status_class' => $deposit->status_class ?? 'completed-bg',
            ];
        }))->sortByDesc('created_at')->take(10); // Sort by date and limit to 10

        return $transactions;
    }
}
