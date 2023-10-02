tableMain = '';
const swalInit = swal.mixin({
    buttonsStyling: false,
    customClass: {
        confirmButton: 'btn btn-primary',
        cancelButton: 'btn btn-light',
        denyButton: 'btn btn-light',
        input: 'form-control'
    }
});

$('input:password').val('');

$('#form-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var title = button.data('title');
    var action_url = button.data('action-url');
    var uuid = button.data('post-id');
    var width = button.data('width');
    if (width) {
        $(".modal-dialog").css("min-width", width);
    } else {
        $(".modal-dialog").css("min-width", "");
    }
    if (action_url !== undefined) {
        $.ajax({
            type: "GET",
            url: base_url(action_url),
            data: { "uuid": uuid },
            beforeSend: function () {
                $("#form-modal-content").html('');
            },
            success: function (resp) {
                $("#form-modal-content").html(resp);
                set_controls();
            },
            error: function (event, textStatus, errorThrown) {
                pharseError(event, errorThrown);
                $('#form-modal').modal("hide");
            }
        });
        var modal = $(this);
        modal.find('.modal-title').text(title);
    }
});

$('#form-modal').on('hidden.bs.modal', function () {
    $(".modal-dialog").css("min-width", "");
    $("#form-modal-content").html("");
});

// $('#form-modal-secondary').on('show.bs.modal', function (event) {
//     var button = $(event.relatedTarget);
//     var title = button.data('title');
//     var action_url = button.data('action-url');
//     var param_1 = button.data('param-1');
//     var param_2 = button.data('param-2');
//     var width = button.data('width');
//     if (width) {
//         $(".modal-dialog-secondary").css("min-width", width);
//     } else {
//         $(".modal-dialog-secondary").css("min-width", "");
//     }
//     if (action_url !== undefined) {
//         $.ajax({
//             type: "GET",
//             url: base_url(action_url),
//             data: {
//                 "p1": param_1,
//                 "p2": param_2
//             },
//             beforeSend: function () {
//                 $("#form-modal-content-secondary").html('');
//             },
//             success: function (resp) {
//                 $("#form-modal-content-secondary").html(resp);
//                 set_controls();
//             },
//             error: function (event, textStatus, errorThrown) {
//                 pharseError(event, errorThrown);
//             }
//         });
//         var modal = $(this);
//         modal.find('.modal-title').text(title);
//     }
// });

// $('#form-modal-secondary').on('hidden.bs.modal', function () {
//     $(".modal-dialog-secondary").css("min-width", "");
//     $("#form-modal-content-secondary").html("");
// });

