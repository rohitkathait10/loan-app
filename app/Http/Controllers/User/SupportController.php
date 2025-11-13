<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function index()
    {
        return view('user.support');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'string| required',
            'query' => 'string| required'
        ]);

        $userid = Auth::user()->id;

        $support = new Support(); 

        $support->user_id = $userid;
        $support->subject = $validated['subject'];
        $support->query = $validated['query'];

        $support->save();

        return redirect()->back()->with('success', 'Your query has been submitted successfully!');
    }
}
