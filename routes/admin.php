<?php
// File: routes/admin.php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WithdrawalController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\TradeController;
use App\Http\Controllers\Admin\TraderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| All admin routes are prefixed with /admin.
| Login routes are publicly accessible.
| Protected routes use the 'auth:admin' middleware (requires admin guard setup in config/auth.php).
*/

Route::prefix('admin')->name('admin.')->group(function () {


    // ====================== AUTH ROUTES (NO MIDDLEWARE) ======================
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // ────────────────────────────────────────────────
    // All PROTECTED admin routes
    // ────────────────────────────────────────────────
    Route::middleware('auth.admin')->group(function () {

        // Copy Trading Management (per user)
        Route::get('users/{user}/copy-trading', [UserController::class, 'copyTrading'])->name('users.copy-trading');
        Route::post('users/{user}/copy-trading', [UserController::class, 'storeCopy'])->name('users.copy-trading.store');
        Route::delete('users/{user}/copy-trading/{trader}', [UserController::class, 'destroyCopy'])->name('users.copy-trading.destroy');

        // Locked Funds (per user)
        Route::get('users/{user}/locked-funds', [UserController::class, 'lockedFunds'])->name('users.locked-funds');
        Route::post('users/{user}/locked-funds', [UserController::class, 'storeLockedFunds'])->name('users.locked-funds.store');


        // Traders Management (global - not nested under user)
        Route::get('/traders', [TraderController::class, 'index'])->name('traders.index');
        Route::get('/traders/create', [TraderController::class, 'create'])->name('traders.create');
        Route::post('/traders', [TraderController::class, 'store'])->name('traders.store');
        Route::get('/traders/{trader}/edit', [TraderController::class, 'edit'])->name('traders.edit');
        Route::put('/traders/{trader}', [TraderController::class, 'update'])->name('traders.update');
        Route::delete('/traders/{trader}', [TraderController::class, 'destroy'])->name('traders.destroy');

        Route::get('/coming-soon', function () {
            return view('admin.coming-soon');
        })->name('coming.soon');

        // Trades Management (per user)
        Route::get('users/{user}/trades', [TradeController::class, 'userTrades'])->name('users.trades.index');
        Route::get('users/{user}/trades/create', [TradeController::class, 'create'])->name('users.trades.create');
        Route::post('users/{user}/trades', [TradeController::class, 'store'])->name('users.trades.store');
        Route::get('users/{user}/trades/{trade}/edit', [TradeController::class, 'edit'])->name('users.trades.edit');
        Route::put('users/{user}/trades/{trade}', [TradeController::class, 'update'])->name('users.trades.update');
        Route::post('users/{user}/trades/{trade}/close', [TradeController::class, 'close'])->name('users.trades.close');

            // Simulate Trades 
        Route::post('users/{user}/trades/simulate', [TradeController::class, 'simulate'])
            ->name('users.trades.simulate');




        // Edit user form
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

        // Update user
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

        // User detail page
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

        // Toggle account verification (identity_verified / account_verified)
        Route::post('/users/{user}/toggle-verification', [UserController::class, 'toggleVerification'])->name('users.toggle-verification');

        // Delete user
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Users management
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show'); // for view detail (placeholder)



        // User-specific withdrawals
        Route::get('/users/{user}/withdrawals', [WithdrawalController::class, 'userWithdrawals'])->name('users.withdrawals.index');
        Route::get('/users/{user}/withdrawals/create', [WithdrawalController::class, 'createForUser'])->name('users.withdrawals.create');
        Route::post('/users/{user}/withdrawals', [WithdrawalController::class, 'storeForUser'])->name('users.withdrawals.store');
        Route::get('/users/{user}/withdrawals/{withdrawal}/edit', [WithdrawalController::class, 'edit'])->name('users.withdrawals.edit');
        Route::put('/users/{user}/withdrawals/{withdrawal}', [WithdrawalController::class, 'update'])->name('users.withdrawals.update');
        Route::delete('/users/{user}/withdrawals/{withdrawal}', [WithdrawalController::class, 'destroy'])->name('users.withdrawals.destroy');

        // All withdrawals (global view)
        Route::get('/withdrawals', [WithdrawalController::class, 'allWithdrawals'])->name('withdrawals.index');
        Route::get('/withdrawals/{withdrawal}/edit', [WithdrawalController::class, 'editGlobal'])->name('withdrawals.edit');
        Route::put('/withdrawals/{withdrawal}', [WithdrawalController::class, 'updateGlobal'])->name('withdrawals.update');


        // ────────────────────────────────────────────────
        // Deposits - User-specific
        // ────────────────────────────────────────────────
        Route::get('/users/{user}/deposits', [DepositController::class, 'userDeposits'])->name('users.deposits.index');
        Route::get('/users/{user}/deposits/create', [DepositController::class, 'createForUser'])->name('users.deposits.create');
        Route::post('/users/{user}/deposits', [DepositController::class, 'storeForUser'])->name('users.deposits.store');
        Route::get('/users/{user}/deposits/{deposit}/edit', [DepositController::class, 'edit'])->name('users.deposits.edit');
        Route::put('/users/{user}/deposits/{deposit}', [DepositController::class, 'update'])->name('users.deposits.update');
        Route::delete('/users/{user}/deposits/{deposit}', [DepositController::class, 'destroy'])->name('users.deposits.destroy');

        // ────────────────────────────────────────────────
        // Deposits - All (global view)
        // ────────────────────────────────────────────────
        Route::get('/deposits', [DepositController::class, 'allDeposits'])->name('deposits.index');
        Route::get('/deposits/{deposit}/edit', [DepositController::class, 'editGlobal'])->name('deposits.edit');
        Route::put('/deposits/{deposit}', [DepositController::class, 'updateGlobal'])->name('deposits.update');
    });
});
