<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8"/>
    <title>Admin Panels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="{{ asset('img/logo2nd.png') }}" rel="shortcut icon" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

    <!-- BEGIN PLUGIN CSS -->
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{ asset('plugins/bootstrap-tag/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/dropzone/css/dropzone.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/bootstrap-select2/select2.css" rel="stylesheet') }}" type="text/css" media="screen"/>
    <link href="{{ asset('plugins/jquery-slider/css/jquery.sidr.light.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{ asset('plugins/jquery-morris-chart/css/morris.css') }}" rel="stylesheet" type="text/css" media="screen">
    <!-- END PLUGIN CSS -->

    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="{{ asset('plugins/boostrapv3/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/boostrapv3/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END CORE CSS FRAMEWORK -->

    <!-- BEGIN CSS TEMPLATE -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/custom-icon-set.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END CSS TEMPLATE -->

    <!-- select2 -->
    <link href="{{ asset('js/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('plugins/boostrap-slider/css/slider.css') }}" rel="stylesheet" type="text/css"/>

    <!-- BEGIN BOOSTRAP DATATABLE RESPONSIVE -->
    <link href="{{ asset('plugins/boostrap-datatable-responsive/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{ asset('plugins/boostrap-datatable-responsive/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <script src="{{ asset('plugins/boostrap-datatable-responsive/jquery-1.12.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/boostrap-datatable-responsive/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/boostrap-datatable-responsive/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/boostrap-datatable-responsive/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/boostrap-datatable-responsive/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/boostrap-datatable-responsive/responsive.bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- END BOOSTRAP DATATABLE RESPONSIVE -->

    <script src="{{ asset('js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>

    <style type="text/css">
        .menu {
            border-radius: 3px;
            display: block;
            margin-left: -5px;
            padding: 5px;
        }

        .current { background-color: rgb(44, 187, 15); }

        .page-sidebar > ul > li:hover > a { background-color: rgb(44, 187, 15); }

        .page-sidebar > ul > li.under-costruction:hover > a, .page-sidebar > ul > li > ul > li.under-costruction:hover > a {
            background-color: #ddd;
            color: #b7b7b7;
        }

        .page-sidebar > ul > li.under-costruction:hover > a > span i, .page-sidebar > ul > li > ul > li.under-costruction:hover > a > span i { color: #b7b7b7 !important; }

        .page-sidebar > ul > li > ul.sub-menu li > ul.sub-menu > li > a { color: #b7b7b7 !important; }

        .page-sidebar > ul > li.under-costruction > a, .page-sidebar > ul > li > ul > li.under-costruction > a {
            color: #b7b7b7;
            cursor: not-allowed;
        }

        .page-sidebar > ul > li.under-costruction > a > span i, .page-sidebar > ul > li > ul > li.under-costruction > a > span i { color: #b7b7b7 !important; }

        .page-sidebar > ul > li.open > a {
            -moz-box-shadow: 0px 3px 4px -1px #e5e9ec;
            -webkit-box-shadow: 0px 3px 4px -1px #e5e9ec;
            box-shadow: 0px 3px 4px -1px #e5e9ec;
        }

        .page-sidebar > ul > li > ul.sub-menu li.open > a { color: #868484 !important; }

    
        .page-sidebar > ul > li > ul.sub-menu > li > a { color: #868484 !important; }

        .page-sidebar > ul > li > ul.sub-menu > li ul.sub-menu li a:hover {
            background: #f4f4f4 !important;
            color: #868484 !important;
        }

        .page-sidebar.mini > ul > li > a > i { color: #fff; }


        .page-sidebar.mini > ul > li > ul.sub-menu > li > a > i {
            color: #868484 !important;
            ;
        }

        .page-sidebar.mini > ul > li > ul.sub-menu > li > a > span > i {
            color: #868484 !important;
            ;
        }

        .page-sidebar.mini > ul > li > ul.sub-menu > li ul.sub-menu li a i { color: #868484 !important; }

    
        #cover:after {
            background-image: url(@Url.Content("~/Content/images/bg-top.png"));
            content: "";
            display: block;
            height: 180px;
            position: absolute;
            right: 0;
            top: 0;
            width: 597px;
            z-index: 0;
        }

        .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
            background-color: #2cbb0f;
            color: #fff;
        }

        .dtr-data {
            display: block;
            margin-left: 15%;
            margin-top: -20px;
            white-space: normal;
        }

        .iconset { top: 3px; }

        .pagination li {
            display: inline-block;
            padding: 5px;
        }  
    </style>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse ">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation">
            <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display: none">
                <li class="dropdown">
                    <a id="main-menu-toggle" href="#main-menu" class="">
                        <div class="iconset top-menu-toggle-white"></div>
                    </a>
                </li>
            </ul>
            <span class="header-title" style="font-size: 24pt; margin-top: 5px; color: White; display: inline-block;">
                @if(Auth::user()->role == 'user' || Auth::user()->role == '')
                    User Panels
                @endif

                @if(Auth::user()->role == 'admin')
                    Admin Panels
                @endif
            </span>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="header-quick-nav">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="pull-left">
                <ul class="nav quick-section">
                    
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
            <!-- BEGIN CHAT TOGGLER -->
            <div class="pull-right">
                <div class="chat-toggler">
                    <div class="user-details" style="color: White;">
                        <div class="username">
                            @if (Auth::guest())
                            @else
                                Welcome, <span class="bold">{{ Auth::user()->name }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CHAT TOGGLER -->
        </div>
        <!-- END TOP NAVIGATION MENU -->

    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>

<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar" id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
        <div class="user-info-wrapper">
            <div style="border-radius: 0;">
                <img src="{{ asset('img/logonewton-01.png') }}" height="170"/>
            </div>

        </div>
        <!-- END MINI-PROFILE -->

        <!-- BEGIN SIDEBAR MENU -->
        <br/>
        @include('layouts.sidebar')


        <a href="#" class="scrollup">Scroll</a>
        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- BEGIN PAGE CONTAINER-->
        @yield('content')
    <!-- End Content -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- END FOOTER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/breakpoints.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/ekko-lightbox.js') }}" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/jquery-slider/jquery.sidr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/jquery-numberAnimate/jquery.animateNumbers.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('js/raphael-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/pace/pace.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/jquery-block-ui/jqueryblockui.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/jquery-inputmask/jquery.inputmask.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/jquery-autonumeric/autoNumeric.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('plugins/select2/select2.min.js') }}" type="text/javascript"></script> -->

<script src="{{ asset('js/select2/select2.full.min.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('js/select2/components-select2.min.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/bootstrap-tag/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/dropzone/dropzone.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/jquery-morris-chart/js/morris.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script src="{{ asset('js/tabs_accordian.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/messages_notifications.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootbox.min.js') }}" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('js/core.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/chat.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.caret.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.atwho.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<!-- END JAVASCRIPTS -->
</body>
</html>