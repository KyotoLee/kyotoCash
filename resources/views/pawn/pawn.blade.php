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
            <div class="row" style="background-color: #ffffff">
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
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Số tiền cầm</th>
                            <th scope="col">Thời gian cầm đồ</th>
                            <th scope="col">Thời gian phải đóng lãi</th>
                            <th scope="col">Số tiễn đã đóng lãi</th>
                            <th scope="col">Nợ cũ</th>
                            <th scope="col">Lãi đến kì hiện tại</th>
                            <th scope="col">Hình thức lãi</th>
                            <th scope="col">Lãi suất</th>
                            <th scope="col">Hình thức thu</th>
                            <th scope="col">Kì lãi</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('component.pawn_contract')
@endsection
@section('script')
    <script src="{{asset('js/pawn.js')}}"></script>
@endsection
