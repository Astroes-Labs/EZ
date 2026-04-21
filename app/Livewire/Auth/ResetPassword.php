<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\PasswordReset;
use Masmerise\Toaster\Toaster;

class ResetPassword extends Component
{
    public $token;
    public $email;

    // Form fields
    public $password = '';
    public $password_confirmation = '';

    public function mount($token)
    {
        $this->token = $token;
        $this->email = request('email');
    }

    protected function rules(): array
    {
        return [
            'email'                  => 'required|email',
            'password'               => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation'  => 'required',
        ];
    }

    public function store()
    {
        $this->validate();

        $status = Password::reset(
            [
                'email'                 => $this->email,
                'password'              => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token'                 => $this->token,
            ],
            function ($user) {
                $user->forceFill([
                    'password'       => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            Toaster::success('Your password has been reset successfully!');
            return redirect()->route('login');
        }

        // Failed reset
        Toaster::error(trans($status));
        $this->addError('email', trans($status));
    }

    public function render()
    {
        return view('livewire.auth.reset-password')
            ->layout('layouts.auth')
            ->title('Reset Password | ' . config('app.name'));
    }
}