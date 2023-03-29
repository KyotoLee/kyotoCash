<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'customer_id',
        'store_id',
        'type',
        'status',
        'loan_info',
        'created_by',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'loan_info' => 'array'
    ];
}
