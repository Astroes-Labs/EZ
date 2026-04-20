<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\LogoutService;

class TwoFactorVerify extends Component
{
    public $code = '';
    public $user;

    // This method runs when the component is initialized
    public function mount()
    {
        $userId = session('2fa_user_id');

        if (!$userId) {
            $this->redirectRoute('login', navigate: true);
            return;
        }

        $this->user = User::find($userId);

        if (!$this->user || !$this->user->login_code) {
            session()->forget('2fa_user_id');
            $this->redirectRoute('login', navigate: true);
            return;
        }
    }

    public function verify()
    {
        $this->validate([
            'code' => 'required|digits:4',
        ]);

        if ($this->user->login_code !== $this->code) {
            $this->addError('code', 'Invalid code.');
            return;
        }

        if (now()->gt($this->user->login_code_expires_at)) {
            $this->addError('code', 'Code has expired.');
            return;
        }

        // Success
        $this->user->update([
            'login_code' => null,
            'login_code_expires_at' => null,
        ]);

        Auth::login($this->user);
        session()->forget('2fa_user_id');

        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Login successful!'
        ]);

        return redirect()->intended(route('dashboard'));
    }


    public function restartLogin(LogoutService $logout)
    {
        $logout->handle();

        return $this->redirectRoute('login', navigate: true);
    }
    public function render()
    {
        return view('livewire.auth.two-factor-verify')
            ->layout('layouts.auth')
            ->title('Two-Factor Verification | ' . config('app.name'));
    }
}
