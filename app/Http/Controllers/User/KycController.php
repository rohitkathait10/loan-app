<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KycDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KycController extends Controller
{
    public function index()
    {
        return view('user.kyc');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'aadhar_card_number' => 'nullable|digits_between:6,16',
            'pan_card_number' => 'nullable|alpha_num|max:12',

            'profile_photo' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'aadhar_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'pan_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'address_proof___light_bill' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'cancel_cheque' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'bank_statement___last_6_months' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'form_16' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'salary_slip' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',

            'remark' => 'nullable|string|max:1000',
        ]);

        $userId = Auth::user()->id;
        $kyc = KycDocument::where('user_id', $userId)->first();
        $uploadedFiles = [];

        $fileFields = [
            'profile_photo',
            'aadhar_card',
            'pan_card',
            'address_proof___light_bill',
            'cancel_cheque',
            'bank_statement___last_6_months',
            'form_16',
            'salary_slip',
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $mappedField = $this->mapField($field);

                if ($kyc && $kyc->{$mappedField} && Storage::disk('public')->exists($kyc->{$mappedField})) {
                    Storage::disk('public')->delete($kyc->{$mappedField});
                }

                $path = $request->file($field)->store("kyc_uploads/{$userId}/{$mappedField}", 'public');
                $uploadedFiles[$field] = $path;
            }
        }

        $kycData = [
            'user_id'        => $userId,
            'profile_photo'  => $uploadedFiles['profile_photo'] ?? ($kyc->profile_photo ?? null),
            'aadhar_number'  => $validated['aadhar_card_number'] ?? ($kyc->aadhar_number ?? null),
            'aadhar_card'    => $uploadedFiles['aadhar_card'] ?? ($kyc->aadhar_card ?? null),
            'pan_number'     => $validated['pan_card_number'] ?? ($kyc->pan_number ?? null),
            'pan_card'       => $uploadedFiles['pan_card'] ?? ($kyc->pan_card ?? null),
            'address_proof'  => $uploadedFiles['address_proof___light_bill'] ?? ($kyc->address_proof ?? null),
            'cancel_cheque'  => $uploadedFiles['cancel_cheque'] ?? ($kyc->cancel_cheque ?? null),
            'bank_statement' => $uploadedFiles['bank_statement___last_6_months'] ?? ($kyc->bank_statement ?? null),
            'form_16'        => $uploadedFiles['form_16'] ?? ($kyc->form_16 ?? null),
            'salary_slip'    => $uploadedFiles['salary_slip'] ?? ($kyc->salary_slip ?? null),
            'remark'         => $validated['remark'] ?? ($kyc->remark ?? null),
        ];

        KycDocument::updateOrCreate(['user_id' => $userId], $kycData);

        return back()->with('success', 'KYC details submitted successfully!');
    }

    private function mapField($inputField)
    {
        return match ($inputField) {
            'address_proof___light_bill' => 'address_proof',
            'bank_statement___last_6_months' => 'bank_statement',
            default => $inputField,
        };
    }
}
