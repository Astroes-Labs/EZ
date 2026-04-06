<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    // Show forgot password form
    public function show()
    {
        return view('home.forgot-password');
    }

    // Handle forgot password request
    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        // Sanitize email input
        $email = filter_var($request->email, FILTER_SANITIZE_EMAIL);

        // Delete existing tokens for the email before inserting a new one
        DB::table('password_resets')->where('email', $email)->delete();

        // Generate a unique token
        $token = Str::random(60);

        // Store the token in the password_resets table with an expiry time
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now(),
        ]);

        try {
            // Attempt to send the email
            Mail::send('emails.password-reset', ['token' => $token], function ($message) use ($email) {
                $message->to($email);
                $message->subject('Reset Your Password');
            });
        
            // If the email is sent successfully, return the success response
            return response()->json([
                'message' => 'We have emailed your password reset link!',
                'status' => 'success'
            ]);
        
        } catch (\Exception $e) {
            // If an exception occurs (email failed to send), return the error response
            return response()->json([
                'message' => 'Failed to send reset link. Please try again.',
                'status' => 'failed'
            ], 500);  // Sending 500 status for server errors
        }
    }

    // Show password reset form
    public function edit($token)
    {
        // Sanitize token input
        $token = strip_tags(trim($token));
        return view('home.password-reset', ['token' => $token]);
    }

    public function update(Request $request)
    {
        // Validate inputs
        $request->validate([
            'token' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Sanitize inputs
        $token = strip_tags(trim($request->token));
        $password = strip_tags(trim($request->password));
    
        // Find the reset token and check if it's expired (older than 15 minutes)
        $reset = DB::table('password_resets')->where('token', $token)->first();
    
        if (!$reset) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid or expired token.'
            ], 400);
        }
    
        if (now()->diffInMinutes($reset->created_at) > 15) {
            DB::table('password_resets')->where('email', $reset->email)->delete();
            return response()->json([
                'status' => 'error',
                'message' => 'The password reset token has expired. Please request a new one.'
            ], 400);
        }
    
        // Find the user by email (check both email and email2 fields)
        $user = User::where('email', $reset->email)
            ->orWhere('email2', $reset->email)
            ->first();
    
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found.'
            ], 404);
        }
    
        // Update the user's password
        $user->update([
            'password' => Hash::make($password),
        ]);
    
        // Delete the used token
        DB::table('password_resets')->where('email', $reset->email)->delete();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Password successfully reset. You can now log in.'
        ]);
    }
}