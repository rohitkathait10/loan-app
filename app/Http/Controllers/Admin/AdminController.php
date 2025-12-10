<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Customer;
use App\Models\User;
use App\Models\Enquiry;
use PragmaRX\Google2FA\Google2FA;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.adminlogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {

            $user = Auth::user();

            if ($user->role != 1) {
                Auth::logout();
                throw ValidationException::withMessages([
                    'phone' => ['Access denied. Not authorized as admin.'],
                ]);
            }

            if ($user->google2fa_enabled) {

                session(['2fa_admin_id' => $user->id]);

                Auth::logout();

                return redirect()->route('admin.2fa.login');
            }
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        throw ValidationException::withMessages([
            'phone' => __('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->away('https://kredifyloans.com/');
    }

    public function dashboard()
    {
        $customer = Customer::where('status', 0)->count();
        $user = User::where('role', 0)->count();
        $enquiry = Enquiry::all()->count();

        return view('admin.dashboard', compact('user', 'customer', 'enquiry'));
    }

    public function showEnquiry()
    {
        $enquiries = Enquiry::orderBy('id', 'desc')->get();

        return view('admin.enquiry', compact('enquiries'));
    }

    public function showMembershipCard()
    {
        return view('admin.membership-card');
    }
}
