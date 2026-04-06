<?php

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

new class extends Component
{
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

    public function mount()
    {
        $this->referrer = request()->query('refid', 0);
    }

    protected function rules()
    {
        return [
            'first_name'           => 'required|string|max:220',
            'last_name'            => 'required|string|max:220',
            'email'                => 'required|email|max:220|unique:users,email',
            'email2'               => 'nullable|email|max:220',
            'dob'                  => 'required|date',
            'address'              => 'required_if:acctype,3,5|string|max:220',
            'city'                 => 'required_if:acctype,3,5|string|max:220',
            'state'                => 'required_if:acctype,3,5|string|max:220',
            'postcode'             => 'required_if:acctype,3,5|string|max:220',
            'vgin'                 => 'required_if:acctype,3,5|string|max:220',
            'swiftcode'            => 'required_if:acctype,3|string|max:220',
            'country'              => 'required|string',
            'acctype'              => 'required|in:1,2,3,4,5',
            'currency'             => 'required|in:USD,GBP,EUR,AUD',
            'acc_type'             => 'required|in:BASIC,SILVER,GOLD,DIAMOND,PLATINUM,CUSTOM',
            'referrer'             => 'nullable|integer',
            'password'             => 'required|string|min:8|confirmed',
            'agree1'               => 'accepted',
            'agree2'               => 'accepted',
            'agree3'               => 'accepted',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $validated = $this->validate();

        $user = User::create([
            'first_name'    => $validated['first_name'],
            'last_name'     => $validated['last_name'],
            'email'         => $validated['email'],
            'password'      => Hash::make($validated['password']),
            'country'       => $validated['country'],
            'account_type'  => $validated['acctype'],
            'currency'      => $validated['currency'],
            'plan'          => $validated['acc_type'],
            'referrer_id'   => $validated['referrer'] ?: null,
            // ← add phone, vgin, swiftcode etc if your User model has these columns
        ]);

        auth()->login($user);

        toastr()->success('Account Created Successfully!');

        return $this->redirect('/verify-email', navigate: true);
    }

    public function render()
    {
        return view('components.⚡register-form');
    }
};

?>

<!-- Your actual form HTML here -->

<div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12 lg:py-20 bg-gradient-to-br from-gray-950 via-black to-red-950">
    <div class="w-full max-w-4xl space-y-12 animate-fade-in">
        <!-- Logo / Title -->
        <div class="text-center">
            <a href="{{ route('home') }}">
                <img src="{{ url('assets/images/logo/coinmaxe.png') }}" alt="{{ config('app.name') }}" class="h-16 w-auto mx-auto">
            </a>
            <h2 class="mt-8 text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                Create Your <span class="text-red-500">Investment Account</span>
            </h2>
            <p class="mt-4 text-lg text-gray-400">
                Join {{ config('app.name') }} in a few minutes and start building your financial future.
            </p>
        </div>

        <!-- Form -->
        <form wire:submit="register" class="space-y-8 bg-white/5 dark:bg-gray-900/70 backdrop-blur-lg p-8 lg:p-12 rounded-2xl border border-red-600/30 shadow-2xl">
            @csrf

            <!-- Two-column fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">First Name *</label>
                    <input wire:model.debounce.500ms="first_name" type="text" required 
                           class="w-full px-6 py-4 bg-gray-800/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-600/30 transition">
                    @error('first_name') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Last Name *</label>
                    <input wire:model.debounce.500ms="last_name" type="text" required 
                           class="w-full px-6 py-4 bg-gray-800/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-600/30 transition">
                    @error('last_name') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Account Type -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Account Type *</label>
                <select wire:model="acctype" required 
                        class="w-full px-6 py-4 bg-gray-800/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-600/30 transition">
                    <option value="">Select Account Type</option>
                    <option value="1">Individual Account</option>
                    <option value="2">Joint Account</option>
                    <option value="3">Business Account</option>
                    <option value="4">Retirement Account</option>
                    <option value="5">Specialty Account</option>
                </select>
                @error('acctype') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>

            <!-- Conditional fields (shown/hidden via Livewire) -->
            @if(in_array($acctype, ['1', '4']))
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Email *</label>
                    <input wire:model.debounce.500ms="email" type="email" required 
                           class="w-full px-6 py-4 bg-gray-800/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-600/30 transition">
                    @error('email') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
            @endif

            @if($acctype == '2')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Email *</label>
                        <input wire:model.debounce.500ms="email" type="email" required>
                        @error('email') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Email 2 *</label>
                        <input wire:model.debounce.500ms="email2" type="email" required>
                        @error('email2') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>
                </div>
            @endif

            @if(in_array($acctype, ['3', '5']))
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Address *</label>
                        <input wire:model.debounce.500ms="address" type="text" required>
                        @error('address') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">City *</label>
                        <input wire:model.debounce.500ms="city" type="text" required>
                        @error('city') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>
                </div>
                <!-- Add state, postcode, vgin, swiftcode similarly -->
            @endif

            <!-- Country -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Country *</label>
                <select wire:model="country" required 
                        class="w-full px-6 py-4 bg-gray-800/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-600/30 transition">
                    <option value="">Choose Country</option>
                    @include('home.register-country-select')
                </select>
                @error('country') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>

            <!-- Passwords -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="relative">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Password *</label>
                    <input wire:model.debounce.500ms="password" type="password" required 
                           class="w-full px-6 py-4 bg-gray-800/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-600/30 transition">
                    @error('password') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div class="relative">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Confirm Password *</label>
                    <input wire:model.debounce.500ms="password_confirmation" type="password" required 
                           class="w-full px-6 py-4 bg-gray-800/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-600/30 transition">
                    @error('password_confirmation') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Agreements -->
            <div class="space-y-4">
                <label class="flex items-center text-gray-300">
                    <input type="checkbox" wire:model="agree1" class="h-5 w-5 rounded border-gray-600 text-red-600 focus:ring-red-600">
                    <span class="ml-3">I confirm that I am 18 years of age or older.</span>
                </label>
                <label class="flex items-center text-gray-300">
                    <input type="checkbox" wire:model="agree2" class="h-5 w-5 rounded border-gray-600 text-red-600 focus:ring-red-600">
                    <span class="ml-3">I have read and agree with the <a href="{{ route('terms') }}" class="text-red-400 hover:underline">Terms Of Service</a>.</span>
                </label>
                <label class="flex items-center text-gray-300">
                    <input type="checkbox" wire:model="agree3" class="h-5 w-5 rounded border-gray-600 text-red-600 focus:ring-red-600">
                    <span class="ml-3">I have read and agree with the <a href="{{ route('privacy') }}" class="text-red-400 hover:underline">Privacy Policy</a>.</span>
                </label>
            </div>

            <!-- Submit -->
            <div class="text-center">
                <button type="submit" wire:loading.attr="disabled"
                        class="inline-block bg-red-600 text-white px-10 py-5 rounded-xl font-bold text-lg hover:bg-red-700 transition shadow-xl hover:shadow-2xl transform hover:-translate-y-1 disabled:opacity-50">
                    <span wire:loading.remove>Register</span>
                    <span wire:loading>Creating Account...</span>
                </button>
            </div>

            <!-- Error bag -->
            @if($errors->any())
                <div class="mt-6 p-4 bg-red-900/50 border border-red-600 rounded-xl text-red-300">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection