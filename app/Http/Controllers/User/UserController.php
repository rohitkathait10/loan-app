<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\LoanApplication;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $broadcastAd = Advertisement::where('content_status', 1)
            ->orderByDesc('id')
            ->first();

        $popupAd = Advertisement::where('image_status', 1)
            ->orderByDesc('id')
            ->first();

          $personalLoanCount = LoanApplication::where('user_id', $user->id)
            ->where('loan_type', 'personal')
            ->count();

        $businessLoanCount = LoanApplication::where('user_id', $user->id)
            ->where('loan_type', 'business')
            ->count();

        return view('user.dashboard', compact('broadcastAd', 'popupAd', 'personalLoanCount', 'businessLoanCount'));
    }

    public function showRenewal()
    {
        $user = auth()->user();

        if ($user->membership_status != 0) {
            return redirect()->back()->with('error', 'You are not eligible to renew your membership.');
        }

        return view('user.renewal');
    }
}
