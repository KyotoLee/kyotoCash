$(document).ready(function() {
    $('.input_search_customer').hide()
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
            $('#btn-register').prop('disabled', true);
            let formData = new FormData();
            formData.append('kana_first_name', $('#user_name_kana').val());
            if ($("input[name='input-check-register']").is(":checked") || $("input[name='input-check-register']").length == 0) {
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: '',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(data) {
                        $('#btn-register').prop('disabled', false);
                        if (data.success == true) {
                        }
                    }
                })
            }
            return false;
        }
    })
})

