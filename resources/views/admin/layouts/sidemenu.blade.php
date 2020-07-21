<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="index.html"><img src="{{ asset('assets/images/icon.svg') }}" alt="Brego Logo" class="img-fluid logo"><span>Brego</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="https://via.placeholder.com/140x140" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Louis Pierce</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                </ul>
            </div>
            <button class="btn btn-sm btn-block btn-primary btn-round mt-3" title=""><i class="icon-plus mr-1"></i> Create New</button>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">

                <li class="header">概览</li>
                <li @if(in_array(request()->route()->getName(), ['home']))class="active"@endif><a href="app-chat.html"><i class="icon-bubbles"></i> <span>后台主页</span></a></li>

                <li class="header">综合设置</li>
                <li @if(in_array(request()->route()->getName(), ['users']))class="active"@endif>
                    <a href="javascript:void(0);" class="has-arrow"><i class="icon-lock-open"></i><span>权限设置</span></a>
                    <ul>
                        <li @if(in_array(request()->route()->getName(), ['users']))class="active"@endif><a href="{{ route('users') }}">用户管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow"><i class="icon-settings"></i><span>系统设置</span></a>
                    <ul>
                        <li><a href="index.html">基本参数</a></li>
                        <li><a href="index.html">秘钥设置</a></li>
                        <li><a href="index.html">邮件设置</a></li>
                    </ul>
                </li>

                <li class="header">Main</li>
                <li class="active">
                    <a href="#Dashboard" class="has-arrow"><i class="icon-speedometer"></i><span>Dashboard</span></a>
                    <ul>
                        <li class="active"><a href="index.html">Light Version</a></li>
                    </ul>
                </li>
                <li class="header">App</li>
                <li><a href="app-inbox.html"><i class="icon-envelope"></i> <span>Email</span> <span class="badge badge-default float-right mr-0">12</span></a></li>
                <li><a href="app-chat.html"><i class="icon-bubbles"></i> <span>Chat</span></a></li>
                <li><a href="app-calendar.html"><i class="icon-calendar"></i> <span>Calendar</span></a></li>
                <li class="header">UI Elements</li>
                <li>
                    <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i><span>Components</span></a>
                    <ul>
                        <li><a href="ui-helper-class.html">Helper Classes</a></li>
                        <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-tabs.html">Tabs</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-icons.html">Icons</a></li>
                        <li><a href="ui-notifications.html">Notifications</a></li>
                        <li><a href="ui-colors.html">Colors</a></li>
                        <li><a href="ui-dialogs.html">Dialogs</a></li>
                        <li><a href="ui-list-group.html">List Group</a></li>
                        <li><a href="ui-media-object.html">Media Object</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-nestable.html">Nestable</a></li>
                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                        <li><a href="ui-range-sliders.html">Range Sliders</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#forms" class="has-arrow"><i class="icon-pencil"></i><span>Forms</span></a>
                    <ul>
                        <li><a href="forms-basic.html">Basic Elements</a></li>
                        <li><a href="forms-advanced.html">Advanced Elements</a></li>
                        <li><a href="forms-validation.html">Form Validation</a></li>
                        <li><a href="forms-wizard.html">Form Wizard</a></li>
                        <li><a href="forms-dragdropupload.html">Drag &amp; Drop Upload</a></li>
                        <li><a href="forms-cropping.html">Image Cropping</a></li>
                        <li><a href="forms-summernote.html">Summernote</a></li>
                        <li><a href="forms-editors.html">CKEditor</a></li>
                        <li><a href="forms-markdown.html">Markdown</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#Tables" class="has-arrow"><i class="icon-layers"></i><span>Tables</span></a>
                    <ul>
                        <li><a href="table-normal.html">Normal Tables</a></li>
                        <li><a href="table-jquery-datatable.html">Jquery Datatables</a></li>
                        <li><a href="table-editable.html">Editable Tables</a></li>
                        <li><a href="table-color.html">Tables Color</a></li>
                        <li><a href="table-filter.html">Table Filter</a></li>
                        <li><a href="table-dragger.html">Table dragger</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#charts" class="has-arrow"><i class="icon-pie-chart"></i><span>Charts</span></a>
                    <ul>
                        <li><a href="chart-c3.html">C3 Charts</a></li>
                        <li><a href="chart-morris.html">Morris</a></li>
                        <li><a href="chart-flot.html">Flot</a></li>
                        <li><a href="chart-chartjs.html">ChartJS</a></li>
                        <li><a href="chart-jquery-knob.html">Jquery Knob</a></li>
                        <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                    </ul>
                </li>
                <li class="header">Extra</li>
                <li><a href="widgets.html"><i class="icon-puzzle"></i><span>Widgets</span></a></li>
                <li>
                    <a href="#Pages" class="has-arrow"><i class="icon-docs"></i><span>Pages</span></a>
                    <ul>
                        <li><a href="page-login.html">Login</a></li>
                        <li><a href="page-register.html">Register</a></li>
                        <li><a href="page-forgot-password.html">Forgot Password</a></li>
                        <li><a href="page-404.html">Page 404</a></li>
                        <li><a href="page-blank.html">Blank Page</a></li>
                        <li><a href="page-search-results.html">Search Results</a></li>
                        <li><a href="page-profile.html">Profile </a></li>
                        <li><a href="page-invoices.html">Invoices </a></li>
                        <li><a href="page-gallery.html">Image Gallery </a></li>
                        <li><a href="page-timeline.html">Timeline</a></li>
                        <li><a href="page-pricing.html">Pricing</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#Maps" class="has-arrow"><i class="icon-map"></i><span>Maps</span></a>
                    <ul>

                        <li><a href="map-jvectormap.html">jVector Map</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
