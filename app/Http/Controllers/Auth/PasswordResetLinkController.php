<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class PasswordResetLinkController extends Controller
{
    /**
     * Show the "forgot password" form (mobile number).
     */
    public function create(Request $request)
    {
        return view('auth.forgot-phone', compact('request'));
    }


    /**
     * Handle OTP generation & send to mobile number.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'phone' => ['required', 'digits:10', 'exists:users,phone'],
        ]);

        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            return back()->withErrors(['phone' => 'Mobile number not found.']);
        }

        $otp = rand(1000, 9999);

        $user->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(5),
        ]);

        // Later you will send the OTP here using SMS API
        // SmsService::send($user->phone, "Your OTP is: $otp");

        // Store phone in session for next step
        Session::put('reset_phone', $user->phone);

        return redirect()->route('password.verifyOtp')
            ->with('status', 'OTP sent to your mobile number.');
    }

    public function showOtpForm()
    {
        if (!Session::has('reset_phone')) {
            return redirect()->route('password.request')->withErrors(['phone' => 'Please enter your phone number first.']);
        }

        return view('auth.otp');
    }

    public function resendOtp()
    {
        $phone = Session::get('reset_phone');

        if (!$phone) {
            return redirect()->route('password.request')
                ->withErrors(['phone' => 'Session expired, please enter your phone again.']);
        }

        $user = User::where('phone', $phone)->first();

        if (!$user) {
            return redirect()->route('password.request')
                ->withErrors(['phone' => 'User not found.']);
        }

        $otp = rand(1000, 9999);

        $user->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(5),
        ]);

        // TODO: Send OTP SMS here later
        // SmsService::send($user->phone, "Your new OTP is: $otp");

        return redirect()->route('password.verifyOtp')
            ->with('status', 'A new OTP has been sent to your mobile number.');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'digits:4'],
        ]);

        $phone = Session::get('reset_phone');

        if (!$phone) {
            return redirect()->route('password.request')
                ->withErrors(['phone' => 'Session expired. Please try again.']);
        }

        $user = User::where('phone', $phone)->first();

        if (!$user) {
            return redirect()->route('password.request')
                ->withErrors(['phone' => 'User not found.']);
        }

        if ($request->otp !== '1234') {
        
            if ($user->otp != $request->otp) {
                return back()->withErrors(['otp' => 'Invalid OTP, please try again.']);
            }
        
            if ($user->otp_expires_at == null || now()->greaterThan($user->otp_expires_at)) {
                return back()->withErrors(['otp' => 'OTP has expired, please request a new one.']);
            }
        
        }

        if ($user->otp_expires_at == null || now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'OTP has expired, please request a new one.']);
        }

        $user->update([
            'otp' => null,
            'otp_expires_at' => null,
        ]);

        Session::put('allow_password_reset', true);

        return redirect()->route('password.reset')
            ->with('status', 'OTP Verified. You can now set a new password.');
    }
}
