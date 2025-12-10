<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'loan_type',
        'email',
        'salary_type',
        'loan_amount',
        'cibil_score',
        'monthly_income',
        'monthly_emi',
        'loan_purpose',
        'loan_eligibility',
        'emi_36',
        'emi_48',
        'emi_60',
        'selected_emi',
        'city_id',
        'state_id',
        'referred_by',
        'status',
        'otp',
        'otp_session',
        'is_otp_verify',
        'ip_address',
        'browser',
        'os',
        'device_type',
        'terms_accepted',
        'marketing_consent',
        'consent_given_at',
    ];

    protected $casts = [
        'cibil_score' => 'integer',
        'income' => 'decimal:2',
        'monthly_emi' => 'decimal:2',
        'status' => 'boolean',
    ];
}
