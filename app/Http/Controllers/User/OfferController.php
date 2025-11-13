<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanApplication;

class OfferController extends Controller
{
    public function index()
    {
        return view('user.offer');
    }

    public function personalLoan()
    {
        return view('user.personal-loan');
    }

    public function businessLoan()
    {
        return view('user.business-loan');
    }

    public function personalLoanStore(Request $request)
    {
        $validated = $request->validate([
            'loan_type' => 'required|in:personal,business',
            'amount' => 'required|numeric|min:1000',
            'purpose' => 'required|string|max:255',
            'emi' => 'nullable|numeric|min:0',
            'cibil' => 'required|string|max:20',
            'monthly_income' => 'required|numeric|min:1000',
            'emi_bounce' => 'required|in:Yes,No',
        ]);

        $loan = new LoanApplication();
        $loan->user_id = auth()->user()->id;
        $loan->loan_type = $validated['loan_type'];
        $loan->amount = $validated['amount'];
        $loan->purpose = $validated['purpose'];
        $loan->emi = $validated['emi'];
        $loan->cibil = $validated['cibil'];
        $loan->monthly_income = $validated['monthly_income'];
        $loan->emi_bounce = $validated['emi_bounce'];
        $loan->save();

        $loanAmount = $loan->amount;
        $interestRate = 15 / 12 / 100;

        function calculateEMI($loanAmount, $interestRate, $months)
        {
            return ($loanAmount * $interestRate * pow(1 + $interestRate, $months)) /
                (pow(1 + $interestRate, $months) - 1);
        }

        $emi36 = calculateEMI($loanAmount, $interestRate, 36);
        $emi48 = calculateEMI($loanAmount, $interestRate, 48);
        $emi60 = calculateEMI($loanAmount, $interestRate, 60);

        $loan->approval_details = [
            'max_loan_amount' => round($loanAmount, 2),
            'emi_36' => round($emi36, 2),
            'emi_48' => round($emi48, 2),
            'emi_60' => round($emi60, 2),
        ];
        $loan->save();

        return redirect()->route('user.digital-approval', ['loan_id' => $loan->id]);
    }

    public function digitalApproval($loan_id)
    {
        $loan = LoanApplication::where('id', $loan_id)
            ->where('user_id', auth()->user()->id)
            ->firstOrFail();

        if ($loan->status !== null) {
            return redirect()->route('user.dashboard')
                ->with('error', 'This loan application has already been submitted.');
        }

        return view('user.digital-approval', [
            'loan' => $loan,
        ]);
    }

    public function digitalApprovalStore(Request $request, $loan_id)
    {
        $request->validate([
            'emiOption' => 'required|in:36,48,60',
        ]);

        $loan = LoanApplication::findOrFail($loan_id);

        $details = $loan->approval_details;

        $selectedTenure = $request->emiOption;
        $emiKey = 'emi_' . $selectedTenure;

        $loan->tenure_months = $selectedTenure;
        $loan->emi_amount = $details[$emiKey] ?? 0;
        $loan->status = "pending";
        $loan->save();

        return redirect()->route('user.digital-approval.success')->with('success_loan_id', $loan->id);
    }

    public function digitalApprovalSuccess()
    {
        if (!session()->has('success_loan_id')) {
            return redirect()->route('user.dashboard')->with('error', 'Unauthorized access.');
        }

        $loanId = session('success_loan_id');

        $loan = LoanApplication::where('id', $loanId)
            ->where('user_id', auth()->user()->id)
            ->firstOrFail();

        return view('user.digital-approval-success', compact('loan'));
    }
}
