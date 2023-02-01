<div>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">ویرایش تبلیغ</h4>
                        </div><!-- /.modal-header -->
                        <div class="modal-body">
                            <div class="row">
                                    <div class="portlet box">
                                        <div class="portlet-body min-height-300">
                                            <form role="form" method="post" wire:submit.prevent="submit" type="multipart">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label>عنوان</label>
                                                        <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-pencil"></i>
                                    </span>
                                                            <input type="text" class="form-control" placeholder="عنوان" wire:model.debounce.1500="title">
                                                        </div>
                                                        @error('title')
                                                        <span class="text-danger form-text text-left">
                               {{ $message }}
                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>متن</label>
                                                        <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-note"></i>
                                    </span>
                                                            <textarea class="form-control" wire:model.debounce.150="text"></textarea>
                                                        </div>
                                                        @error('text')
                                                        <span class="text-danger form-text text-left">
                               {{ $message }}
                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>لینک</label>
                                                        <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-link"></i>
                                    </span>
                                                            <input type="text" class="form-control" placeholder="لینک مرتبط" wire:model.debounce.1500="link">
                                                        </div>
                                                        @error('link')
                                                        <span class="text-danger form-text text-left">
                               {{ $message }}
                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>وضعیت</label>
                                                        <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-options-vertical"></i>
                                    </span>
                                                            <select class="form-control" wire:model.debounce.1500="status">
                                                                <option value="1">فعال</option>
                                                                <option value="0">غیرفعال</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group relative">
                                                        <label>آپلود تصویر</label>
                                                        <div class="input-group round">
                                                            <div  class="form-control">
                                                                @if($newImage == null)
                                                                    <span id="imageName">فایل عکسی انتخاب نشده است</span>
                                                                @else
                                                                    <span id="imageName">فایل جدید انتخاب شده است</span>
                                                                @endif
                                                            </div>
                                                            <input type="file" onchange="loadFile(event)" class="file-input" wire:model.debounce.1500="newImage" accept="image/png, image/jpeg, image/jpg">
                                                            <span class="input-group-btn input-group-sm">
                                                    <button type="button" class="btn btn-upload">
                                                        <i class="icon-picture"></i>
                                                        انتخاب تصویر
                                                    </button>
                                                </span>
                                                        </div><!-- /.input-group -->
                                                        @error('image')
                                                        <span class="text-danger form-text text-left">
                               {{ $message }}
                            </span>
                                                        @enderror
                                                    </div><!-- /.form-group -->
                                                    <div>
                            <span class="help-block">
                                فرمتهایی که پشتیابی می شود عبارتند از: png - .jpeg - .jpg.
                            </span>
                                                        <span class="help-block d-block">
                                حداکثر حجم فایل میبایست کمتر از 512 کیلوبایت باشد.
                            </span>
                                                    </div>
                                                    <div>
                                                            @if($newImage!= null)
                                                                <img src="{{ $newImage->temporaryUrl() }}" class="output" width="150" height="150"
                                                                     class="rounded-circle">

                                                            @elseif($image)
                                                                <img src="{{ $image}}" class="output" width="150" height="150"
                                                                     class="rounded-circle">
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-actions m-t-40 text-center">
                                                    @if ($newImage)
                                                        <a wire:click="unselectPhoto()" class="btn btn-warning btn-round">
                                                            <i class="icon-refresh"></i>
                                                            تصویر قبلی
                                                        </a>
                                                        <button type="submit" class="btn btn-info btn-round">
                                                            <i class="icon-check"></i>
                                                            تائید و ذخیره
                                                        </button>
                                                    @else
                                                        <button type="submit" class="btn btn-info btn-round btn-block">
                                                            <i class="icon-check"></i>
                                                            تائید و ذخیره
                                                        </button>
                                                    @endif
                                                </div><!-- /.form-actions -->
                                            </form>
                                        </div><!-- /.portlet-body -->
                                    </div><!-- /.portlet -->
                            </div><!-- /.row -->
                        </div><!-- /.modal-body -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
</div>

