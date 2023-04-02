<?php

namespace App\Repositories;

use App\Models\Contract;
use Illuminate\Database\Eloquent\Model;

class ContractRepository extends BaseRepository
{

    public function __construct(Contract $model)
    {
        parent::__construct($model);
    }

    public function createOrUpdateContract($dataContract) {
        return $this->model->create($dataContract);
    }
    public function getListPawns($type) {
        return $this->model->with(['customers', 'assets'])
                    ->where('type', $type)->orderBy('created_at', 'desc')->paginate(10);
    }
}
