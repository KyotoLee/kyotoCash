<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'customer_id',
        'contract_id',
        'name',
        'code',
        'type',
        'status',
        'detail',
        'created_by',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'detail' => 'array'
    ];

    public function customers ()
    {
        return $this->belongsTo (Customer::class);
    }

    public function contracts ()
    {
        return $this->hasOne (Contract::class);
    }
}
