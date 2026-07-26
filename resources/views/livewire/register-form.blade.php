<div class="min-h-screen bg-[#07070a] text-gray-100 font-sans">

    <!-- Page Hero / Banner (Adjusted Padding) -->
    <section class="relative bg-[#07070a] overflow-hidden pt-12 pb-6" id="banner">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/40 pointer-events-none"></div>
        <div
            class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent">
        </div>

        <div class="container mx-auto px-6 lg:px-12 relative z-10 text-center py-6">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tighter uppercase font-mono mb-2">
                CREATE <span class="text-[#8b5cf6]">ACCOUNT</span>
            </h1>
            <p class="text-xs text-gray-400 font-light max-w-xl mx-auto uppercase tracking-wide">
                Join {{ config('app.name') }} and start your investment journey today
            </p>
        </div>
    </section>

    <!-- Registration Section -->
    <section class="pb-24 pt-2 bg-[#07070a]">
        <div class="w-full max-w-7xl mx-auto {{-- px-4  sm:px-6 lg:px-8 --}}">
            <div
                class="bg-[#111116] border border-white/10 p-6 sm:p-10 lg:p-16 relative group shadow-[0_20px_60px_rgba(0,0,0,0.9)]">
                <div
                    class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent">
                </div>

                <form wire:submit="register" class="space-y-6">
                    @csrf

                    <!-- Honeypot -->
                    <input type="text" wire:model.defer="honeypot" class="hidden">

                    <!-- Section Header: Personal Info -->
                    <div class="border-b border-white/10 pb-3 pt-2">
                        <h3 class="text-sm font-mono text-[#8b5cf6] uppercase tracking-widest font-semibold">
                            Personal Information</h3>
                    </div>

                    <!-- First & Last Name -->
                    <div class="flex flex-col sm:grid sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">First
                                Name *</label>
                            <input wire:model.defer="first_name" type="text"
                                class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                placeholder="First Name">
                            @error('first_name')
                                <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Last
                                Name *</label>
                            <input wire:model.defer="last_name" type="text"
                                class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                placeholder="Last Name">
                            @error('last_name')
                                <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- Account Type & Primary Email -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Account
                                Type *</label>
                            <select wire:model.lazy="acctype"
                                class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 transition-all rounded-none">
                                <option value="">Select Account Type</option>
                                <option value="1">Individual Account</option>
                                <option value="2">Joint Account</option>
                                <option value="3">Business Account</option>
                                <option value="4">Retirement Account</option>
                                <option value="5">Specialty Account</option>
                            </select>
                            @error('acctype')
                                <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Primary
                                Email *</label>
                            <input wire:model.defer="email" type="email"
                                class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                placeholder="email@example.com">
                            @error('email')
                                <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    @if ($showEmail2)
                        <div>
                            <label
                                class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Secondary
                                Email</label>
                            <input wire:model.defer="email2" type="email"
                                class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                placeholder="secondary@example.com">
                            @error('email2')
                                <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    @if ($showAddressFields)
                        <div class="border-b border-white/10 pb-3 pt-4">
                            <h3 class="text-sm font-mono text-[#8b5cf6] uppercase tracking-widest font-semibold">02.
                                Address & Verification Details</h3>
                        </div>

                        <div class="flex flex-col gap-6">
                            <div>
                                <label
                                    class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Street
                                    Address *</label>
                                <input wire:model.defer="address" type="text"
                                    class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                    placeholder="Street Address">
                                @error('address')
                                    <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <label
                                        class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">City
                                        *</label>
                                    <input wire:model.defer="city" type="text"
                                        class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                        placeholder="City">
                                    @error('city')
                                        <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">State
                                        / Province *</label>
                                    <input wire:model.defer="state" type="text"
                                        class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                        placeholder="State">
                                    @error('state')
                                        <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Postal
                                        Code *</label>
                                    <input wire:model.defer="postcode" type="text"
                                        class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                        placeholder="Postal Code">
                                    @error('postcode')
                                        <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Verified
                                    Government ID Number *</label>
                                <input wire:model.defer="vgin" type="text"
                                    class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                    placeholder="ID Number">
                                @error('vgin')
                                    <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    @endif

                    {{-- @if ($showSwiftcode || $showDob) --}}
                        <div class="class="space-y-6">
                            @if ($showSwiftcode)
                                <div>
                                    <label
                                        class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">SWIFT
                                        / BIC Code *</label>
                                    <input wire:model.defer="swiftcode" type="text"
                                        class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                        placeholder="SWIFT / BIC">
                                    @error('swiftcode')
                                        <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endif

                            @if ($showDob)
                                <div class="mt-4">
                                    <label
                                        class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Date
                                        of Birth *</label>
                                    <input wire:model.defer="dob" type="date"
                                        class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none">
                                    @error('dob')
                                        <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endif
                        </div>
                    {{-- @endif --}}

                    <!-- Section Header: Preferences & Plan -->
                    <div class="border-b border-white/15 pb-3 pt-4">
                        <h3 class="text-sm font-mono text-[#8b5cf6] uppercase tracking-widest font-semibold">Financial
                            Settings & Plan</h3>
                    </div>

                    <!-- Country & Currency -->
                    <div class="flex flex-col sm:grid sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Country
                                *</label>
                            <select wire:model.defer="country"
                                class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 transition-all rounded-none">
                                <option value="">Choose Country</option>
                                @include('home.partial.register-country-select')
                            </select>
                        </div>

                        <div>
                            <label
                                class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Currency
                                *</label>
                            <select wire:model.defer="currency"
                                class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 transition-all rounded-none">
                                <option value="USD">USD</option>
                                <option value="GBP">GBP</option>
                                <option value="EUR">EUR</option>
                                <option value="AUD">AUD</option>
                            </select>
                        </div>
                    </div>

                    <!-- Plan -->
                    <div>
                        <label class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Investment
                            Plan *</label>
                        <select wire:model.defer="acc_type"
                            class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 transition-all rounded-none">
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

                    <!-- Section Header: Security -->
                    <div class="border-b border-white/15 pb-3 pt-4">
                        <h3 class="text-sm font-mono text-[#8b5cf6] uppercase tracking-widest font-semibold">Security
                            Details</h3>
                    </div>

                    <!-- Passwords -->
                    <div class="space-y-6">
                        <div x-data="{ showPassword: false }">
                            <label
                                class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Password
                                *</label>
                            <div class="relative">
                                <input wire:model.defer="password" :type="showPassword ? 'text' : 'password'"
                                    class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                    placeholder="Password">
                                <button type="button" @click="showPassword = !showPassword"
                                    class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#8b5cf6] transition-colors">
                                    <i :class="showPassword ? 'fa-eye-slash' : 'fa-eye'" class="fa text-base"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-1 text-xs font-mono text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div x-data="{ showConfirmPassword: false }">
                            <label class="block text-xs font-mono text-gray-400 tracking-widest uppercase mb-2">Confirm
                                Password *</label>
                            <div class="relative">
                                <input wire:model.defer="password_confirmation"
                                    :type="showConfirmPassword ? 'text' : 'password'"
                                    class="w-full px-5 py-4 bg-black border border-white/10 text-xs font-mono focus:outline-none focus:border-[#8b5cf6] text-gray-100 placeholder-gray-500 transition-all rounded-none"
                                    placeholder="Confirm Password">
                                <button type="button" @click="showConfirmPassword = !showConfirmPassword"
                                    class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#8b5cf6] transition-colors">
                                    <i :class="showConfirmPassword ? 'fa-eye-slash' : 'fa-eye'"
                                        class="fa text-base"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Agreements -->
                    <div class="space-y-4 pt-4 text-xs font-mono text-gray-300 border-t border-white/10">
                        <label class="flex items-center cursor-pointer">
                            <input id="agree1" type="checkbox" wire:model.defer="agree1"
                                class="h-4 w-4 bg-black border-white/20 text-[#8b5cf6] focus:ring-0 rounded-none">
                            <span class="ml-3">I confirm that I am 18 years of age or older.</span>
                        </label>

                        <label class="flex items-center cursor-pointer">
                            <input id="agree2" type="checkbox" wire:model.defer="agree2"
                                class="h-4 w-4 bg-black border-white/20 text-[#8b5cf6] focus:ring-0 rounded-none">
                            <span class="ml-3">I agree with the <a href="{{ route('terms') }}"
                                    class="text-[#8b5cf6] hover:underline">Terms of Service</a></span>
                        </label>

                        <label class="flex items-center cursor-pointer">
                            <input id="agree3" type="checkbox" wire:model.defer="agree3"
                                class="h-4 w-4 bg-black border-white/20 text-[#8b5cf6] focus:ring-0 rounded-none">
                            <span class="ml-3">I agree with the <a href="{{ route('policy') }}"
                                    class="text-[#8b5cf6] hover:underline">Privacy Policy</a></span>
                        </label>
                    </div>

                    <!-- Global Error Summary -->
                    @if ($errors->any())
                        <div
                            class="p-5 bg-red-950/40 border border-red-500/30 text-red-400 text-xs font-mono space-y-2">
                            <p class="font-bold uppercase tracking-wider">Please fix the following errors:</p>
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button type="submit" wire:loading.attr="disabled"
                            class="w-full py-5 bg-[#8b5cf6] hover:bg-[#7c3aed] text-white font-mono text-xs uppercase tracking-widest font-bold transition-all active:scale-[0.99] shadow-[0_0_25px_rgba(139,92,246,0.4)] disabled:opacity-70">
                            <span wire:loading.remove>Register Account</span>
                            <span wire:loading class="flex items-center justify-center gap-3">
                                <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                                Creating Account...
                            </span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>

</div>
