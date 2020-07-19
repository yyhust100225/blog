@extends('admin.layouts.main')

@section('title', '用户登录');

<body class="theme-blush">

<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
            <a class="navbar-brand" href="#"><img src={{ asset('assets/images/icon.svg') }} width="30" height="30" class="d-inline-block align-top mr-2" alt="">Brego</a>
        </div>
        <div class="card">
            <div class="pattern">
                <span class="red"></span>
                <span class="indigo"></span>
                <span class="blue"></span>
                <span class="green"></span>
                <span class="orange"></span>
            </div>
            <div class="header">
                <p class="lead">登录你的账户</p>
            </div>
            <div class="body">
                <form method="post" class="form-auth-small" action="{{ route('login_submit') }}">
                    @csrf
                    <div class="form-group">
                        <label for="signin-email" class="control-label sr-only">用户名</label>
                        <input type="text" name="username" class="form-control round" id="signin-email" value="" placeholder="用户名|邮箱">
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">密码</label>
                        <input type="password" name="password" class="form-control round" id="signin-password" value="" placeholder="密码">
                    </div>
                    <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                            <input type="checkbox" name="remember" value="true">
                            <span>记住我</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block">登录</button>
                    <div class="bottom">
                        <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.html">忘记密码?</a></span>
                        <span>还没有账户? <a href="page-register.html">注册</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->

<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>

<script src="{{ asset('assets/vendor/particlesjs/particles.min.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/particlesjs.js') }}"></script>
</body>
</html>
