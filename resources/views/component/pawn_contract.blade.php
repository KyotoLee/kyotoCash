<div class="modal fade pawn_contract_modal" tabindex="-1" role="dialog" aria-labelledby="pawn_contract" aria-hidden="true" id="pawn_contract_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>HỢP ĐỒNG CẦM ĐỒ</b></h3>
                <button type="button" class="close btn_close_modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_pawn_contract">
                <div class="modal-body">
                    <div class="customer_info">
                        <div class="form-group col-sm-12 form-group-store">
                            <label for="status_asset" class="col-form-label">Cửa hàng:</label>
                            <select class="form-select" aria-label="Default select example" name="store_id" id="store_id">

                            </select>
                        </div>
                        <h5 class="label_info"><b>THÔNG TIN KHÁCH HÀNG</b></h5>
                        <div class="box_input">
                            <div class="form-group col-sm-12">
                                <div class="col-sm-12 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input input_type_customer" type="radio" name="type_customer" id="new_customer" value="1" checked>
                                        <label class="form-check-label" for="new_customer">
                                            Khách hàng mới
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type_customer" id="old_customer" value="2">
                                        <label class="form-check-label" for="old_customer">
                                            Khách hàng đã có trên hệ thống
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group input_search_customer">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="search_name" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm kiếm</button>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 d-flex">
                                <div class="col-sm-6">
                                    <label for="customer_name" class="col-form-label">Tên khách hàng (*):</label>
                                    <input type="text" name="customer_name" class="form-control" id="customer_name">
                                </div>
                                <div class="col-sm-6">
                                    <label for="customer_phone" class="col-form-label">Số điện thoại (*):</label>
                                    <input type="text" name="customer_phone" class="form-control" id="customer_phone">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 d-flex">
                                <div class="col-sm-6">
                                    <label for="customer_ident_num" class="col-form-label">Số CMT/CCCD (*):</label>
                                    <input type="text" name="customer_ident_num" class="form-control" id="customer_ident_num">
                                </div>
                                <div class="col-sm-6">
                                    <label for="customer_ident_date" class="col-form-label">Ngày cấp:</label>
                                    <input type="date" name="customer_ident_date" class="form-control" id="customer_ident_date">
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class=" col-sm-12">
                                    <label for="address" class="col-form-label">Địa chỉ:</label>
                                    <input type="text" name="address" class="form-control" id="address">
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="customer_info">
                        <h5 class="label_info"><b>THÔNG TIN TÀI SẢN THẾ CHẤP</b></h5>
                        <div class="box_input">
                            <div class="form-group col-sm-12 d-flex">
                                <div class="col-sm-6">
                                    <label for="type_asset" class="col-form-label">Loại tài sản (*):</label>
                                    <input type="text" name="type_asset" class="form-control" id="type_asset">
                                </div>
                                <div class="col-sm-6">
                                    <label for="code_asset" class="col-form-label">Mã tài sản:</label>
                                    <input type="text" name="code_asset" class="form-control" id="code_asset">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 d-flex">
                                <div class="col-sm-6">
                                    <label for="name_asset" class="col-form-label">Tên tài sản:</label>
                                    <input type="text" name="name_asset" class="form-control" id="name_asset">
                                </div>
                                <div class="col-sm-6">
                                    <label for="status_asset" class="col-form-label">Trạng thái:</label>
                                    <select class="form-select" aria-label="Default select example" name="status_asset" id="status_asset">
                                        <option selected value="1">Đang hoạt động</option>
                                        <option value="2">Hư hỏng nhẹ (trầy, xước,...)</option>
                                        <option value="3">Hư hỏng nặng (vỡ, va đập,...)</option>
                                        <option value="4">Bị khóa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="col-sm-12 d-flex">
                                    <div class="col-sm-8">
                                        <h5><b>Thông tin chi tiết</b></h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn_add_detail"><i class="fas fa-plus" style="color: #ffffff;"></i> <span>Thêm mới</span></button>
                                    </div>
                                </div>
                                <div>

                                </div>
                                <div class="col-sm-12 box_asset_detail">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="customer_info">
                        <h5 class="label_info"><b>THÔNG TIN HỢP ĐỒNG</b></h5>
                        <div class="box_input">
                            <div class="form-group col-sm-12 d-flex">
                                <div class="col-sm-6">
                                    <label for="pawn_price" class="col-form-label">Só tiền cầm (*):</label>
                                    <input type="text" name="pawn_price" class="form-control" id="pawn_price">
                                </div>
                                <div class="col-sm-6">
                                    <label for="pawn_type" class="col-form-label">Hình thức lãi:</label>
                                    <div class="col-sm-12 d-flex justify-content-between">
                                        <div class="col-sm-6">
                                            <select class="form-select" aria-label="" name="pawn_type" id="pawn_type">
                                                <option selected value="1">Lãi ngày</option>
                                                <option value="2">Lãi tuần</option>
                                                <option value="3">Lãi tháng</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-select" aria-label="" name="pawn_type_date" id="pawn_type_date">
                                                <option selected value="1">Thu lãi sau</option>
                                                <option value="2">Thu lãi trước</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 d-flex">
                                <div class="col-sm-6">
                                    <label for="interest" class="col-form-label">Lãi (*):</label>
                                    <div class="col-sm-12 d-flex justify-content-between">
                                        <div class="col-sm-6">
                                            <input type="text" name="interest" class="form-control" id="interest">
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-select" aria-label="" name="interest_type" id="interest_type">
                                                <option selected value="1">k/1 triệu</option>
                                                <option value="2">k/1 ngày</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="interest_cycle" class="col-form-label">Kì lãi (*):</label>
                                    <input type="text" name="interest_cycle" class="form-control" id="interest_cycle" placeholder="">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 d-flex">
                                <div class="col-sm-6">
                                    <label for="loan_date" class="col-form-label">Ngày vay (*):</label>
                                    <input type="date" name="loan_date" class="form-control" id="loan_date">
                                </div>
                                <div class="col-sm-6">
                                    <label for="description" class="col-form-label">Ghi chú:</label>
                                    <input type="text" name="description" class="form-control" id="description">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn_create_pawn">Tạo hơp đồng</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                </div>
            </form>
        </div>
    </div>
</div>
