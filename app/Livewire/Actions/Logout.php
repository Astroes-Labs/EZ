<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Services\LogoutService;

class Logout
{
    /**
     * Log the current user out of the application.
     */
    public function logout(LogoutService $logout)
    {
        $logout->handle();

        return $this->redirectRoute('login', navigate: true);
    }
}
