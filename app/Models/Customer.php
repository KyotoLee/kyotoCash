<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'identification',
        'phone',
        'address',
        'created_by',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'identification' => 'array'
    ];

    public function contracts ()
    {
        return $this->hasMany (Contract::class);
    }
}
