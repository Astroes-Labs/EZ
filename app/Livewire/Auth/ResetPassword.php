<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class ResetPassword extends Component
{
    public $token;
    public $email;

    public function mount($token)
    {
        $this->token = $token;
        $this->email = request('email');
    }

    public function render()
    {
        return view('livewire.auth.reset-password')
            ->layout('layouts.auth')
            ->title('Reset Password | ' . config('app.name'));
    }
}