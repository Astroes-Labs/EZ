<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class TwoFactorVerify extends Component
{
    public function render()
    {
        return view('livewire.auth.two-factor-verify')
            ->layout('layouts.auth')
            ->title('Two-Factor Verification | ' . config('app.name'));
    }
}