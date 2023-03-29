<?php

namespace App\Repositories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Model;

class StoreRepository extends BaseRepository
{
    public function __construct(Store $model)
    {
        parent::__construct($model);
    }

    public function getListStore($userId) {
        return $this->model->where('user_id', $userId)->get()->toArray();
    }
}
