function bindFormSubmit(request_url, reload_url, text)
{
    $('#btn-form-submit').on('click', function(){
        $('#btn-form-submit').addClass('disabled');
        $('#btn-form-submit').attr('disabled', 'true');
        $.ajax({
            type: 'POST',
            url: request_url,
            data: $('#data-form').serialize(),
            dataType: 'json',
            async: false,
            success: function(res){
                if(res.success) {
                    swal({
                        title: "恭喜您!",
                        text: "更新用户信息成功!",
                        icon: "success",
                    }).then(function(){
                        window.location = reload_url;
                    });
                }
            },
            error: function(e){
                console.log(e);
                $.each(e.responseJSON.errors, function(k,v){
                    swal({
                        title: "抱歉!",
                        text: v[0],
                        icon: "error",
                    });
                    return false;
                });
                $('#btn-form-submit').removeClass('disabled');
                $('#btn-form-submit').removeAttr('disabled');
            },
        });
    });
}

function bindDeleteFormData(delete_url, table)
{
    $('table').on('click', '.delete-form-data', function(data){
        swal({
            title: "确认删除吗?",
            text: "一经删除, 则数据无法恢复!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'POST',
                    url: delete_url,
                    data: {id: $(this).data('id')},
                    dataType: 'json',
                    async: false,
                    success: function(res){
                        if(res.success) {
                            swal({
                                title: "恭喜您!",
                                text: "信息删除成功!",
                                icon: "success",
                            }).then(function(){
                                table.draw(false);
                            });
                        }
                    },
                    error: function(e){
                        console.log(e);
                        $.each(e.responseJSON.errors, function(k,v){
                            swal({
                                title: "抱歉!",
                                text: v[0],
                                icon: "error",
                            });
                            return false;
                        });
                    },
                });
            }
        });
    });
}
