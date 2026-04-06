{{-- File: resources/views/admin/login.blade.php --}}
@extends('admin.layouts.guest')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-6 py-12">
        <div class="max-w-lg w-full">
            <!-- Card -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <!-- Header Banner (exact same visual style as original PHP) -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-10 py-12 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-semibold tracking-tight">Welcome Back!</h1>
                            <p class="mt-3 text-lg opacity-90">Sign in to continue to {{ config('app.name') }} Admin.</p>
                        </div>
                        <!-- Decorative image replacement -->
                        <div class="hidden md:block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-28 h-28 opacity-80" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2v-2a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Form Area -->
                <div class="px-10 pb-10 pt-8">
                    <!-- Logo -->
                    <div class="flex justify-center -mt-12 mb-8">
                        <div class="bg-white shadow-lg p-3 rounded-3xl">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center text-white text-4xl font-black">
                                M</div>
                        </div>
                    </div>

                    <form id="login-form" method="POST" action="{{ route('admin.login') }}" class="space-y-7">
                        @csrf

                        <!-- Username -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                            <input type="text" id="username" name="username"
                                class="w-full px-6 py-4 border border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 rounded-3xl outline-none transition-all"
                                placeholder="Enter username" value="{{ old('username') }}" required>
                            @error('username')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="w-full px-6 py-4 border border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 rounded-3xl outline-none transition-all"
                                    placeholder="Enter password" required>
                                <button type="button" id="password-addon"
                                    class="absolute right-6 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 text-2xl transition">
                                    👁
                                </button>
                            </div>
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Display session error or success messages -->
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-center">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Display validation errors -->
                        @if($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-center">
                                <ul class="list-none m-0 p-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Submit -->
                        <button type="submit" name="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-5 rounded-3xl text-lg shadow-lg transition-all duration-200">
                            Log In
                        </button>
                    </form>
                </div>
            </div>

            <!-- Footer -->
            <p class="text-center text-gray-500 text-sm mt-10">
                ©
                <script>document.write(new Date().getFullYear())</script> {{ config('app.name') }}. by X-Tech
            </p>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin/js/login.js') }}"></script>
@endsection