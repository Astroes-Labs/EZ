<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\WithFileUploads;
use Illuminate\Validation\Validator;

class RegisterForm extends Component
{
    use WithFileUploads;

    public $photo_front_view;
    public $photo_back_view;
    public $honeypot = '';

    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $email2 = '';
    public $dob = '';
    public $address = '';
    public $city = '';
    public $state = '';
    public $postcode = '';
    public $vgin = '';
    public $swiftcode = '';
    public $country = '';
    public $acctype = '';
    public $currency = 'USD';
    public $acc_type = '';
    public $referrer = '';
    public $password = '';
    public $password_confirmation = '';

    public $agree1 = false;
    public $agree2 = false;
    public $agree3 = false;

    public $showEmail2 = false;
    public $showAddressFields = false;
    public $showSwiftcode = false;
    public $showVgin = false;
    public $showDob = true;

    protected $validationAttributes = [
        'acctype'          => 'Account Type',
        'first_name'       => 'First Name',
        'last_name'        => 'Last Name',
        'email'            => 'Email Address',
        'email2'           => 'Secondary Email',
        'dob'              => 'Date of Birth',
        'address'          => 'Street Address',
        'city'             => 'City',
        'state'            => 'State / Province',
        'postcode'         => 'Postal Code',
        'vgin'             => 'VGIN',
        'swiftcode'        => 'SWIFT / BIC Code',
        'country'          => 'Country',
        'currency'         => 'Currency',
        'acc_type'         => 'Plan',
        'password'         => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'photo_front_view' => 'Front View Photo',
        'photo_back_view'  => 'Back View Photo',
        'agree1'           => 'Age Confirmation',
        'agree2'           => 'Terms of Service',
        'agree3'           => 'Privacy Policy',
    ];

    protected $messages = [
        'agree1.accepted' => 'You must confirm you are 18 or older.',
        'agree2.accepted' => 'You must accept the Terms of Service.',
        'agree3.accepted' => 'You must accept the Privacy Policy.',
        'email.unique'    => 'This email is already registered.',
        // Add more custom messages as needed
    ];

    public function mount()
    {
        $this->referrer = request()->query('refid', 0);
    }

    public function updatedAcctype($value)
    {
        $this->resetVisibility();

        if (in_array($value, ['1', '4'])) {
            $this->showDob = true;
        } elseif ($value == '2') {
            $this->showEmail2 = true;
            $this->showEmail2 = true;
            $this->showDob = true;
        } elseif ($value == '3') {
            $this->showAddressFields = true;
            $this->showVgin = true;
            $this->showSwiftcode = true;
            $this->showDob = true;
        } elseif ($value == '5') {
            $this->showAddressFields = true;
            $this->showVgin = true;
            $this->showDob = true;
        }
    }

    private function resetVisibility()
    {
        $this->showEmail2 = false;
        $this->showAddressFields = false;
        $this->showSwiftcode = false;
        $this->showVgin = false;
        $this->showDob = true; // always required unless you add logic to disable
    }

    public function boot()
    {
        // Hook into validation to dispatch toast on failure
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if ($validator->errors()->isNotEmpty()) {
                    $this->dispatch('toast', [
                        'type'    => 'error',
                        'message' => 'Please correct the errors in the form.',
                    ]);
                }
            });
        });
    }

    protected function rules()
    {
        $rules = [
            'first_name' => 'required|string|max:220',
            'last_name'  => 'required|string|max:220',
            'email'      => [
                'required',
                'email',
                'max:220',
                'unique:users',
                function ($attribute, $value, $fail) {
                    $domain = strtolower(explode('@', $value)[1] ?? '');
                    $disposable = ['tempmail.com', 'mailinator.com', '10minutemail.com', 'guerrillamail.com', 'yopmail.com', 'sharklasers.com', 'trashmail.com'];
                    if (in_array($domain, $disposable)) {
                        $fail('Disposable email addresses are not allowed.');
                    }
                },
            ],
            'password' => 'required|min:8|confirmed',
            'agree1'   => 'accepted',
            'agree2'   => 'accepted',
            'agree3'   => 'accepted',
            'country'  => 'required',
            'acctype'  => 'required|in:1,2,3,4,5',
            'currency' => 'required|in:USD,GBP,EUR,AUD',
            'acc_type' => 'required|in:BASIC,SILVER,GOLD,DIAMOND,PLATINUM,CUSTOM',
            'photo_front_view' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'photo_back_view'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'honeypot' => 'nullable|size:0',
            'referrer' => 'nullable|integer', 
        ];

        if ($this->showEmail2) {
            $rules['email2'] = 'required|email|max:220';
        }
        if ($this->showAddressFields) {
            $rules['address']   = 'required|string|max:220';
            $rules['city']      = 'required|string|max:220';
            $rules['state']     = 'required|string|max:220';
            $rules['postcode']  = 'required|string|max:220';
            $rules['vgin']      = 'required|string|max:220';
        }
        if ($this->showSwiftcode) {
            $rules['swiftcode'] = 'required|string|max:220';
        }
        if ($this->showDob) {
            $rules['dob'] = 'required|date';
        }

        return $rules;
    }

    public function register()
    {
        if ($this->honeypot) {
            $this->dispatch('toast', ['type' => 'error', 'message' => 'Invalid submission detected (spam detected).']);
            return;
        }

        $key = 'register:' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            $this->dispatch('toast', [
                'type'    => 'error',
                'message' => "Too many attempts. Please wait {$seconds} seconds.",
            ]);
            return;
        }

        RateLimiter::hit($key);

        $validated = $this->validate();

        $name = trim("{$validated['first_name']} {$validated['last_name']}");

        $user = User::create([
            'name'         => $name,
            'first_name'   => $validated['first_name'],
            'last_name'    => $validated['last_name'],
            'email'        => $validated['email'],
            'password'     => Hash::make($validated['password']),
            'country'      => $validated['country'],
            'account_type' => $validated['acctype'],
            'currency'     => $validated['currency'],
            'plan'         => $validated['acc_type'],
            'referrer_id'  => $validated['referrer'] ?: null,
            // add dob, address etc. if columns exist
        ]);

        if ($this->photo_front_view) {
            $user->photo_front_view = $this->photo_front_view->store('photos/' . $user->id, 'public');
        }
        if ($this->photo_back_view) {
            $user->photo_back_view = $this->photo_back_view->store('photos/' . $user->id, 'public');
        }

        if ($user->photo_front_view || $user->photo_back_view) {
            $user->save();
        }

        event(new Registered($user));
        Auth::login($user);

        $this->dispatch('toast', [
            'type'    => 'success',
            'message' => 'Account created successfully!',
        ]);

        return $this->redirect('/verify-email', navigate: true);
    }

    /*   public function render()
    {
        return view('livewire.register-form')
            ->layout('layouts.app'); // adjust if needed
    } */

    public function render()
    {
        return view('livewire.register-form');
    }
}
