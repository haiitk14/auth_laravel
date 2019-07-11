var sendData = function( type, url, data, funcCallBack) {
    $.ajax({
        type: type, // POST, GET, PUT
        url: url, 
        data: data, // data format json
    }).done(function(result) {
        console.log(result);
        funcCallBack(result);
    }).fail(function(response) {
        var errors = $.parseJSON(response.responseText);
        $.each(errors.errors, function(index, value) {
            toastr.error(value);
        });
    }).always(function() {});
}

/**
 * Receive data returned AJAX [Tính phí công chứng]
 */
var calculationCallBack = function(data) {
    var value = formatDataForDatatable(data)
    addRowToDatatable(value);
    $("#thanh-tien").text(numeral(countTotalPrices()).format('0,0'));
}

/**
 * Receive data returned AJAX [Tính lại phí công chứng]
 */
var reCalculationCallBack = function(data) {
    var value = formatDataForDatatable(data);
    updateRowToDatatable(value);
    $("#form-modal-calculation").modal("hide");
    $("#thanh-tien").text(numeral(countTotalPrices()).format('0,0'));
}

/**
 * Hàm định dạng dữ liệu đúng chuẩn datatable 
 * Params (Object) là dữ liệu tính toán trả về từ Server
 */
var formatDataForDatatable = function(request) {
    if (request) {

        switch (request.params.type) {
            case '_chu_ky':
                request.dataOfUser = '&bull; Số lượng bản in: ' + numeral(request.params.so_luong_chu_ky).format('0,0');
                break;
            case '_sao_y':
                if (request.params.isSpecial ) {

                    if (request.params.isSpecial == "sao_y_ban_chinh") {
                        request.dataOfUser = '&bull; Số lượng bản in: ' + numeral(request.params.so_luong_sao_y).format('0,0') +
                        '<br> &bull; Số trang: ' + numeral(request.params.so_trang_sao_y).format('0,0');
                    }
                } else {
                    request.dataOfUser = '&bull; Số lượng bản in: ' + numeral(request.params.so_luong_sao_y).format('0,0') +
                    '<br> &bull; Số tờ: ' + numeral(request.params.so_to_sao_y).format('0,0');
                }
                break;
            case '_trich_luc':
                request.dataOfUser = '&bull; Số trang trích lục: ' + numeral(request.params.so_trang_trich_luc).format('0,0');
                break;
            case '_dau_gia':
                request.dataOfUser = '&bull; Số lượng: ' + numeral(request.params.so_luong_dau_gia).format('0,0');
                break;
            case '_dich_thuat':
                request.dataOfUser = '&bull; Phí dịch thuật: ' + numeral(request.params.phi_dich_vu_dich_thuat).format('0,0') + 
                                    '</br> &bull; Số lượng dấu: ' + numeral(request.params.so_luong_dau_dich_thuat).format('0,0') +
                                    '<br> &bull; Số bộ: ' + numeral(request.params.so_bo_dich_thuat).format('0,0') + 
                                    '<br> &bull; Số trang: ' + numeral(request.params.so_trang_dich_thuat).format('0,0');
                break;
            case '_hop_dong':
                var code = request.params.code;

                switch (code) {
                    case "_hop_dong_thue_hop_dong":
                        request.dataOfUser = '&bull; Giá thuê/tháng: ' + numeral(request.params.gia_thue_hop_dong).format('0,0') + 
                        '</br> &bull; Số tháng thuê: ' +   numeral(request.params.so_thang_hop_dong).format('0,0') +
                        '<br> &bull; Giá trị tài khoản/hợp đồng: ' + numeral(request.params.gia_tri_hop_dong).format('0,0');
                        break;
                    case "_hop_dong_mua_ban_nha_dat_hop_dong":
                        request.dataOfUser = '&bull; Diện tích đất ' + numeral(request.params.dien_tich_dat_hdmbnd).format('0,0') + 
                        '</br> &bull; Giá đất: ' + numeral(request.params.gia_dat_hdmbnd).format('0,0') +
                        '<br> &bull; Vị trí: ' + numeral(request.params.vi_tri_hdmbnd).format('0,0') +
                        '<br> &bull; Diện tích sàn: ' + numeral(request.params.dien_tich_san_hd).format('0,0') + 
                        '<br> &bull; Giá nhà: ' + numeral(request.params.gia_nha_hd).format('0,0') + 
                        '<br> &bull; Phần trăm: ' + numeral(request.params.phan_tram_hd).format('0,0');
                        break;
                    case "_hop_dong_mua_ban_dat_hop_dong":
                        request.dataOfUser = '&bull; Diện tích đất ' + numeral(request.params.dien_tich_dat_hdmbnd).format('0,0') + 
                        '</br> &bull; Giá đất: ' + numeral(request.params.gia_dat_hdmbnd).format('0,0') +
                        '<br> &bull; Vị trí: ' + numeral(request.params.vi_tri_hdmbnd).format('0,0');
                        break;
                }
                break;
            case '_van_ban':
                request.dataOfUser = '&bull; Số lượng bản in: ' + numeral(request.params.so_luong_van_ban).format('0,0');
                break;
        }
    }
    return request;
}

