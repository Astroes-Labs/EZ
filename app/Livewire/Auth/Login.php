<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{


    // CHECK LOGINFORM Livewire component FOR LOGIN LOGIC, THIS COMPONENT ONLY HANDLES THE VIEW AND REDIRECTS
    public function mount()
    {
        // Already logged in → go to dashboard
        if (auth()->check()) {
            $this->redirectRoute('dashboard', navigate: true);
            return;
        }

        // In the middle of 2FA → go back to verification page
        if (session()->has('2fa_user_id')) {
            $this->redirectRoute('2fa.verify', navigate: true); // adjust if needed
            return;
        }
    }
    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.auth')
            ->title('Login | ' . config('app.name'));
    }
}
