<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Customer;
use App\Models\User;
use App\Models\Enquiry;

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

            if (Auth::user()->role != 1) {
                Auth::logout();

                throw ValidationException::withMessages([
                    'phone' => ['Access denied. Not authorized as admin.'],
                ]);
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

        return view('admin.dashboard', compact('user', 'customer'));
    }

    public function showEnquiry()
    {
        $enquiries = Enquiry::orderBy('id', 'desc')->get();

        return view('admin.enquiry', compact('enquiries'));
    }

}
