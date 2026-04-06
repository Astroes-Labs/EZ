<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Show the admin login form.
     * Redirects to dashboard if already authenticated as admin.
     */
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return view('admin.login');
    }

    /**
     * Handle admin login POST request.
     * Uses 'admin' guard + username/password credentials.
     */
    public function login(Request $request)
    {
        // Optional: log attempt (useful for debugging / security monitoring)
        Log::info('Admin login attempt', [
            'ip'       => $request->ip(),
            'username' => $request->username,
            'user_agent' => $request->userAgent(),
        ]);

        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
            // Optional: add 'remember' support later
            // 'remember' => ['sometimes', 'boolean'],
        ]);

        $credentials = $request->only('username', 'password');

        // Attempt login with admin guard
        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            Log::info('Admin login successful', ['username' => $request->username]);

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Welcome back! You are now logged in.');
        }

        Log::warning('Admin login failed', ['username' => $request->username]);

        return back()
            ->withInput($request->only('username'))
            ->with('error', 'Invalid username or password. Please try again.');
    }

    /**
     * Logout the admin user.
     */
    public function logout(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::info('Admin logged out', [
            'username' => $admin?->username ?? 'unknown',
            'ip'       => $request->ip(),
        ]);

        return redirect()
            ->route('admin.login')
            ->with('success', 'You have been logged out successfully.');
    }
}