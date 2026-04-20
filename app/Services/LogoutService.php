<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LogoutService
{
    /**
     * Create a new class instance.
     */
    public function handle(): void
    {
        Auth::guard('web')->logout();

        Session::forget('2fa_user_id');

        Session::invalidate();

        Session::regenerateToken();
    }
}
