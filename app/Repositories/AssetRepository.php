<?php

namespace App\Repositories;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Model;

class AssetRepository extends BaseRepository
{
    public function __construct(Asset $model)
    {
        parent::__construct($model);
    }

    public function createOrUpdateAsset($dataAsset) {
        return $this->model->create($dataAsset);
    }
}
