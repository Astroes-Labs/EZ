<div
    class="bg-white/5 dark:bg-gray-900/70 backdrop-blur-lg p-8 lg:p-12 rounded-2xl border border-red-600/30 shadow-2xl relative">

    @php
        $inputClass = "w-full px-6 py-4 bg-gray-800/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-600/30 transition";
        $selectClass = "w-full px-6 py-4 bg-gray-800/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-600/30 transition";
        $labelClass = "block text-sm font-medium text-gray-300 mb-2";
    @endphp

    <form wire:submit="register" class="space-y-8">
        @csrf

        <!-- Honeypot -->
        <input type="text" wire:model.defer="honeypot" class="hidden">

        <!-- Names -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="{{ $labelClass }}">First Name *</label>
                <input wire:model.defer="first_name" type="text" class="{{ $inputClass }}">
                @error('first_name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="{{ $labelClass }}">Last Name *</label>
                <input wire:model.defer="last_name" type="text" class="{{ $inputClass }}">
                @error('last_name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Account Type -->
        <div>
            <label class="{{ $labelClass }}">Account Type *</label>
            <select wire:model.lazy="acctype" class="{{ $selectClass }}">
                <option value="">Select Account Type</option>
                <option value="1">Individual Account</option>
                <option value="2">Joint Account</option>
                <option value="3">Business Account</option>
                <option value="4">Retirement Account</option>
                <option value="5">Specialty Account</option>
            </select>
            @error('acctype') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        <!-- Primary Email -->
        <div>
            <label class="{{ $labelClass }}">Primary Email *</label>
            <input wire:model.defer="email" type="email" class="{{ $inputClass }}">
            @error('email') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        @if($showEmail2)
            <div>
                <label class="{{ $labelClass }}">Secondary Email *</label>
                <input wire:model.defer="email2" type="email" class="{{ $inputClass }}">
                @error('email2') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>
        @endif

        @if($showAddressFields)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="address" class="{{ $labelClass }}">Street Address *</label>
                    <input id="address" wire:model.defer="address" type="text" class="{{ $inputClass }}">
                    @error('address') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="city" class="{{ $labelClass }}">City *</label>
                    <input id="city" wire:model.defer="city" type="text" class="{{ $inputClass }}">
                    @error('city') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="state" class="{{ $labelClass }}">State / Province *</label>
                    <input id="state" wire:model.defer="state" type="text" class="{{ $inputClass }}">
                    @error('state') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="postcode" class="{{ $labelClass }}">Postal Code *</label>
                    <input id="postcode" wire:model.defer="postcode" type="text" class="{{ $inputClass }}">
                    @error('postcode') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="vgin" class="{{ $labelClass }}">Verified Government ID Number *</label>
                <input id="vgin" wire:model.defer="vgin" type="text" class="{{ $inputClass }}">
                @error('vgin') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>
        @endif


        @if($showSwiftcode)
            <div>
                <label for="swiftcode" class="{{ $labelClass }}">SWIFT / BIC Code *</label>
                <input id="swiftcode" wire:model.defer="swiftcode" type="text" class="{{ $inputClass }}">
                @error('swiftcode') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>
        @endif

        @if($showDob)
            <div>
                <label for="dob" class="{{ $labelClass }}">Date of Birth *</label>
                <input id="dob" wire:model.defer="dob" type="date" class="{{ $inputClass }}">
                @error('dob') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>
        @endif

        <!-- Country -->
        <div>
            <label class="{{ $labelClass }}">Country *</label>
            <select wire:model.defer="country" class="{{ $selectClass }}">
                <option value="">Choose Country</option>
                @include('home.partial.register-country-select')
            </select>
        </div>

        <!-- Currency -->
        <div>
            <label class="{{ $labelClass }}">Currency *</label>
            <select wire:model.defer="currency" class="{{ $selectClass }}">
                <option value="USD">USD</option>
                <option value="GBP">GBP</option>
                <option value="EUR">EUR</option>
                <option value="AUD">AUD</option>
            </select>
        </div>

        <!-- Plan -->
        <div>
            <label class="{{ $labelClass }}">Plan *</label>
            <select wire:model.defer="acc_type" class="{{ $selectClass }}">
                <option value="">Select Plan</option>
                <option value="BASIC">10,000</option>
                <option value="SILVER">25,000</option>
                <option value="GOLD">50,000</option>
                <option value="DIAMOND">200,000</option>
                <option value="PLATINUM">500,000</option>
                <option value="CUSTOM">CUSTOM</option>
            </select>
        </div>

        <input type="hidden" wire:model.defer="referrer">

        <!-- Passwords -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="password" class="{{ $labelClass }}">Password *</label>
                <input id="password" wire:model.defer="password" type="password" class="{{ $inputClass }}">
                @error('password') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password_confirmation" class="{{ $labelClass }}">Confirm Password *</label>
                <input id="password_confirmation" wire:model.defer="password_confirmation" type="password"
                    class="{{ $inputClass }}">
            </div>
        </div>

        <!-- Agreements -->
        <div class="space-y-4">
            <label for="agree1" class="flex items-center text-gray-300">
                <input id="agree1" type="checkbox" wire:model.defer="agree1" class="h-5 w-5">
                <span class="ml-3">I confirm that I am 18 years of age or older.</span>
            </label>

            <label for="agree2" class="flex items-center text-gray-300">
                <input id="agree2" type="checkbox" wire:model.defer="agree2" class="h-5 w-5">
                <span class="ml-3">I agree with the Terms Of Service.</span>
            </label>

            <label for="agree3" class="flex items-center text-gray-300">
                <input id="agree3" type="checkbox" wire:model.defer="agree3" class="h-5 w-5">
                <span class="ml-3">I agree with the Privacy Policy.</span>
            </label>
        </div>
        <!-- Global Form Error Summary -->
        @if($errors->any())
            <div class="p-6 bg-red-900/50 border border-red-600 rounded-xl text-red-300 text-center">
                <p class="font-medium mb-3">Oops! Please fix the following:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        {{ $error }}<br />
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Submit -->
        <div class="text-center">
            <button type="submit" wire:loading.attr="disabled" wire:target="register"
                class="inline-block bg-red-600 text-white px-12 py-5 rounded-xl font-bold text-lg hover:bg-red-700 transition shadow-xl hover:shadow-2xl transform hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove wire:target="register">
                    Register Account
                </span>

                <span wire:loading wire:target="register" class="flex items-center justify-center">
                    <svg class="animate-spin h-5 w-5 mr-3 text-white" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z">
                        </path>
                    </svg>
                    Creating Account...
                </span>
            </button>
        </div>



    </form>

    
</div>