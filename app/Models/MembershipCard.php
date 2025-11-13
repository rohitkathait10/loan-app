<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipCard extends Model
{
    use HasFactory;

    protected $table = 'membership_cards';

    protected $fillable = [
        'name',
        'price',
        'original_price',
        'type',
        'tenure',
        'image',
    ];
}
