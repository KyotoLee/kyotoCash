$(document).ready(function() {
    $('.input_search_customer').hide();
    $('input[type=radio][name=type_customer]').change(function() {
        if (parseInt(this.value) == 1) {
            $('.input_search_customer').hide()
            return
        }
        $('.input_search_customer').show()
    });

    $('.btn_add_detail').click(function () {
        let count_detail = $('.box_detail').length
        if(count_detail >= 5) {
            return
        }
        let detail = '<div class="col-sm-12 box_detail">\n' +
            '                                    <label for="detail" class="col-form-label">Đặc điểm <span>' + (count_detail + 1) + '</span>:</label>\n' +
            '                                    <div class="col-sm-12 d-flex align-items-center">\n' +
            '                                        <div class="col-sm-10">\n' +
            '                                            <input type="text" name="customer_ident_date" class="form-control detail_asset" placeholder="Biển số, mật khẩu, ...">\n' +
            '                                        </div>\n' +
            '                                        <div class="col-sm-2"><button class="btn btn_remove_detail"><i class="fas fa-minus" data-index="' + count_detail + '" style="color: #ffffff;"></i><span>Xóa</span></button></div>\n' +
            '                                    </div>\n' +
            '                                </div>'

        $('.box_asset_detail').append(detail)
    })

    $('.btn_add_new').click(function () {
        EVENT_POPUP = 1
        resetModalCreate();
        getListStores();
    })

    $('.btn-edit-pawn').click(function () {
        EVENT_POPUP = 2;
        INDEX_RECORD = $(this).data('index')
        resetModalCreate();
        getListStores();
        displayDetailForEdit();
    })

    $('body').on( "click", ".btn_remove_detail", function() {
        let index_remove = $(this).children().data('index')
        $(".box_asset_detail").children().eq(index_remove).remove();
        for(let index = index_remove; index <= 4; index ++) {
            $(".box_asset_detail").children().eq(index).children().children().eq(0).empty().text(index + 1)
            $(".box_asset_detail").children().eq(index).children().eq(1).children().eq(1).children().children().eq(0).data('index', index)
        }
    });

    $.validator.addMethod('check_number', function (value, element) {
        var regex = /^\d*$/;
        return this.optional(element) || regex.test(value);
    });

    $.validator.addMethod('check_price', function (value, element) {
        var regex = /^-?\d*[.,]?\d{0,2}$/;
        return this.optional(element) || regex.test(value);
    });

    function getListStores() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/stores/list/' + USER_ID,
            type: 'GET',
            success: function(res){
                let listOption = '';
                let indexSelected = 0;
                if(EVENT_POPUP == 2) {
                    indexSelected = $('.info_pawn_' + INDEX_RECORD).data('store')
                }
                if(res.data.length > 0) {
                    for(let storeIndex = 0; storeIndex < res.data.length; storeIndex++) {
                        listOption += '<option ' + (indexSelected === 0 ? 'selected' : '') + 'selected value="' + res.data[storeIndex].id + '">' + res.data[storeIndex].name + '</option>';
                    }
                }
                console.log(listOption)
                $('#store_id').append(listOption);
            },
            error: function (xhr, status, error) {
            }
        })
    }

    $("#form_pawn_contract").validate({
        rules: {
            customer_name: {
                required: true,
            },
            customer_phone: {
                required: true,
                check_number: true
            },
            customer_ident_num: {
                required: true,
                check_number: true
            },
            type_asset: {
                required: true,
            },
            pawn_price: {
                required: true,
                check_price: true
            },
            interest: {
                required: true,
                check_price: true
            },
            interest_cycle: {
                required: true,
                check_number: true
            },
            loan_date: {
                required: true,
            },
        },
        messages: {
            customer_name: {
                required: "Vui lòng nhập tên của khách hàng"
            },
            customer_phone: {
                required: "Vui lòng nhập số diện thoại của khách hàng",
                check_number: "Vui lòng nhập đúng định dạng số",
            },
            customer_ident_num: {
                required: "Vui lòng nhập só CMT/CCCD của khách hàng",
                check_number: "Vui lòng nhập đúng định dạng số",
            },
            type_asset: {
                required: "Vui lòng nhập loại tài sản của khách hàng",
            },
            pawn_price: {
                required: "Vui lòng nhập số tiền để thế chấp",
                check_price: "Vui lòng nhập đúng định dạng tiền tệ",
            },
            interest: {
                required: "Vui lòng nhập số tiền lãi",
                check_price: "Vui lòng nhập đúng định dạng tiền tệ",
            },
            interest_cycle: {
                required: "Vui lòng nhập kì đóng lãi",
                check_number: "Vui lòng nhập đúng định dạng tiền tệ",
            },
            loan_date: {
                required: "Vui lòng nhập ngày thực hiện thế chấp",
            },
        },
        highlight: function(element) { // hightlight error inputs
            $(element)
                .closest('.form-group .form-control').addClass('is-invalid') // set invalid class to the control group
        },
        unhighlight: function(element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group .form-control').removeClass('is-invalid') // set invalid class to the control group
                .closest('.form-group .form-control').addClass('is-valid')
        },
        errorPlacement: function(error, element) {
            if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                error.insertAfter(element.parent())
            } else {
                error.insertAfter(element)
            }
        },
        success: function(label) {
            label
                .closest('.form-group .form-control').removeClass('is-invalid') // set success class to the control group
        },
        submitHandler: function(form) {
            $('.btn_create_pawn').prop('disabled', true);
            let formData = new FormData();
            formData.append('customer_name', $('#customer_name').val());
            formData.append('store_id', $('#store_id').val());
            formData.append('customer_phone', $('#customer_phone').val());
            formData.append('customer_ident_num', $('#customer_ident_num').val());
            formData.append('customer_ident_date', $('#customer_ident_date').val());
            formData.append('address', $('#address').val());
            formData.append('type_asset', $('#type_asset').val());
            formData.append('code_asset', $('#code_asset').val());
            formData.append('name_asset', $('#name_asset').val());
            formData.append('status_asset', $('#status_asset').val());
            formData.append('pawn_price', $('#pawn_price').val());
            formData.append('pawn_type', $('#pawn_type').val());
            formData.append('pawn_type_date', $('#pawn_type_date').val());
            formData.append('loan_date', $('#loan_date').val());
            formData.append('interest', $('#interest').val());
            formData.append('interest_type', $('#interest_type').val());
            formData.append('interest_cycle', $('#interest_cycle').val());
            formData.append('description', $('#description').val());
            let detail_asset = []
            if($('.box_detail').length > 0) {
                for(let index = 0; index < $('.box_detail').length; index++) {
                    detail_asset.push($(".box_asset_detail").children().eq(index).children().eq(1).children().eq(0).children().val())
                }
            }
            formData.append('detail_asset', detail_asset.join('#'));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                dataType: "json",
                url: URL_CREATE_PAWN,
                processData: false,
                contentType: false,
                cache: false,
                data: formData,
                success: function(data) {
                    $('.btn_create_pawn').prop('disabled', false);
                    $('.btn_close_modal').click();
                    swal({
                        title: "Tạo hợp đồng thành công!",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false

                    });
                },
                error: function () {
                    $('.btn_create_pawn').prop('disabled', false);
                }
            })
        }
    })

    function resetModalCreate() {
        $('#store_id').prop('disabled', false);
        $('input[name=type_customer]').attr("disabled",false);
        $('#customer_name').prop('disabled', false).val('');
        $('#customer_phone').prop('disabled', false).val('');
        $('#customer_ident_num').prop('disabled', false).val('');
        $('#customer_ident_date').prop('disabled', false).val('');
        $('#address').prop('disabled', false).val('');
        $('#type_asset').prop('disabled', false).val('');
        $('#code_asset').prop('disabled', false).val('');
        $('#name_asset').prop('disabled', false).val('');
        $('#status_asset').prop('disabled', false).val('1');
        $('#pawn_price').prop('disabled', false).val('');
        $('#pawn_type').prop('disabled', false).val('1');
        $('#pawn_type_date').prop('disabled', false).val('1');
        $('#interest').prop('disabled', false).val('');
        $('#loan_date').prop('disabled', false).val('');
        $('#interest_type').prop('disabled', false).val('1');
        $('#interest_cycle').prop('disabled', false).val('');
        $('#description').prop('disabled', false).val('');

        $(".box_asset_detail").empty();
        $("input").removeClass('is-valid').removeClass('is-invalid')
        $("label.error").remove()
        $('.btn_add_detail').show();
        $('.btn_create_pawn').show();
    }

    function displayDetailForEdit() {
        if(EVENT_POPUP == 2) {
            let infoCustomer = ($('.info_pawn_' + INDEX_RECORD).data('customer')).split('*')
            $('#store_id').prop('disabled', 'disabled');
            $('input[name=type_customer]').attr("disabled",true);
            $('#customer_name').prop('disabled', 'disabled').val(infoCustomer[0]);
            $('#customer_phone').prop('disabled', 'disabled').val(infoCustomer[1]);
            $('#customer_ident_num').prop('disabled', 'disabled').val(infoCustomer[2]);
            $('#customer_ident_date').prop('disabled', 'disabled').val(infoCustomer[3]);
            $('#address').prop('disabled', 'disabled').val(infoCustomer[4]);
            $('#type_asset').prop('disabled', 'disabled').val($('.info_pawn_' + INDEX_RECORD).data('asset-type'));
            $('#code_asset').prop('disabled', 'disabled').val($('.info_pawn_' + INDEX_RECORD).data('asset-code'));
            $('#name_asset').prop('disabled', 'disabled').val($('.info_pawn_' + INDEX_RECORD).data('asset-name'));
            $('#status_asset').prop('disabled', 'disabled').val($('.info_pawn_' + INDEX_RECORD).data('asset-status'));
            let assetsDetail = $('.info_pawn_' + INDEX_RECORD).data('asset-datail')
            if(assetsDetail.length > 0) {
                let count_detail = 0;
                let detail = '';
                assetsDetail.forEach(function (item) {
                    detail += '<div class="col-sm-12 box_detail">\n' +
                        '                                    <label for="detail" class="col-form-label">Đặc điểm <span>' + (count_detail + 1) + '</span>:</label>\n' +
                        '                                    <div class="col-sm-12 d-flex align-items-center">\n' +
                        '                                        <div class="col-sm-10">\n' +
                        '                                            <input type="text" name="customer_ident_date" value="'+item+'" disabled class="form-control detail_asset" placeholder="Biển số, mật khẩu, ...">\n' +
                        '                                        </div>\n' +
                        '                                    </div>\n' +
                        '                                </div>';
                    count_detail++;
                })
                $('.box_asset_detail').append(detail)
            }
            $('#pawn_price').prop('disabled', 'disabled').val($('.info_pawn_' + INDEX_RECORD).data('pawn-price'));
            $('#pawn_type').prop('disabled', 'disabled').val($('.info_pawn_' + INDEX_RECORD).data('pawn-type'));
            $('#pawn_type_date').prop('disabled', 'disabled').val($('.info_pawn_' + INDEX_RECORD).data('pawn-type-date'));
            $('#interest').prop('disabled', 'disabled').val($('.info_pawn_' + INDEX_RECORD).data('interest'));
            $('#interest_type').prop('disabled', 'disabled').val($('.info_pawn_' + INDEX_RECORD).data('interest-type'));
            $('#interest_cycle').prop('disabled', 'disabled').val($('.info_pawn_' + INDEX_RECORD).data('interest-cycle'));
            $('#loan_date').prop('disabled', 'disabled').val($('.info_pawn_' + INDEX_RECORD).data('loan-date'));
            $('#description').prop('disabled', 'disabled').val($('.info_pawn_' + INDEX_RECORD).data('description'));

            $('.btn_add_detail').hide();
            $('.btn_create_pawn').hide();
        }
    }
    function checkPopupEdit() {
        if(EVENT_POPUP == 2) {

        }
    }
})

