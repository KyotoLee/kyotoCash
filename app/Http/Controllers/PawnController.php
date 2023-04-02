<?php

namespace App\Http\Controllers;

use App\Consts;
use App\Repositories\AssetRepository;
use App\Repositories\ContractRepository;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PawnController
{
    protected $contractRepository;
    protected $customerRepository;
    protected $assetRepository;
    public function __construct(ContractRepository $contractRepository, CustomerRepository $customerRepository, AssetRepository $assetRepository)
    {
        $this->contractRepository = $contractRepository;
        $this->customerRepository = $customerRepository;
        $this->assetRepository = $assetRepository;
    }

    public function index() {
        $listPawns = $this->contractRepository->getListPawns(Consts::CONTRACT_PAWN);
        return view('pawn.pawn', compact('listPawns', $listPawns));
    }

    public function create(Request $request) {
        $dataPawn = $request->all();
        $customerId = null;

        // create new customer
        if(!isset($dataPawn['customer_id'])) {
            $dataCustomer = [
                'name' =>  $dataPawn['customer_name'],
                'identification' => [
                    'customer_ident_num' => $dataPawn['customer_ident_num'],
                    'customer_ident_date' => $dataPawn['customer_ident_date'],
                ],
                'phone' => $dataPawn['customer_phone'],
                'address' => $dataPawn['address'],
                'created_by' => Auth::user()->id,
            ];
            $customer = $this->customerRepository->createOrUpdateCustomer($dataCustomer);
            $customerId = $customer->id;
        }

        // create pawn contract
        $dataContract = [
            'customer_id' => $customerId,
            'store_id' => $dataPawn['store_id'],
            'type' => Consts::CONTRACT_PAWN,
            'status' => 1,
            'loan_info' => [
                'pawn_price' => $dataPawn['pawn_price'],
                'pawn_type' => $dataPawn['pawn_type'],
                'pawn_type_date' => $dataPawn['pawn_type_date'],
                'interest' => $dataPawn['interest'],
                'interest_type' => $dataPawn['interest_type'],
                'interest_cycle' => $dataPawn['interest_cycle'],
                'loan_date' => $dataPawn['loan_date'],
                'description' => $dataPawn['description'],
            ],
            'created_by' => Auth::user()->id,
        ];
        $contract = $this->contractRepository->createOrUpdateContract($dataContract);

        // create asset

        $dataAsset  = [
            'contract_id' => $contract->id,
            'customer_id' => $customerId,
            'name' => $dataPawn['name_asset'],
            'type' => $dataPawn['type_asset'],
            'code' => $dataPawn['code_asset'],
            'status' => $dataPawn['status_asset'],
            'detail' => (object)explode('#', $dataPawn['detail_asset']),
            'created_by' => Auth::user()->id,
        ];
        $this->assetRepository->createOrUpdateAsset($dataAsset);

        return response()->json([
            'success' => 'Successfully',
            'data' => []
        ]);
    }
}
