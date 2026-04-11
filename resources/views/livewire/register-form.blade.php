{{-- <div class="bg-[#1a2238] border border-[#222f53] rounded-3xl p-8 lg:p-12 shadow-2xl"> --}}

<div>
    <form wire:submit="register" class="space-y-8">
        @csrf

        <!-- Honeypot -->
        <input type="text" wire:model.defer="honeypot" class="hidden">

        <!-- Full Name -->
        {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> --}}
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">First Name *</label>
                <input wire:model.defer="first_name" 
                       type="text" 
                       class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                @error('first_name') 
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p> 
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Last Name *</label>
                <input wire:model.defer="last_name" 
                       type="text" 
                       class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                @error('last_name') 
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p> 
                @enderror
            </div>
        {{-- </div> --}}

        <!-- Account Type -->
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">Account Type *</label>
            <select wire:model.lazy="acctype" 
                    class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                <option value="">Select Account Type</option>
                <option value="1">Individual Account</option>
                <option value="2">Joint Account</option>
                <option value="3">Business Account</option>
                <option value="4">Retirement Account</option>
                <option value="5">Specialty Account</option>
            </select>
            @error('acctype') 
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p> 
            @enderror
        </div>

        <!-- Primary Email -->
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">Primary Email *</label>
            <input wire:model.defer="email" 
                   type="email" 
                   class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
            @error('email') 
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p> 
            @enderror
        </div>

        @if($showEmail2)
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Secondary Email</label>
                <input wire:model.defer="email2" 
                       type="email" 
                       class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                @error('email2') 
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p> 
                @enderror
            </div>
        @endif

        @if($showAddressFields)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Street Address *</label>
                    <input wire:model.defer="address" 
                           type="text" 
                           class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                    @error('address') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">City *</label>
                    <input wire:model.defer="city" 
                           type="text" 
                           class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                    @error('city') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">State / Province *</label>
                    <input wire:model.defer="state" 
                           type="text" 
                           class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                    @error('state') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Postal Code *</label>
                    <input wire:model.defer="postcode" 
                           type="text" 
                           class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                    @error('postcode') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Verified Government ID Number *</label>
                <input wire:model.defer="vgin" 
                       type="text" 
                       class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                @error('vgin') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>
        @endif

        @if($showSwiftcode)
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">SWIFT / BIC Code *</label>
                <input wire:model.defer="swiftcode" 
                       type="text" 
                       class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                @error('swiftcode') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>
        @endif

        @if($showDob)
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Date of Birth *</label>
                <input wire:model.defer="dob" 
                       type="date" 
                       class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                @error('dob') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>
        @endif

        <!-- Country -->
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">Country *</label>
            <select wire:model.defer="country" 
                    class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                <option value="">Choose Country</option>
                @include('home.partial.register-country-select')
            </select>
        </div>

        <!-- Currency -->
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">Currency *</label>
            <select wire:model.defer="currency" 
                    class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                <option value="USD">USD</option>
                <option value="GBP">GBP</option>
                <option value="EUR">EUR</option>
                <option value="AUD">AUD</option>
            </select>
        </div>

        <!-- Plan -->
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">Plan *</label>
            <select wire:model.defer="acc_type" 
                    class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
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
        {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> --}}
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Password *</label>
                <input wire:model.defer="password" 
                       type="password" 
                       class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
                @error('password') 
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p> 
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Confirm Password *</label>
                <input wire:model.defer="password_confirmation" 
                       type="password" 
                       class="w-full px-6 py-4 bg-[#0a0f1c] border border-[#222f53] rounded-2xl text-white placeholder-gray-500 focus:border-[#eac46e] focus:ring-2 focus:ring-[#eac46e]/30 transition-all">
            </div>
        {{-- </div> --}}

        <!-- Agreements -->
        <div class="space-y-4 text-sm">
            <label class="flex items-center text-gray-300 cursor-pointer">
                <input id="agree1" type="checkbox" wire:model.defer="agree1" class="h-5 w-5 rounded border-[#222f53] text-[#eac46e]">
                <span class="ml-3">I confirm that I am 18 years of age or older.</span>
            </label>

            <label class="flex items-center text-gray-300 cursor-pointer">
                <input id="agree2" type="checkbox" wire:model.defer="agree2" class="h-5 w-5 rounded border-[#222f53] text-[#eac46e]">
                <span class="ml-3">I agree with the <a href="{{ route('terms') }}" class="text-[#eac46e] hover:underline">Terms of Service</a></span>
            </label>

            <label class="flex items-center text-gray-300 cursor-pointer">
                <input id="agree3" type="checkbox" wire:model.defer="agree3" class="h-5 w-5 rounded border-[#222f53] text-[#eac46e]">
                <span class="ml-3">I agree with the <a href="{{ route('policy') }}" class="text-[#eac46e] hover:underline">Privacy Policy</a></span>
            </label>
        </div>

        <!-- Global Error Summary -->
        @if($errors->any())
            <div class="p-6 bg-red-900/50 border border-red-600 rounded-2xl text-red-300 text-sm">
                <p class="font-medium mb-3">Oops! Please fix the following:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Submit Button -->
        <div class="text-center pt-4">
            <button type="submit" 
                    wire:loading.attr="disabled"
                    class="w-full py-5 bg-[#eac46e] hover:bg-amber-300 text-[#111827] font-bold rounded-2xl transition-all active:scale-95 disabled:opacity-70">
                <span wire:loading.remove>Register Account</span>
                <span wire:loading class="flex items-center justify-center gap-3">
                    <svg class="animate-spin h-5 w-5 text-[#111827]" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    Creating Account...
                </span>
            </button>
        </div>

    </form>

</div>