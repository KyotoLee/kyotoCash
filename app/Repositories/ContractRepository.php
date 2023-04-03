<?php

namespace App\Repositories;

use App\Models\Contract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function updateContract($dataContract, $contractId) {
        return $this->model->where('id', $contractId)->update(['loan_info' =>
            DB::raw('JSON_REPLACE(loan_info,
                        "$.pawn_type", '.$dataContract['pawn_type'].',
                        "$.pawn_type_date", '.$dataContract['pawn_type_date'].',
                        "$.interest", '.$dataContract['interest'].',
                        "$.interest_type", '.$dataContract['interest_type'].',
                        "$.interest_cycle", '.$dataContract['interest_cycle'].',
                        "$.description", '. '"'.$dataContract['description'].'
                        ")')]);
    }
}
