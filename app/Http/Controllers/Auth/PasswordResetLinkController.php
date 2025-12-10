<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Helpers\OtpHelper;

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
    
        $otpResponse = OtpHelper::sendOtp($user->phone, 'Reset_Password_OTP');
    
        if (!isset($otpResponse['Status']) || $otpResponse['Status'] !== "Success") {
            return back()->withErrors(['phone' => 'Failed to send OTP. Please try again later.']);
        }
    
        $otpSessionId = $otpResponse['Details'];
    
        $user->update([
            'otp_session' => $otpSessionId,
        ]);
    
        Session::put('reset_phone', $user->phone);
        Session::put('otp_session_id', $otpSessionId);
    
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
    
        $otpResponse = OtpHelper::sendOtp($user->phone, 'Reset_Password_OTP');
    
        if (!isset($otpResponse['Status']) || $otpResponse['Status'] !== "Success") {
            return back()->withErrors(['phone' => 'Failed to resend OTP. Please try again later.']);
        }
    
        $otpSessionId = $otpResponse['Details'];
    
        $user->update([
            'otp_session' => $otpSessionId,
        ]);
    
        Session::put('otp_session_id', $otpSessionId);
    
        return redirect()->route('password.verifyOtp')
            ->with('status', 'A new OTP has been sent to your mobile number.');
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);
    
        $phone = Session::get('reset_phone');
        $sessionId = Session::get('otp_session_id'); 
    
        if (!$phone || !$sessionId) {
            return redirect()->route('password.request')
                ->withErrors(['phone' => 'Session expired. Please try again.']);
        }
    
        $user = User::where('phone', $phone)->first();
    
        if (!$user) {
            return redirect()->route('password.request')
                ->withErrors(['phone' => 'User not found.']);
        }
    
    
        $verifyResponse = OtpHelper::verifyOtp($sessionId, $request->otp);

        if (!isset($verifyResponse['Status']) || $verifyResponse['Status'] !== "Success") {
            return back()->withErrors(['otp' => 'Invalid or expired OTP. Please try again.']);
        }
    
        Session::put('allow_password_reset', true);
    
        return redirect()->route('password.reset')
            ->with('status', 'OTP Verified. You can now set a new password.');
    }

}
