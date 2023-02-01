<div class="col-lg-4 col-md-6 col-md-push-4 col-xs-12">
    <div class="portlet box border shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">
                    اطلاعات کاربری
                </h3>
            </div><!-- /.portlet-title -->
            <div class="buttons-box">
                <div class="code-modal hide">
                    <form role="form">
                        <div class="form-body">
                            <div class="form-group">
                                <label>نام</label>
                                <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-user"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="نام">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>نام خانوادگی</label>
                                <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-user"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="نام خانوادگی">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>نام کاربری</label>
                                <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-emotsmile"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="نام کاربری">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions m-t-40">
                            <button type="button" class="btn btn-info btn-round btn-block">
                                <i class="icon-check"></i>
                                تائید و ذخیره
                            </button>
                        </div>
                    </form>
                </div>
                <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                    <i class="icon-arrow-up"></i>
                </a>
            </div><!-- /.buttons-box -->
        </div><!-- /.portlet-heading -->
        <div class="portlet-body min-height-300">
            <form role="form" method="post" wire:submit.prevent="submit">
                <div class="form-body">
                    <div class="form-group">
                        <label>نام</label>
                        <div class="input-group round">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" wire:model.debounce.1500="name" class="form-control" placeholder="نام">
                        </div><!-- /.input-group -->
                        @error('name')
                        <span class="text-danger form-text text-left">
                               {{ $message }}
                            </span>
                        @enderror
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>نام خانوادگی</label>
                        <div class="input-group round">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text"  wire:model.debounce.1500="family" class="form-control" placeholder="نام خانوادگی">
                        </div><!-- /.input-group -->
                        @error('family')
                        <span class="text-danger form-text text-left">
                               {{ $message }}
                            </span>
                        @enderror
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>نام کاربری</label>
                        <div class="input-group round">
                            <span class="input-group-addon">
                                <i class="icon-emotsmile"></i>
                            </span>
                            <input type="text" wire:model.debounce.1500="userName" class="form-control" placeholder="نام کاربری">
                        </div><!-- /.input-group -->
                        @error('userName')
                        <span class="text-danger form-text text-left">
                               {{ $message }}
                            </span>
                        @enderror
                    </div><!-- /.form-group -->
                </div><!-- /.form-body -->
                <div class="form-actions m-t-40">
                    <button type="submit" class="btn btn-info btn-round btn-block">
                        <i class="icon-check"></i>
                        تائید و ذخیره
                    </button>
                </div><!-- /.form-actions -->
            </form>
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-4 -->

