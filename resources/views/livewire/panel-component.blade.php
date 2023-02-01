<div>
    <div class="col-md-12">
        <div class="breadcrumb-box border shadow">
            <ul class="breadcrumb">
                <li><a href="{{url('admin')}}">صفحه اصلی سامانه</a></li>
            </ul>
            <div class="breadcrumb-left">
                <i class="icon-calendar"></i>
                {{verta()->formatWord('l')."، ".verta()->format('Y/n/j')}}
            </div><!-- /.breadcrumb-left -->
        </div><!-- /.breadcrumb-box -->
    </div><!-- /.col-md-12 -->
    <!-- END BREADCRUMB -->
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4 col-xs-6 xxs-full-width">
                <div class="stat-box bg-darkblue shadow">
                    <a href="#">
                        <div class="stat">
                            <div class="counter-down" data-value="1024"><div class="num">{{number_format($ads)}}</div>
                            </div>
                                <div class="h3">تعداد تبلیغات</div>
                        </div><!-- /.stat -->
                        <div class="visual">
                            <i class="icon-docs"></i>
                        </div><!-- /.visual -->
                    </a>
                </div><!-- /.stat-box -->
            </div><!-- /.col-md-3 -->
            <div class="col-md-4 col-xs-6 xxs-full-width">
                <div class="stat-box bg-blue shadow">
                    <a href="#">
                        <div class="stat">
                            <div class="counter-down" data-value="1024"><div class="num">{{number_format($events)}}</div> </div>
                            <div class="h3">تعداد مناسبت ها</div>
                        </div><!-- /.stat -->
                        <div class="visual">
                            <i class="icon-event"></i>
                        </div><!-- /.visual -->
                    </a>
                </div><!-- /.stat-box -->
            </div><!-- /.col-md-3 -->
{{--            <div class="col-md-3 col-xs-6 xxs-full-width">--}}
{{--                <div class="stat-box bg-orange shadow">--}}
{{--                    <a href="#">--}}
{{--                        <div class="stat">--}}
{{--                            <div class="counter-down" data-value="512"><div class="num">{{number_format($download)}}/5</div> </div>--}}
{{--                            <div class="h3">تعداد دانلود</div>--}}
{{--                        </div><!-- /.stat -->--}}
{{--                        <div class="visual">--}}
{{--                              <i class="icon-screen-smartphone"></i>--}}
{{--                        </div><!-- /.visual -->--}}
{{--                    </a>--}}
{{--                </div><!-- /.stat-box -->--}}
{{--            </div><!-- /.col-md-3 -->--}}
            <div class="col-md-4 col-xs-6 xxs-full-width">
                <div class="stat-box bg-red shadow">
                    <a href="#">
                        <div class="stat">
                            <div class="counter-down" data-value="1"><div class="num">{{number_format($usersCount)}}</div> </div>
                            <div class="h3">تعداد کاربران</div>
                        </div><!-- /.stat -->
                        <div class="visual">
                            <i class="icon-user"></i>
                        </div><!-- /.visual -->
                    </a>
                </div><!-- /.stat-box -->
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->
    </div><!-- /.col-md-12 -->
</div>
