<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;

class AdminSupportController extends Controller
{
    public function index()
    {
        $supports = Support::with('user')->orderBy('id', 'desc')->get();

        return view('admin.support', compact('supports'));
    }
}
