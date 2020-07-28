/**
 * ajax 防止csrf攻击
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * 挑战新增数据页面 绑定按钮事件
 * @param insert_url
 */
function bindInsertFormData(insert_url){
    $('.insert-form-data').on('click', function(){
        window.location.href = insert_url;
    });
}
/**
 * 跳转编辑页面 按钮绑定事件
 * @param edit_url
 */
function bindEditFormData(edit_url) {
    $('table').on('click', '.edit-form-data', function(data) {
        window.location.href = edit_url + '/' + $(this).data('id');
    });
}

/**
 * 创建|编辑数据提交 按钮绑定事件
 * @param request_url 创建数据提交url
 * @param reload_url 创建成功后跳转url
 */
function bindFormSubmit(request_url, reload_url) {
    $('#submit-form-data').on('click', function(){
        $('#submit-form-data').addClass('disabled');
        $('#submit-form-data').attr('disabled', 'true');
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
                        text: res.message,
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
                $('#submit-form-data').removeClass('disabled');
                $('#submit-form-data').removeAttr('disabled');
            },
        });
    });
}

/**
 * 删除数据 按钮绑定事件
 * @param delete_url 删除请求url
 * @param table 表格对象, 用于删除后表格重载
 */
function bindDeleteFormData(delete_url, table) {
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
                                text: res.message,
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
