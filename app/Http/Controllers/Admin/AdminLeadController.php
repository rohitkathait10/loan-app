<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class AdminLeadController extends Controller
{
    public function index()
    {
        $leads = Customer::where('status', '0')->orderBy('created_at', 'desc')->get();

        return view('admin.leads', compact('leads'));
    }

    public function show($id)
    {
        $lead = Customer::findOrFail($id);

        return view('admin.partials.lead-details', compact('lead'));
    }
}
