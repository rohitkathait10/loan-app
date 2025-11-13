<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id',
        'invoice_number',
        'amount',
        'payment_id',
        'card_number',
        'payment_method',
        'invoice_date'
    ];

    protected $dates = ['invoice_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
