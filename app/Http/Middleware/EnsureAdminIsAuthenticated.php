<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminIsAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if admin guard user is authenticated
        if (! Auth::guard('admin')->check()) {
            // Not logged in → redirect to admin login
            return redirect()->route('admin.login')
                ->with('error', 'Please log in to access the admin panel.');
        }

        // Optional: You can also check if the admin user is active/verified here
        // $admin = Auth::guard('admin')->user();
        // if (! $admin->is_active) {
        //     Auth::guard('admin')->logout();
        //     return redirect()->route('admin.login')
        //         ->with('error', 'Your account is inactive.');
        // }

        return $next($request);
    }
}