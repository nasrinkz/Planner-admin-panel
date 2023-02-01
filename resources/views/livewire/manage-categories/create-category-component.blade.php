<div>
    <div class="col-lg-6 col-md-6 col-md-push-3 col-xs-12">
        <div class="portlet box border shadow">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <h3 class="title">
                        اطلاعات دسته بندی
                    </h3>
                </div><!-- /.portlet-title -->
            </div><!-- /.portlet-heading -->
            <div class="portlet-body min-height-100">
                <form role="form" method="post" wire:submit.prevent="submit" type="multipart">
                    <div class="form-body">
                        <div class="form-group">
                            <label>عنوان</label>
                            <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-pencil"></i>
                                    </span>
                                <input type="text" class="form-control" placeholder="عنوان دسته بندی" wire:model.debounce.1500="title">
                            </div>
                            @error('title')
                            <span class="text-danger form-text text-left">
                               {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-actions m-t-30">
                        <button type="submit" class="btn btn-info btn-round btn-block">
                            <i class="icon-check"></i>
                            تائید و ذخیره
                        </button>
                    </div><!-- /.form-actions -->
                </form>
            </div><!-- /.portlet-body -->
        </div><!-- /.portlet -->
    </div><!-- /.col-lg-4 -->
</div>

