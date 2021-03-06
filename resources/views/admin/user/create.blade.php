@extends('admin.layouts.main')
@section('title', '创建新账户')

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
                            <h2>账户信息</h2>
                        </div>
                        <div class="body">
                                <div class="form-group">
                                    <label>用户名</label>
                                    <input name="name" value="" type="text" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>密码</label>
                                    <input name="password" value="" type="password" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>确认密码</label>
                                    <input name="_password" value="" type="password" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>邮箱</label>
                                    <input name="email" value="" type="email" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>账号角色</label>
                                    <select name="role_id" class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="header form-multistep-header">
                            <h2>基本信息</h2>
                        </div>
                        <div class="body">
                            <div class="form-group">
                                <label>用户昵称</label>
                                <input name="nickname" value="" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>性别</label>
                                <div class="form-radio">
                                <label class="fancy-radio">
                                    <input type="radio" name="gender" value="m" checked />
                                    <span><i></i>男</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="gender" value="f">
                                    <span><i></i>女</span>
                                </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>联系方式</label>
                                <input name="tel" value="" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>用户头像</label>
                                <div class="single-img-upload">
                                    <img id="avatar-upload-img" src="{{ \Illuminate\Support\Facades\Storage::disk('image')->url('avatars/default-tx01.jpg') }}" alt="头像预览" />
                                    <input type="hidden" name="avatar" id="avatar-path" value="avatars/default-tx01.jpg" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>账户备注</label>
                                <textarea name="remark" class="form-control"></textarea>
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
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="{{ asset('assets/layui/layui.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        layui.use('upload', function(){
            var upload = layui.upload;

            // 头像上传
            var uploadInst = upload.render({
                elem: '#avatar-upload-img',
                url: '{{ route('user.upload.avatar') }}',
                field: 'avatar',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                before: function(obj){
                    obj.preview(function(index, file, result){
                        $('#avatar-upload-img').attr('src', result);
                    });
                },
                done: function(res){
                    if(res.success) {
                        $('#avatar-path').val(res.path);
                    }
                },
                error: function(){

                }
            });
        });

        $(function(){
            bindFormSubmit("{{ route('user.create.submit') }}", "{{ route('user.list') }}");
        });
    </script>
@endsection