/**
 *  Hàm thêm 1 dòng vào datatable
 * Params (Object) là dữ liệu 1 dòng 
 */
var addRowToDatatable = function(req) {
    $('#table-result').DataTable().row.add( {
        "serviceName": req.service_name,
        "dataOfUser": req.dataOfUser,
        "servicePrice": numeral(req.service_price).format('0,0'),
        "sumPrice": numeral(req.sum_price).format('0,0'),
        "detail":   '<a href="javascript:;" title="Chỉnh sửa" class="btn btn-sm btn-outline-primary edit-item"><i class="fa fa-edit"></i> </a>' + 
                    '<a href="javascript:;" title="Delete" class="btn btn-sm btn-outline-danger del-item"><i class="fa fa-times"></i> </a>',
        "params": req.params,
        "number": req.number
    } ).draw(false);
}

/**
 *  Hàm cập nhật 1 dòng vào datatable
 * Params (Object) là dữ liệu 1 dòng 
 */
var updateRowToDatatable = function(req) {
    var select = $('#table-result').DataTable().$('tr.selected');

    $('#table-result').DataTable()
        .row( select )
        .data( {
            "serviceName": req.service_name,
            "dataOfUser": req.dataOfUser,
            "servicePrice": numeral(req.service_price).format('0,0'),
            "sumPrice": numeral(req.sum_price).format('0,0'),
            "detail":   '<a href="javascript:;" title="Chỉnh sửa" class="btn btn-sm btn-outline-primary edit-item"><i class="fa fa-edit"></i> </a>' + 
                        '<a href="javascript:;" title="Delete" class="btn btn-sm btn-outline-danger del-item"><i class="fa fa-times"></i> </a>',
            "params": req.params,
            "number": req.number
        } )
        .draw();
}

/**
 * Hàm kiểm tra dịch vụ Sao Y bản Chính
 */
var checkServiceSaoYBanChinh = function(code) {
    var res = false;

    listBanChinhSaoY.forEach(element => {
        if (element.code == code) {
            res = true;
        }
    });
    return res;
}

/**
 * Hàm Tính thành tiền trong bảng kết quả tính phí
 */
var countTotalPrices = function() {
    var result = 0;
    var myTable = $('#table-result').DataTable();
    var form_data  = myTable.rows().data();

    $.each( form_data, function( key, value ) {
        var price = numeral(value.sumPrice).value();
        result += price;
    });
    return result;
}

var print = function(elm) {
    var divToPrint=document.getElementById(elm);
    var newWin=window.open('','Print-Window');
    newWin.document.open();
    newWin.document.write('<html><head><style> table th { border: 1px solid #dee2e6; } table td { border: 1px solid #dee2e6; } </style></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
    newWin.document.close();
    setTimeout(function(){newWin.close();},10);
}

var DOCSO = function() {
    var t = ["không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín"],
        r = function(r, n) {
            var o = "",
                a = Math.floor(r / 10),
                e = r % 10;
            return a > 1 ? (o = " " + t[a] + " mươi", 1 == e && (o += " mốt")) : 1 == a ? (o = " mười", 1 == e && (o += " một")) : n && e > 0 && (o = " lẻ"), 5 == e && a >= 1 ? o += " lăm" : 4 == e && a >= 1 ? o += " tư" : (e > 1 || 1 == e && 0 == a) && (o += " " + t[e]), o
        },
        n = function(n, o) {
            var a = "",
                e = Math.floor(n / 100),
                n = n % 100;
            return o || e > 0 ? (a = " " + t[e] + " trăm", a += r(n, !0)) : a = r(n, !1), a
        },
        o = function(t, r) {
            var o = "",
                a = Math.floor(t / 1e6),
                t = t % 1e6;
            a > 0 && (o = n(a, r) + " triệu", r = !0);
            var e = Math.floor(t / 1e3),
                t = t % 1e3;
            return e > 0 && (o += n(e, r) + " nghìn ", r = !0), t > 0 && (o += n(t, r)), o
        };
    return {
        doc: function(r) {
            if (0 == r) return t[0];
            var n = "",
                a = "";
            do ty = r % 1e9, r = Math.floor(r / 1e9), n = r > 0 ? o(ty, !0) + a + n : o(ty, !1) + a + n, a = " tỷ"; while (r > 0);
            return n.trim() + " đồng";
        }
    }
}();
// number.toLocaleString('it-IT', {style : 'currency', currency : 'VND'})
