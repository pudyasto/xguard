$.fn.dataTable.ext.errMode = 'none';
$(function () {
    $(".btn-refresh").click(function () {
        tableMain.ajax.reload();
    });

    tableMain = $('#tableMain').DataTable({
        processing: true,
        serverSide: true,
        pagingType: 'numbers',
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        columns: [
            { "data": "icon", "orderable": false, "class": "text-center"},
            { "data": "menu_header", },
            { "data": "menu_name", },
            { "data": "submenu", },
            { "data": "description", },
            { "data": "link", },
            { "data": "is_active", },
            { "data": "btn", "orderable": false}
        ],
        orderFixed: [
            [1, "asc"], [2, "asc"], [3, "asc"],
        ],
        order: [
            [1, "asc"], [2, "asc"],
        ],
        ajax: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                if (tableMain.hasOwnProperty('settings')) {
                    tableMain.settings()[0].jqXHR.abort();
                }
            },
            url: base_url('menus/tableMain'),
            method: 'POST'
        },
        sDom: '<"datatable-header"l p><"datatable-scroll"t><"datatable-footer"i p>',
        oLanguage: {
            "sLengthMenu": "_MENU_",
            "sZeroRecords": "Tidak ada data",
            "sProcessing": "Silahkan Tunggu",
            "sInfo": "_START_ - _END_ / _TOTAL_",
            "sInfoFiltered": "",
            "sInfoEmpty": "0 - 0 / 0",
            "infoFiltered": "(_MAX_)",
        }
    });


    $('#tableMain tfoot th').each(function () {
        var title = $('#tableMain tfoot th').eq($(this).index()).text();
        if (title.toLowerCase() !== "id") {
            $(this).html('<input type="text" class="form-control" placeholder="Cari ' + title + '" />');
        } else {
            $(this).html('');
        }
    });

    tableMain.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function (ev) {
            that
                .search(this.value)
                .draw();
        });
    });
});

function deleteData(id) {
    swalInit.fire({
        title: "Konfirmasi Hapus",
        text: "Data yang dihapus, tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#c9302c",
        confirmButtonText: "Ya, Lanjutkan",
        cancelButtonText: "Tidak, Batalkan"
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: base_url('menus/destroy/' + id),
                data: {
                    "stat": "delete"
                    , '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (obj) {
                    if (obj.metadata.code === 200) {
                        $(".btn-refresh").click();
                        toast(obj.metadata.message, 'Berhasil', 'success');
                    } else {
                        toast(obj.metadata.message, 'Kesalahan', 'error');
                    }
                },
                error: function (event, textStatus, errorThrown) {
                    pharseError(event, errorThrown);
                }
            });
        }
    });
}