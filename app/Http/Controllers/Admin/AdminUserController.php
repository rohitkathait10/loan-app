<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KycDocument;
use App\Models\Support;
use App\Models\LoanApplication;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '0')->orderBy('created_at', 'desc')->get();

        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.showUser', compact('user'));
    }

    public function documents($id)
    {
        $user = User::findOrFail($id);
        $documents = KycDocument::where('user_id', $user->id)->first();

        return view('admin.users.showDocuments', compact('user','documents'));
    }

    public function loanHistory($id)
    {
        $user = User::findOrFail($id);
        $loanApplications = LoanApplication::where('user_id', $user->id)->orderBy('id','desc')->get();

        return view('admin.users.loanHistory', compact('loanApplications','user'));
    }

    public function supportLog($id)
    {
        $user = User::findOrFail($id);
        $supportLog = Support::where('user_id', $user->id)->orderBy('id', 'desc')->get();

        return view('admin.users.supportLog', compact('user', 'supportLog'));
    }
}
