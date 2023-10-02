$(function () {
    $(".btn-submit").click(function () {
        submit();
    });

    $("#username").select2({
        placeholder: 'Masukkan NIK',
        dropdownParent: $('#form-modal'),
        allowClear: true,
        width: '100%',
        minimumInputLength: 3,
        ajax: {
            url: base_url('reference/getNIK/'),
            type: 'GET',
            dataType: 'json',
            delay: 500,
            data: function (params) {
                var query = {
                    q: params.term,
                    page: params.page || 1,
                    limit: 5
                };
                return query;
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.results,
                    pagination: {
                        more: (params.page * 5) < data.total_count
                    }
                };
            },
            error: function (event, textStatus, errorThrown) {
                enabled();
                pharseError(event, errorThrown);
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        },
    });

    $('#username').on('select2:select', function (e) {
        let data = $('#username').select2('data');

        // if(!$('#name').val()){
            $('#name').val(data[0].name);
        // }

        // if(!$('#email').val()){
            $('#email').val(data[0].email);
        // }

        // if(!$('#factory_id').val()){
            $('#factory_id').val(data[0].factory_id);
        // }
    });

    $('#username').on('select2:unselecting', function (e) {
        
    });

    if(username){
        getNIK(username);
    }

    $("#role_id").select2({
        placeholder: 'Pilih Role Pengguna',
        dropdownParent: $('#form-modal'),
        width: '100%',
        ajax: {
            url: base_url('reference/getRole/'),
            type: 'GET',
            dataType: 'json',
            delay: 500,
            data: function (params) {
                var query = {
                    q: params.term,
                    page: params.page || 1,
                    limit: 5
                };
                return query;
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.results,
                    pagination: {
                        more: (params.page * 5) < data.total_count
                    }
                };
            },
            error: function (event, textStatus, errorThrown) {
                enabled();
                pharseError(event, errorThrown);
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        },
    });

    if(uuid){
        getRole(uuid);
    }
});

function submit() {
    $("#form_default").ajaxForm({
        type: "POST",
        url: $("#form_default").attr('action'),
        data: {
            "request": true
        },
        beforeSend: function (result) {
            disabled();
        },
        success: function (obj) {
            enabled();
            
            if (obj.metadata.code === 200) {
                $('#form-modal').modal("hide");
                toast(obj.metadata.message, 'Berhasil', 'success');
                $(".btn-refresh").click();
            } else {
                toast(obj.metadata.message, 'Kesalahan', 'error');
            }
        },
        error: function (event, textStatus, errorThrown) {
            enabled();
            pharseError(event, errorThrown);
        }
    });
}

function getNIK(id){
    if (id) {
        var username = $('#username');
        $.ajax({
            url: base_url('reference/getNIK/'),
            type: 'GET',
            dataType: 'json',
            delay: 250,
            data: {
                id: id
            },
            beforeSend: function () {

            },
        }).then(function (data) {

            // create the option and append to Select2
            $.each(data.results, function (i, val) {
                var option = new Option(val.text, val.id, true, true);
                username.append(option).trigger('change');
            });

            // manually trigger the `select2:select` event
            username.trigger({
                type: 'change.select2',
                params: {
                    data: data
                }
            });
        });
    }
}

function getRole(uuid){
    if (uuid) {
        var role_id = $('#role_id');
        $.ajax({
            url: base_url('reference/getRole/'),
            type: 'GET',
            dataType: 'json',
            delay: 250,
            data: {
                user_uuid: uuid
            },
            beforeSend: function () {

            },
        }).then(function (data) {
            console.log(data);
            // create the option and append to Select2
            $.each(data.results, function (i, val) {
                var option = new Option(val.text, val.id, true, true);
                role_id.append(option).trigger('change');
            });

            // manually trigger the `select2:select` event
            role_id.trigger({
                type: 'change.select2',
                params: {
                    data: data
                }
            });
        });
    }
}