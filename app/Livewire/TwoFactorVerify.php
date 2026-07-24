<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TwoFactorVerify extends Component
{
    public $code = '';
    public $user;

    public function mount()
    {
        $userId = session('2fa_user_id');

        if (!$userId) {
            return redirect()->route('login');
        }

        $this->user = User::find($userId);

        if (!$this->user || !$this->user->login_code) {
            session()->forget('2fa_user_id');
            return redirect()->route('login');
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

    public function render()
    {
        return view('livewire.two-factor-verify');
    }
}