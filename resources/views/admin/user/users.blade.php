@extends('admin.layouts.main')
@section('title', '用户管理')

@section('css')
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate-css/vivify.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}"/>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
@endsection

@section('main')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>jQuery Datatable</h1>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="inlineblock vivify swoopInTop delay-900 mr-4">Visitors <span id="mini-bar-chart1" class="mini-bar-chart"></span></div>
                    <div class="inlineblock vivify swoopInTop delay-950 mr-4">Visits <span id="mini-bar-chart2" class="mini-bar-chart"></span></div>
                    <div class="inlineblock vivify swoopInTop delay-1000">Chats <span id="mini-bar-chart3" class="mini-bar-chart"></span></div>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header data-table-header">
                            <h2>Basic Table <small>abcdefg</small></h2>
                            <ul class="header-dropdown dropdown">
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>用户名</th>
                                        <th>联系电话</th>
                                        <th>邮箱</th>
                                        <th>创建时间</th>
                                        <th>账户状态</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <!-- Javascript -->
    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>

    <script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>

    <script type="text/javascript">
        $('.js-basic-example').DataTable({
            "searching": true,
            "lengthMenu": [10, 20, 30],
            "serverSide": true,
            "scrollX": true,
            "ajax": {
                url: "{{ route('users_data') }}",
                type: 'GET',
                dataType: 'json',
                data: function(param){

                },
            },
            "columns": [
                {data:"id", orderable:true, width:'4%', searchable:true},
                {data:"name", orderable:true, width:'10%', searchable:true},
                {data:"user_info.user_tel", width:'10%', orderable:false, searchable:false},
                {data:"email", orderable:true, width:'15%', searchable:true},
                {data:"created_at", orderable:true, width:'10%', searchable:true},
                {data:'status', orderable:false, searchable:false, width:'10%', render: function(data){
                    if(data === 0)
                        return '<div class="badge badge-danger badge-shadow">禁用</div>';
                    else
                        return '<div class="badge badge-success badge-shadow">启用</div>';
                }},
                {orderable:false, searchable:false, width: '10%', render:function(){
                    return '<button class="table-operation btn btn-primary btn-sm">编辑</button>' +
                        '<button class="table-operation btn btn-danger btn-sm">删除</button>';
                }}
            ]
        });
    </script>
@endsection

