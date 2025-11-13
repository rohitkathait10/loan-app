<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminAgentController extends Controller
{
    public function index()
    {
        $agents = User::where('role', '2')->orderBy('created_at', 'desc')->get();

        return view('admin.agents.index', compact('agents'));
    }

    public function add()
    {
        return view('admin.agents.add');
    }

    public function store(Request $request)
    {
        $agents = User::where('role', '2')->orderBy('created_at', 'desc')->get();

        return view('admin.agents.index', compact('agents'));
    }


}
