<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

     protected $fillable = [
        'cashfree_order_id', 'customer_id', 'user_id','amount', 'base_price', 'currency',
        'status', 'payment_id', 'signature','utr','payment_screenshot','plan_id','upi_link','qr_url'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
