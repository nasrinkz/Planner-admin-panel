<div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ویرایش دسته بندی</h4>
            </div><!-- /.modal-header -->
            <div class="modal-body">
                    <div class="portlet box" style="margin-bottom: unset;padding-top: 0">
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
                                </div><!-- /.form-actions -->
                                <div class="form-actions m-t-30">
                                    <button type="submit" class="btn btn-info btn-round btn-block">
                                        <i class="icon-check"></i>
                                        تائید و ذخیره
                                    </button>
                                </div>
                            </form>
                        </div><!-- /.portlet-body -->
                    </div><!-- /.portlet -->
            </div><!-- /.modal-body -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
