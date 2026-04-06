<?php
// File: app/Http/Controllers/Admin/UserController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {/* 
        $users = User::select('id', 'name', 'email', 'country', 'created_at') // adjust columns as per your users table
            ->latest()
            ->get(); */
        $users = User::withCount([
            'deposits as pending_deposits' => fn($q) => $q->where('status', 'pending'),
            'withdrawals as pending_withdrawals' => fn($q) => $q->where('status', 'pending'),
        ])
            ->latest()
            ->paginate(15); // 15 users per page

        return view('admin.users.index', compact('users'));
    }



    public function show(User $user)
    {
        $user->loadCount(['deposits', 'withdrawals']); // optional: for pending counts if you want real data

        return view('admin.users.show', compact('user'));
    }

    public function toggleVerification(Request $request, User $user)
    {
        $request->validate([
            'field'  => 'required|in:identity_verified,account_verified',
            'status' => 'required|boolean',
        ]);

        $field = $request->field;

        $user->update([$field => $request->status ? 1 : 0]);

        $message = $request->status
            ? ucfirst(str_replace('_', ' ', $field)) . " activated successfully."
            : ucfirst(str_replace('_', ' ', $field)) . " deactivated successfully.";

        return redirect()
            ->route('admin.users.show', $user)
            ->with('success', $message);
    }

    public function destroy(User $user)
    {
        // Optional: soft delete or force delete depending on your policy
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

    // app/Http/Controllers/Admin/UserController.php

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'required|string|max:255',
            'email'           => 'required|email|max:255|unique:users,email,' . $user->id,
            'password'        => 'nullable|string|min:6',
            'trading_balance' => 'required|numeric|min:0',
            'locked_funds'    => 'required|numeric|min:0',
            'plan'            => 'required|string|in:BASIC,SILVER,GOLD,DIAMOND,PLATINUM,CUSTOM',
            'dob'             => 'nullable|date',
            'currency'        => 'required|string|in:USD,GBP,EUR,AUD',
            'country'         => 'nullable|string|max:100',
            'state'           => 'nullable|string|max:100',
            'city'            => 'nullable|string|max:100',
            'post_code'       => 'nullable|string|max:20',
            'street_address'  => 'nullable|string|max:255',
            'mobile_number'   => 'nullable|string|max:30',
            'created_at'      => 'nullable|date',
            'updated_at'      => 'nullable|date',
        ]);

        try {
            $data = $validated;

            // Hash password only if provided
            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            } else {
                unset($data['password']);
            }


            $data['name'] = $validated['first_name'] . ' ' . $validated['last_name'];
            $user->update($data);

            return redirect()
                ->route('admin.users.show', $user)
                ->with('success', 'User details updated successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }


    public function copyTrading(User $user)
    {
        $allTraders = Trader::latest()->get();
        $copiedTraders = $user->traders()->get();

        return view('admin.users.copy-trading', compact('user', 'allTraders', 'copiedTraders'));
    }

    public function storeCopy(Request $request, User $user)
    {
        $request->validate([
            'trader_id' => 'required|exists:traders,id',
        ]);

        $traderId = $request->trader_id;

        if ($user->traders()->where('trader_id', $traderId)->exists()) {
            return back()->with('error', 'User is already copying this trader.');
        }

        $user->traders()->attach($traderId);

        return back()->with('success', 'Trader added to copy list successfully.');
    }

    public function destroyCopy(User $user, Trader $trader)
    {
        $user->traders()->detach($trader->id);

        return back()->with('success', 'Stopped copying this trader.');
    }

    public function lockedFunds(User $user)
    {
        return view('admin.users.locked-funds', compact('user'));
    }
    public function storeLockedFunds(Request $request, User $user)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'days'   => 'required|integer|min:1|max:365',
        ]);

        $amount = (float) $validated['amount'];
        $days   = (int) $validated['days'];

        if ($user->trading_balance < $amount) {
            return back()->with('error', 'Insufficient trading balance.');
        }

        DB::transaction(function () use ($user, $amount, $days) {

            $user->decrement('trading_balance', $amount);
            $user->increment('locked_funds', $amount);

            $expiresAt = now()->addDays($days);

            $user->update([
                'login_code_expires_at' => $expiresAt
            ]);
        });

        return back()->with('success', "Locked {$amount} for {$days} days successfully.");
    }
}
