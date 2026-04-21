<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Masmerise\Toaster\Toaster;

class ForgotPassword extends Component
{
    public $email = '';

    protected $rules = [
        'email' => ['required', 'email'],
    ];

    public function store()
    {
        $this->validate();

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($status === Password::RESET_LINK_SENT) {
            Toaster::success(__('We have emailed you a password reset link.'));
            $this->email = ''; // Clear the field after success
        } else {
            Toaster::error(__($status));
            $this->addError('email', __($status));
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')
            ->layout('layouts.auth')
            ->title('Forgot Password | ' . config('app.name'));
    }
}