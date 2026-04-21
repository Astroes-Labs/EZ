<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TwoFactorCodeMail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\RateLimiter;
use Masmerise\Toaster\Toaster;

class LoginForm extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;
    public $honeypot = ''; // anti-spam

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
        'honeypot' => 'nullable|size:0',
    ];

    public function login()
    {
        if ($this->honeypot) {
            $this->addError('email', 'Invalid submission.');
            return;
        }

        $this->validate();

        $key = 'login:' . request()->ip();
        if (RateLimiter::tooManyAttempts($key, 10)) {
            $seconds = RateLimiter::availableIn($key);
            $this->addError('email', "Too many attempts. Wait {$seconds}s.");
            Toaster::error("Too many attempts. Wait {$seconds}s.");
            return;
        }
        RateLimiter::hit($key);

        $user = User::where('email', $this->email)
            ->orWhere('email2', $this->email)
            ->first();

        if (!$user || !Hash::check($this->password, $user->password)) {
            $this->addError('email', 'Invalid credentials.');
             Toaster::error('Invalid credentials.'); // 👈
            //  dd("Invalid credentials."); // 👈
            return;
        }

        // Generate 4-digit code
        $code = mt_rand(1000, 9999);
        $user->update([
            'login_code' => $code,
            'login_code_expires_at' => now()->addMinutes(10),
        ]);

        // Send email
        Mail::to($user->email)->send(new TwoFactorCodeMail($code, $user));

        // Store user ID temporarily in session for verification step
        session(['2fa_user_id' => $user->id]);

        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Check your email for the 4-digit code.'
        ]);
         Toaster::success('Check your email for the 4-digit code.'); // 👈

        return redirect()->route('2fa.verify');
        //  return $this->redirect(route('2fa.verify'), navigate: true);
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}