<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository extends BaseRepository
{
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }

    public function  createOrUpdateCustomer($dataCustomer) {
        return $this->model->create($dataCustomer);
    }

}
