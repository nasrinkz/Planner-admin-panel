<div>
    <!-- BEGIN HEADER -->
    <div class="navbar navbar-fixed-top" id="main-navbar">
        <div class="header-right">
            {{--            <a href="dashboard.html" class="logo-con">--}}
            {{--                <img src="img/logo.png" class="img-responsive center-block" alt="لوگو">--}}
            {{--            </a>--}}
            {{--            <h3 class="text-center" style="margin-top:7%">مدیریت نرم افزار وقتشه</h3>--}}
            مدیریت نرم افزار هنگامه
        </div><!-- /.header-right -->

        <div class="header-left">
            <div class="top-bar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" class="btn" id="toggle-sidebar">
                            <span></span>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                            <img src="{{asset('images/p2.png')}}" style="width: 48px" alt="عکس پرفایل" class="img-circle img-responsive">
                            <span>{{$fullname}}</span>
                            <i class="icon-arrow-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('editProfile')}}">
                                    <i class="icon-note"></i>
                                     ویرایش پروفایل
                                </a>
                            </li>
                            <li>
                                <a href="{{route('editPass')}}">
                                    <i class="icon-key"></i>
                                    تفییر رمز عبور
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{route('logout')}}">
                                    <i class="icon-logout"></i>
                                    خروج
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul><!-- /.navbar-left -->
            </div><!-- /.top-bar -->
        </div><!-- /.header-left -->
    </div><!-- /.navbar -->
    <!-- END HEADER -->
</div>
