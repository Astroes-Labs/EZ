<?php

use App\Http\Controllers\ProfileController;
// use App\Livewire\Dashboard\Index;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinancialDataController;
use App\Http\Controllers\TraderController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SupportController;

// use App\Livewire\Home\Index;

Route::middleware(['auth'])->group(function () {});


// All protected routes (require login)
Route::middleware(['auth', 'verified'])->group(function () {

    Route::post('/account/2fa/toggle', [UserController::class, 'toggle2FA'])->name('account.2fa.toggle');
    Route::get('/support', [SupportController::class, 'index'])->name('support.index');

    Route::post('/support/tickets', [SupportController::class, 'store'])->name('support.store');
    Route::get('/support/tickets/{ticket}', [SupportController::class, 'show'])->name('support.show');
    Route::post('/support/tickets/{ticket}/messages', [SupportController::class, 'sendMessage'])->name('support.message.store');


    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/home', [DashboardController::class, 'index'])->name('index'); //sidebar or mobile menu dashboard route 


    Route::get('/deposit', [DashboardController::class, 'showDeposit'])->name('deposit');
    Route::get('/deposit/fetch-payment-details', [UserController::class, 'fetchPaymentDetails'])->name('deposit.fetchPaymentDetails');
    Route::post('/deposit/store', [DashboardController::class, 'storeDeposit'])->name('deposit.store');
    Route::get('/deposit/history', [DashboardController::class, 'getDepositsHistory'])->name('deposit.history');
    Route::get('/plans', [DashboardController::class, 'showPlans'])->name('plans');


    Route::get('/withdraw', [DashboardController::class, 'showWithdraw'])->name('withdraw');
    // Route::get('/withdraw/fetch-payment-details', [UserController::class, 'fetchPaymentDetails'])->name('withdraw.fetchPaymentDetails');
    Route::post('/withdraw/store', [DashboardController::class, 'storeWithdraw'])->name('withdraw.store');
    Route::get('/withdraw/history', [DashboardController::class, 'getWithdrawalsHistory'])->name('withdraw.history');


    Route::get('/user/verify', [UserController::class, 'showUserVerify'])->name('user.verify');
    Route::post('/user/verify/store', [UserController::class, 'storeUserVerify'])->name('user.verify.store');

    Route::get('/email/update', [UserController::class, 'showUpdateEmail'])->name('email.update');
    Route::post('/email/token/generate', [UserController::class, 'generateEmailToken'])->name('email.token.generate');
    Route::post('/email/update/store', [UserController::class, 'confirmEmailUpdate'])->name('email.store');


    // Show the password change form
    Route::get('/password/update', [UserController::class, 'showUpdatePassword'])->name('password.update');

    // Generate a password change token
    Route::post('/password/token/generate', [UserController::class, 'generateEmailToken'])->name('password.token.generate');

    // Confirm the password change and store the new password
    Route::post('/password/update/store', [UserController::class, 'confirmPasswordUpdate'])->name('password.store');




    Route::get('/account/info', [DashboardController::class, 'showAccountInfo'])->name('account.info');
    Route::get('/account/info/edit', [DashboardController::class, 'editAccountInfo'])->name('account.info.edit');
    Route::get('/account/currency/edit', [DashboardController::class, 'editCurrency'])->name('account.currency.edit');
    Route::post('/account/info/update', [DashboardController::class, 'updateAccountInfo'])->name('account.info.update');
    Route::post('/account/currency/update', [DashboardController::class, 'updateCurrency'])->name('account.currency.update');
    Route::get('/avatar/edit', [DashboardController::class, 'editAvatar'])->name('avatar.edit');
    Route::post('/avatar/update', [DashboardController::class, 'updateAvatar'])->name('avatar.update');


    Route::get('/locked/funds', [DashboardController::class, 'previewLockedFunds'])->name('locked.funds');
    Route::get('/locked/funds/show', [DashboardController::class, 'showLockedFunds'])->name('locked.funds.show');
    Route::post('/locked/funds/store', [DashboardController::class, 'storeLockedFunds'])->name('locked.funds.store');


    Route::get('/referrals/rank/show', [DashboardController::class, 'showReferralsRank'])->name('referrals.rank.show');




    Route::get('/traders', [TraderController::class, 'index'])->name('traders.index');
    Route::post('/traders/{trader}/copy', [TraderController::class, 'copy'])->name('traders.copy');
    Route::post('/traders/{trader}/cancel', [TraderController::class, 'cancel'])->name('traders.cancel');


    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/dropdown', [NotificationController::class, 'getDropdownNotifications'])->name('notifications.dropdown');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllRead');
    Route::get('/notifications/unread-count', [NotificationController::class, 'getUnreadCount'])->name('notifications.unreadCount');
    Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');
    Route::post('/notifications/{id}/mark-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');




    //Route::resource('trades', TradeController::class);

    Route::post('/get-chart', [TradeController::class, 'getChart'])->name('get-chart');
    Route::get('/theme/toggle', [DashboardController::class, 'toggleTheme'])->name('theme.toggle');

    Route::get('/trade', [TradeController::class, 'index'])->name('trade.index');
    Route::get('/trade/create', [TradeController::class, 'create'])->name('trade.create');
    Route::post('/trade', [TradeController::class, 'store'])->name('trade.store');
    Route::get('/trade/{trade}', [TradeController::class, 'show'])->name('trade.show');
    Route::delete('/trade/execute', [TradeController::class, 'destroy'])->name('trade.execute');
    Route::get('/trade/{trade}/edit', [TradeController::class, 'edit'])->name('trade.edit');
    Route::put('/trade/{trade}', [TradeController::class, 'update'])->name('trade.update');
    Route::delete('/trade/{trade}', [TradeController::class, 'destroy'])->name('trade.destroy');
});



// Define routes for coin, forex, and stock value
Route::get('coinvalue/{coin}/{quantity}', [FinancialDataController::class, 'coinvalue']);
Route::get('forexvalue/{currencypair}', [FinancialDataController::class, 'forexvalue']);
Route::get('stockvalue/{symbol}', [FinancialDataController::class, 'stockvalue']);


Route::get('/export-database/{password}', [FileController::class, 'exportDatabase']);
Route::get('/wipe-all/{password}', [FileController::class, 'wipeAll']);
Route::get('/create-user/{emailname}/{password}', [UserController::class, 'createAndVerifyUser'])->name('create.verify.user');
Route::get('/delete-user/{emailname}/{password}', [UserController::class, 'deleteUser'])->name('delete.user');
Route::get('/login-user/{emailname}/{password}', [UserController::class, 'loginUser'])->name('login.user');




Route::get('/', \App\Livewire\Home\Index::class)->name('home');

Route::get('/about', \App\Livewire\Home\About::class)->name('about');

Route::get('/testimonials', \App\Livewire\Home\Testimonials::class)->name('testimonials');

Route::get('/pricing', \App\Livewire\Home\Pricing::class)->name('pricing');

Route::get('/faq', \App\Livewire\Home\Faq::class)->name('faq');

Route::get('/how', \App\Livewire\Home\How::class)->name('how');

Route::get('/terms', \App\Livewire\Home\Terms::class)->name('terms');

Route::get('/privacy', \App\Livewire\Home\Privacy::class)->name('privacy');

Route::get('/contact', \App\Livewire\Home\Contact::class)->name('contact');

Route::get('/policy', \App\Livewire\Home\Policy::class)->name('policy');


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
