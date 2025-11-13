<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanApplication;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function history()
    {
        $userId = Auth::user()->id;
        $loanData = LoanApplication::where('user_id', $userId)->orderBy('id', 'desc')->get();
        return view('user.history', compact('loanData'));
    }
}
