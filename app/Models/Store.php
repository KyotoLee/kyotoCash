<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'created_by',
        'status',
        'created_at',
        'updated_at',
    ];
}
