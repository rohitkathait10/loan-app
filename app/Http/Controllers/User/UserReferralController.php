<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class UserReferralController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $referal_users = collect([]);

        if (!empty($user->referral_code)) {
            $referal_users = User::where('referred_by', $user->referral_code)->get();
        }

        return view('user.referal', compact('referal_users'));
    }


    public function generate(Request $request)
    {
        $user = auth()->user();

        if (!$user->referral_code) {
            do {
                $code = strtolower(Str::random(7));
            } while (User::where('referral_code', $code)->exists());

            $user->referral_code = $code;
            $user->save();
        }

        return redirect()->back()->with('success', 'Referral code generated!');
    }
}
