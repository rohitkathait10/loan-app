<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'loan_type',
        'email',
        'role',
        'password',
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
        'pincode',
        'address',
        'referral_code',
        'referred_by',
        'wallet_balance',
        'membership_card_number',
        'card_price',
        'membership_tier',
        'membership_status',
        'membership_start',
        'membership_end',
        'otp',
        'otp_expires_at',
        'ip_address',
        'os',
        'browser',
        'device_type',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'otp',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'loan_amount' => 'decimal:2',
        'monthly_income' => 'decimal:2',
        'monthly_emi' => 'decimal:2',
        'loan_eligibility' => 'decimal:2',
        'emi_36' => 'decimal:2',
        'emi_48' => 'decimal:2',
        'emi_60' => 'decimal:2',
        'is_otp_verify' => 'boolean',
        'status' => 'integer',
    ];

    /**
     * Override the default auth identifier to use phone instead of email.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'phone';
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
