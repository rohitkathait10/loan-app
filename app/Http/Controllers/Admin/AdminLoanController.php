<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanApplication;

class AdminLoanController extends Controller
{
    public function index()
    {
        $loanData = LoanApplication::with('user')->orderBy('id', 'desc')->get();

        return view('admin.loan-application', compact('loanData'));
    }

    public function edit($id)
    {
        $loanData = LoanApplication::findOrFail($id);

        return view('admin.loan-application-edit', compact('loanData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tenure_months' => 'required',
            'remark' => 'required|string|max:255',
            'status' => 'required',
        ]);

        $loanData = LoanApplication::findOrFail($id);

        $loanData->tenure_months = $request->tenure_months;
        $loanData->remark = $request->remark;
        $loanData->status = $request->status;

        $loanData->save();

        return redirect()->back()->with('success', 'Loan Application Data Updated Successfully!');
    }
}
