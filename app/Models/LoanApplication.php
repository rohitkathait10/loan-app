<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanApplication extends Model
{
    use HasFactory;

    protected $table = 'loan_applications';

    protected $fillable = [
        'user_id',
        'loan_type',
        'amount',
        'tenure_months',
        'emi_amount',
        'purpose',
        'monthly_income',
        'cibil',
        'emi',
        'emi_bounce',
        'status',
        'remark',
    ];

    protected $casts = [
        'approval_details' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
