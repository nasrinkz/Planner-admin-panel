@if (auth()->check())
    <!DOCTYPE html>
    <html lang="{{App::getLocale()}}" dir='rtl'>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>سامانه مدیریتی اپلیکیشن برنامه ریزی</title>
    <head>
        <!-- Global stylesheets -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>سامانه مدیریتی</title>
        <meta name="fontiran.com:license" content="NE29X">
        <!-- BEGIN CSS -->
        <link href="{{asset("assets/css/bootstrap.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/bootstrap-rtl.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/metisMenu.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/simple-line-icons.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/jquery.mCustomScrollbar.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/switchery.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/sweetalert2.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/paper-ripple.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/_all.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/style.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/colors.css")}}" rel="stylesheet">
        <!-- END CSS -->
        <!-- BEGIN PAGE CSS -->
        <link href="{{asset("assets/css/morris.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/kamadatepicker.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/effects.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/font-awesome.min.css")}}" rel="stylesheet">
        @livewireStyles
    </head>

    <body class="active-ripple theme-blue fix-header sidebar-extra">

    <livewire:partials.nav-bar-component/>
    <!-- Page content -->
    <!-- BEGIN WRAPPER -->
    <div id="wrapper">
    @include('pages.partials.sidebar')
    <!-- Main content -->
        <div class="content-wrapper">
            <!-- BEGIN PAGE CONTENT -->
            <div id="page-content">
                <div class="row">
                    <!-- Content area -->
                    <div class="content pt-0">
                        @yield('content')
                    </div>
                    <!-- /content area -->
                </div><!-- /.row -->

            <!-- END PAGE CONTENT -->

            @include('pages.partials.footer')
            </div><!-- /#page-content -->
        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    <!-- BEGIN JS -->
    <script src="{{asset("assets/js/jquery-1.12.4.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery-migrate-1.2.1.min.js")}}"></script>
    <script src="{{asset("assets/js/holder.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/js/metisMenu.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-hover-dropdown.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-hover-dropdown.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.mCustomScrollbar.concat.min.js")}}"></script>
    <script src="{{asset("assets/js/sweetalert2.min.js")}}"></script>
    <script src="{{asset("assets/js/screenfull.min.js")}}"></script>
    <script src="{{asset("assets/js/icheck.min.js")}}"></script>
    <script src="{{asset("assets/js/switchery.js")}}"></script>
    <script src="{{asset("assets/js/core.js")}}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://www.rayanik.com/demo/modiran/assets/js/html5shiv.js"></script>
    <script src="http://www.rayanik.com/demo/modiran/assets/js/respond.min.js"></script>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- END JS -->

    <!-- BEGIN PAGE JAVASCRIPT -->
    <script src="{{asset('assets/js/raphael.min.js')}}"></script>
    <script src="{{asset('assets/js/morris.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.incremental-counter.min.js')}}"></script>
    <script src="{{asset('assets/js/ammap.js')}}"></script>
    <script src="{{asset('assets/js/iranHighFa.js')}}"></script>
    <script src="{{asset('assets/js/kamadatepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/dashboard1.js')}}"></script>
    <!-- END PAGE JAVASCRIPT -->
    {{--  persian datepicker  --}}
{{--    <script type="text/javascript" src="{{asset('datepicker/js/persian-datepicker.js')}}"></script>--}}

    @livewireScripts

    @stack('scripts')
    <!-- /theme JS files -->
    </body>

    <!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/RTL/dark/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jan 2021 15:46:16 GMT -->
    </html>
@else
    <script>window.location = "/login";</script>
@endif
