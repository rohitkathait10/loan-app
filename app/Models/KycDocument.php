<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_photo',
        'aadhar_number',
        'aadhar_card',
        'pan_number',
        'pan_card',
        'address_proof',
        'cancel_cheque',
        'bank_statement',
        'form_16',
        'salary_slip',
        'remark',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
