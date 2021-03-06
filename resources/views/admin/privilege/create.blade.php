@extends('admin.layouts.main')
@section('title', '创建新权限')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href={{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/vendor/font-awesome/css/font-awesome.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/vendor/animate-css/vivify.min.css") }}>
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href={{ asset("assets/css/site.css") }}>
    <link rel="stylesheet" href={{ asset("assets/css/app.css") }}>
@endsection

@section('main')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Basic Form Elements</h2>
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
                <div class="col-md-12">
                    <div class="card">
                        <form id="data-form" method="post" onsubmit="return false;" action="#">
                            @csrf
                            <div class="header">
                                <h2>权限信息</h2>
                            </div>
                            <div class="body">
                                <div class="form-group">
                                    <label for="name">权限名称</label>
                                    <input id="name" name="name" value="" type="text" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="controller">控制器</label>
                                    <input id="controller" name="controller" value="" type="text" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="route">路由</label>
                                    <input id="route" name="route" value="" type="text" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="remark">权限备注</label>
                                    <textarea id="remark" name="remark" class="form-control"></textarea>
                                </div>
                                <br>
                                <button id="submit-form-data" class="btn btn-primary">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Javascript -->
    <script src="{{ asset("assets/bundles/libscripts.bundle.js") }}"></script>
    <script src="{{ asset("assets/bundles/vendorscripts.bundle.js") }}"></script>
    <script src="{{ asset("assets/bundles/mainscripts.bundle.js") }}"></script>
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>

    <script src="{{ asset('assets/layui/layui.js') }}" charset="utf-8"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            bindFormSubmit("{{ route('privilege.create.submit') }}", "{{ route('privilege.list') }}");
        });
    </script>
@endsection

