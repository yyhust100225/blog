<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Brego Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    @yield('css')

</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{ asset('assets/images/icon.svg') }}" width="40" height="40" alt="Brego"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Theme Setting -->
<div class="themesetting">
    <a href="#" class="theme_btn"><i class="icon-magic-wand"></i></a>
    <ul class="choose-skin list-unstyled mb-0">
        <li data-theme="green"><div class="green"></div></li>
        <li data-theme="orange"><div class="orange"></div></li>
        <li data-theme="blush" class="active"><div class="blush"></div></li>
        <li data-theme="cyan"><div class="cyan"></div></li>
    </ul>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

<!-- 顶部菜单 -->
@yield('navbar', \Illuminate\Support\Facades\View::make('admin.layouts.navbar'))
<!-- 左侧边菜单 -->
@yield('sidemenu', \Illuminate\Support\Facades\View::make('admin.layouts.sidemenu'))
@yield('magemenu', \Illuminate\Support\Facades\View::make('admin.layouts.magemenu'))
<!-- 右侧边菜单 -->
@yield('rightbar', \Illuminate\Support\Facades\View::make('admin.layouts.rightbar'))
<!-- 主页 -->
@yield('main')

</div>

</body>

@yield('js')

</html>

