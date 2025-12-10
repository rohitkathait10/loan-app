<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request)
    {
        if (!Session::get('allow_password_reset')) {
            return redirect()->route('password.request')
                ->withErrors(['otp' => 'Unauthorized access or session expired. Please try again.']);
        }
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $phone = Session::get('reset_phone');

        if (!$phone) {
            return redirect()->route('password.mobile')
                ->withErrors(['phone' => 'Session expired. Please start again.']);
        }

        $user = User::where('phone', $phone)->first();

        if (!$user) {
            return redirect()->route('password.mobile')
                ->withErrors(['phone' => 'User not found.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        Session::forget('reset_phone');
        Session::forget('allow_password_reset');
        Session::forget('otp_session_id');

        return redirect()->route('login')->with('status', 'Password reset successfully. Please login.');
    }
}
