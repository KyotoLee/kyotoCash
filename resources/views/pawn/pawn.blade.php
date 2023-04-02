@extends('layouts.kyoto')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cầm đồ</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content" id="pawn-contract">
        <div class="container-fluid">
            <div class="row pawn-contract">
                <div class="box_add_new d-flex justify-content-between">
                    <div class="button_add_new">
                        <button class="btn btn_add_new background-color-default" data-toggle="modal" data-target=".pawn_contract_modal">Tạo hợp đồng</button>
                    </div>
                    <div class="box_export d-flex">
                        <button class="btn btn_csv"><i class="fas fa-file-excel"></i><span>Tải về</span></button>
                    </div>
                </div>
                <div class="table_pawns">
                    <table
                        class="table col-xl-12 table-products table-responsive-sm-12 table-responsive-md-12 table-responsive-lg-12 table-responsive-xl-12">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã hơp đồng</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Tài sản thế chấp</th>
                            <th scope="col">Số tiền cầm</th>
                            <th scope="col">Thời gian phải đóng lãi tiếp theo</th>
                            <th scope="col">Lãi đến kì hiện tại</th>
                            <th scope="col">Lãi suất</th>
                            <th scope="col">Kì lãi</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(!empty($listPawns))
                                @foreach($listPawns as $pawn)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$pawn->id}}</td>
                                    <td>{{$pawn->customers->name}}</td>
                                    <td>{{$pawn->assets ? $pawn->assets->name : ''}}</td>
                                    <td class="hide info_pawn_{{$pawn->id}}"
                                        data-store="{{$pawn->store_id}}"
                                        data-customer="{{$pawn->customers->name . '*' .
                                                        $pawn->customers->phone . '*'.
                                                        $pawn->customers->identification['customer_ident_num'] . '*' .
                                                        $pawn->customers->identification['customer_ident_date']. '*' .
                                                        $pawn->customers->address}}"
                                        data-asset-type="{{$pawn->assets->type }}"
                                        data-asset-name="{{$pawn->assets->name }}"
                                        data-asset-code="{{$pawn->assets->code }}"
                                        data-asset-status="{{$pawn->assets->status }}"
                                        data-asset-datail="{{json_encode($pawn->assets->detail) }}"
                                        data-loan-date="{{($pawn->loan_info)['loan_date'] ?? ''}}"
                                        data-pawn-type="{{($pawn->loan_info)['pawn_type'] ?? ''}}"
                                        data-pawn-type-date="{{($pawn->loan_info)['pawn_type_date'] ?? ''}}"
                                        data-pawn-price="{{($pawn->loan_info)['pawn_price'] ?? ''}}"
                                        data-interest="{{($pawn->loan_info)['interest'] ?? ''}}"
                                        data-interest-type="{{($pawn->loan_info)['interest_type'] ?? ''}}"
                                        data-interest-cycle="{{($pawn->loan_info)['interest_cycle'] ?? ''}}"
                                        data-description="{{($pawn->loan_info)['description'] ?? ''}}"
                                    ></td>
                                    <td>{{($pawn->loan_info)['pawn_price']}}</td>
                                    <td>{{$pawn->customers->name}}</td>
                                    <td>{{$pawn->customers->name}}</td>
                                    <td>{{ isset(($pawn->loan_info)['interest']) ? (($pawn->loan_info)['interest'] . ' ' . App\Helpers\Helper::showInterestType(($pawn->loan_info)['interest_type'])) : ''}}</td>
                                    <td>{{($pawn->loan_info)['interest_cycle'] ?? ''}}</td>
                                    <td>
                                        <button class="btn btn-primary btn-edit-pawn btn_edit_{{$pawn->id}}" data-index="{{$pawn->id}}" data-toggle="modal" data-target=".pawn_contract_modal">Xem chi tiết</button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="paginate">
                    {{ $listPawns->links('paginate') }}
                </div>
            </div>
        </div>
    </section>
    @include('component.pawn_contract')
@endsection
@section('script')
    <script>
        let URL_CREATE_PAWN = '{{route('pawn_create')}}';
        let USER_ID = '{{auth()->user()->id}}';
        let EVENT_POPUP = 1;
        let INDEX_RECORD = null;
    </script>
    <script src="{{asset('js/pawn.js')}}"></script>
@endsection
