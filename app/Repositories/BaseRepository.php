<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
