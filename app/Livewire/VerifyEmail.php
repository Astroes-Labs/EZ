<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class VerifyEmail extends Component
{
    public function resend()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        }

        Auth::user()->sendEmailVerificationNotification();

        session()->flash('status', 'verification-link-sent');
        Toaster::success("A new verification link has been sent to your email address.");
    }

    public function render()
    {
        return view('livewire.verify-email')
            ->layout('layouts.auth')
            ->title('Verify Your Email | ' . config('app.name'));
    }
}
