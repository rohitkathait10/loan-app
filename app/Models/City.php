<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'city',
        'state_id',
    ];
    
    public function users()
    {
        return $this->hasMany(User::class, 'city_id', 'id');
    }
}
