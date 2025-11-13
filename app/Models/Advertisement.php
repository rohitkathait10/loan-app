<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisements';

    protected $fillable = [
        'title',
        'content',
        'image',
        'content_status',
        'image_status'
    ];

}
