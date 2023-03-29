<?php

namespace App\Http\Controllers;

use App\Repositories\StoreRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    protected $storeRepository;
    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function getListStore($userId) {
        $result = $this->storeRepository->getListStore($userId);
        return response()->json([
            'data' => $result
        ]);
    }
}
