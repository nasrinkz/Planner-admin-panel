<!-- BEGIN SIDEBAR -->
<div id="sidebar">
    <div class="sidebar-top">
    </div><!-- /.sidebar-top -->

    <div class="side-menu-container">
        <ul class="metismenu" id="side-menu">
            <li class="open active conditional-bg">
                <a href="{{route('main')}}" class="nav-link {{Request::segment(2)  == '' ?  'current'   : null}} ">
                    <i class="icon-home"></i>
                    <span>داشبورد</span>
                </a>
            </li>
            <li class="open active conditional-bg">
                <a href="{{route('ads')}}" class="nav-link {{Request::segment(2)  == 'ads' ?  'current'   : null}} ">
                    <i class="icon-docs"></i>
                    <span>تبلیغات</span>
                </a>
            </li>
{{--            <li class="open active conditional-bg">--}}
{{--                <a href="{{route('sentences')}}" class="nav-link {{Request::segment(2)  == 'sentences' ?  'current'   : null}} ">--}}
{{--                    <i class="icon-home"></i>--}}
{{--                    <span>جملات</span>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="open active conditional-bg">
                <a href="{{route('categories')}}" class="nav-link {{Request::segment(2)  == 'categories' ?  'current'   : null}} ">
                    <i class="icon-grid"></i>
                    <span>دسته بندی</span>
                </a>
            </li>
            <li class="open active conditional-bg">
                <a href="{{route('events')}}" class="nav-link {{Request::segment(2)  == 'events' ?  'current'   : null}} ">
                    <i class="icon-event"></i>
                    <span>مناسبت ها</span>
                </a>
            </li>
            <li class="">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-info"></i>
                    <span>اطلاعات پایه</span>
                </a>
                <ul>
                    <li>
                        <a href="" class="nav-link {{Request::segment(2)  == 'provinces' ?  'current'   : null}} ">
                            <i class="icon-city"></i>
                            <span>استان</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="nav-link {{Request::segment(2)  == 'cities' ?  'current'   : null}} ">
                            <i class="icon-us"></i>
                            <span>شهر</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul><!-- /#side-menu -->
    </div><!-- /.side-menu-container -->
</div><!-- /#sidebar -->
<!-- END SIDEBAR -->
