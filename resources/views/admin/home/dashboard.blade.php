

@extends('admin.layouts.main')

@section('title', '后台控制板')

@section('css')
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate-css/vivify.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css') }}"/>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
@endsection

@section('main')
<div id="main-content">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Dashboard</h1>
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
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-briefcase"></i></div>
                            <div class="ml-4">
                                <span>Total income</span>
                                <h4 class="mb-0 font-weight-medium">$7,805</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="icon-in-bg bg-azura text-white rounded-circle"><i class="fa fa-credit-card"></i></div>
                            <div class="ml-4">
                                <span>New expense</span>
                                <h4 class="mb-0 font-weight-medium">$3,651</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="icon-in-bg bg-orange text-white rounded-circle"><i class="fa fa-users"></i></div>
                            <div class="ml-4">
                                <span>Daily Visits</span>
                                <h4 class="mb-0 font-weight-medium">5,805</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="icon-in-bg bg-pink text-white rounded-circle"><i class="fa fa-life-ring"></i></div>
                            <div class="ml-4">
                                <span>Bounce rate</span>
                                <h4 class="mb-0 font-weight-medium">$13,651</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Site Visitors</h2>
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
                        <div id="world-map-markers" class="jvector-map" style="height: 245px"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="slider3" class="carousel vert slide" data-ride="carousel" data-interval="1700">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="card-value float-right text-muted"><i class="wi wi-fog"></i></div>
                                            <h3 class="mb-1">12°C</h3>
                                            <div>London</div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="card-value float-right text-muted"><i class="wi wi-day-cloudy"></i></div>
                                            <h3 class="mb-1">18°C</h3>
                                            <div>New York</div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="card-value float-right text-muted"><i class="wi wi-sunrise"></i></div>
                                            <h3 class="mb-1">37°C</h3>
                                            <div>New Delhi</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="slider2" class="carousel vert slide" data-ride="carousel" data-interval="2000">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="card-value float-right text-muted"><i class="icon-drawer"></i></div>
                                            <h3 class="mb-1">302</h3>
                                            <div>Inbox</div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="card-value float-right text-muted"><i class="icon-star"></i></div>
                                            <h3 class="mb-1">21</h3>
                                            <div>Starred</div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="card-value float-right text-muted"><i class="icon-notebook"></i></div>
                                            <h3 class="mb-1">2</h3>
                                            <div>Drafts</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-value float-right text-muted"><i class="icon-bubbles"></i></div>
                                <h3 class="mb-1">102</h3>
                                <div>Messages</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>New Followers</h2>
                    </div>
                    <div class="body">
                        <ul class="right_chat w_followers list-unstyled mb-0">
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="https://via.placeholder.com/140x140" alt="">
                                        <div class="media-body">
                                            <span class="name">@MelissaMcCoy</span>
                                            <span class="message">Designer, Blogger</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="https://via.placeholder.com/140x140" alt="">
                                        <div class="media-body">
                                            <span class="name">@Joge Lucky</span>
                                            <span class="message">Java Developer</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="https://via.placeholder.com/140x140" alt="">
                                        <div class="media-body">
                                            <span class="name">@JuanMartinez</span>
                                            <span class="message">CEO, puffintheme</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="https://via.placeholder.com/140x140" alt="">
                                        <div class="media-body">
                                            <span class="name">@Folisise Chosielie</span>
                                            <span class="message">Art director, Movie Cut</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="https://via.placeholder.com/140x140" alt="">
                                        <div class="media-body">
                                            <span class="name">@LouisHenry</span>
                                            <span class="message">Writter, Mag Editor</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="https://via.placeholder.com/45x45" alt="">
                                        <div class="media-body">
                                            <span class="name">@Folisise Chosielie</span>
                                            <span class="message">Art director, Movie Cut</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table header-border table-hover table-custom spacing5">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Popularity</th>
                            <th>Sales</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th class="w60">1</th>
                            <td>Home Decor Range</td>
                            <td>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                                </div>
                            </td>
                            <td><span class="badge badge-primary">70%</span>
                            </td>
                        </tr>
                        <tr>
                            <th>2</th>
                            <td>Bathroom Essentials</td>
                            <td>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">70%</span>
                            </td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Disney Princess Pink 18' School Bag</td>
                            <td>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                                </div>
                            </td>
                            <td><span class="badge badge-dark">70%</span>
                            </td>
                        </tr>
                        <tr>
                            <th>4</th>
                            <td>iPhone XS and XS Max</td>
                            <td>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                                </div>
                            </td>
                            <td><span class="badge badge-danger">70%</span>
                            </td>
                        </tr>
                        <tr>
                            <th>5</th>
                            <td>Apple Smartwatches</td>
                            <td>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                                </div>
                            </td>
                            <td><span class="badge badge-warning">70%</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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

<script src="{{ asset('assets/bundles/jvectormap.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/toastr/toastr.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/index.js') }}"></script>
@endsection