var bulan = ["Nama Bulan", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
var bulan_short = ["Nama Bulan", "Jan", "Feb", "Mar", "Apr", "Mei", "Juni", "Juli", "Agt", "Sept", "Okt", "Nov", "Des"];

function bln_id_short(param) {
    var tahun = param.substring(0, 4);
    var bulan = param.substring(5, 7);
    return bulan_short[Number(bulan)] + " " + tahun;
}

function dateconvert(param) {
    var tahun = param.substring(0, 4);
    var bulan = param.substring(5, 7);
    var tanggal = param.substring(8, 10);
    var jam = param.substring(11, 20);
    return tanggal + "-" + (bulan) + "-" + tahun + " " + jam;
}

function tgl_id_short(param) {
    var tahun = param.substring(0, 4);
    var bulan = param.substring(5, 7);
    var tanggal = param.substring(8, 10);
    var jam = param.substring(11, 20);
    return tanggal + " " + bulan_short[Number(bulan)] + " " + tahun + " " + jam;
}

function tgl_id_long(param) {
    var tahun = param.substring(0, 4);
    var bln = param.substring(5, 7);
    var tanggal = param.substring(8, 10);
    var jam = param.substring(11, 20);
    return tanggal + " " + bulan[Number(bln)] + " " + tahun + " " + jam;
}

function pharseError(event, errorThrown) {
    var message = event.responseText;
    console.log(message);
    if (isJson(message)) {
        message = JSON.parse(event.responseText);
        message = message.message;
    }
    
    if( message && message.indexOf("unauthorized")!== -1 ){
        message = 'Anda tidak berhak mengakses fitur atau halaman ini';
    }

    // errorThrown
    toast(message, "Kesalahan", 'error');
    swalInit.fire({
        title: "Kesalahan",
        text: message,
        icon: "error",
    }).then((result) => {
        $('#form-modal').modal("hide");
    });
}

function toast(message, title, typemessage) {
    if (!typemessage) {
        typemessage = "info";
    }
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    toastr[typemessage](message, title);
}

set_controls();

function set_controls() {
    $('input:password').val('');

    $("input:text").focus(function () {
        $(this).select();
    });

    $("textarea").focus(function () {
        $(this).select();
    });

    $('.year').datepicker({
        startView: "year",
        minViewMode: "years",
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: false,
        autoclose: true,
        format: "yyyy"
    });

    $('.calendar').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: false,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

    $('.month').datepicker({
        startView: "year",
        minViewMode: "months",
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: false,
        autoclose: true,
        format: "mm-yyyy"
    });

    $(".qty").blur(function (e) {
        var v = $(this).val();
        var n = numeral(v).format('0,0.00');
        $(this).val(n);
    });

    $(".qty").focus(function (e) {
        var v = $(this).val();
        var n = numeral(v).value();
        $(this).val(n);
        $(this).select();
    });

    $(".money").blur(function (e) {
        var v = $(this).val();
        var n = numeral(v).format('0,0.00');
        $(this).val(n);
    });

    $(".money").focus(function (e) {
        var v = $(this).val();
        var n = numeral(v).value();
        $(this).val(n);
        $(this).select();
    });

    $(".percent").blur(function (e) {
        var v = $(this).val();
        var n = numeral(v).format('0,0.00');
        $(this).val(n);
    });

    $(".percent").focus(function (e) {
        var v = $(this).val();
        var n = numeral(v).value();
        $(this).val(n);
    });

    $("input:text").attr('autocomplete', 'off');
    $(".form-control").attr("autocomplete", 'off');


    $(".form-control").focus(function () {
        $(this).closest('.form-line').addClass('focused');
    });

    $(".form-control").focusout(function () {
        $(this).closest('.form-line').removeClass('focused');
    });

    // $('.selectpicker').selectpicker('render');

}

function disabled() {
    // $(".form-control").attr("disabled", true);
    $("button.btn").addClass("btn-progress");
    $("button.btn").attr("disabled", true);
    // $(".page-loader-wrapper").css({ 'display': '' });
}

function enabled() {
    // $(".form-control").attr("disabled", false);
    $("button.btn").removeClass("btn-progress");
    $("button.btn").attr("disabled", false);
    // $(".page-loader-wrapper").css({ 'display': 'none' });
}

function getMoney() {
    $('.money').each(function (obj) {
        $(this).val(numeral($(this).val()).value());
    });
    $('.percent').each(function (obj) {
        $(this).val(numeral($(this).val()).value());
    });
    $('.qty').each(function (obj) {
        $(this).val(numeral($(this).val()).value());
    });
}

function setMoney() {
    $('.money').each(function (obj) {
        $(this).val(numeral($(this).val()).format('0,0'));
    });
    $('.percent').each(function (obj) {
        $(this).val(numeral($(this).val()).format('0,0.00'));
    });
    $('.qty').each(function (obj) {
        $(this).val(numeral($(this).val()).format('0,0.00'));
    });
}

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

function printElement(element) {
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write(document.getElementById(element).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}

function formatResultPengajuanDana(data) {
    if (data.loading) {
        return data.text;
    }
    var container = $(
        "<div class='clearfix'>" +
        "<div>" + data.text + "</div>" +
        "<div><small>Tanggal : " + tgl_id_short(data.header.tanggal_pelaksanaan) + "</small></div>" +
        "<div><small>Pencairan : " + data.pencairan + "</small></div>" +
        "<div><small>Kegiatan : " + data.deskripsi + "</small></div>" +
        "</div>"
    );

    return container;
}

function formatResult(data) {
    if (data.loading) {
        return data.text;
    }
    var container = $(
        "<div class='clearfix'>" +
        "<div>" + data.text + "</div>" +
        "</div>"
    );

    return container;
}

function formatSelection(data) {
    return data.text;
}

function shortText(str, len = 30) {
    let length = str.length
    if (length > 30) {
        return str.substring(0, len) + '... ';
    } else {
        return str;
    }
}

function isUrlValid(url) {
    return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
}
