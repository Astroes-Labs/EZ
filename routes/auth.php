<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Livewire\RegisterForm;

use App\Livewire\LoginForm;
use App\Livewire\TwoFactorVerify;
use Inertia\Inertia;



// Route::get('/login', LoginForm::class)->name('login');

Route::middleware('guest')->group(function () {
    // In routes/web.php



    Route::get('register', \App\Livewire\Auth\Register::class)->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);


    // Route::get('/register', RegisterForm::class)->name('register');

    Route::get('login', \App\Livewire\Auth\Login::class)->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/2fa/verify', function () {
        return view('auth.two-factor-verify');
    })->name('2fa.verify');

    Route::get('forgot-password', \App\Livewire\Auth\ForgotPassword::class)->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
