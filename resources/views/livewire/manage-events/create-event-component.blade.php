<div>
    <div class="col-lg-6 col-md-6 col-md-push-3 col-xs-12">
        <div class="portlet box border shadow">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <h3 class="title">
                        اطلاعات مناسبت
                    </h3>
                </div><!-- /.portlet-title -->
            </div><!-- /.portlet-heading -->
            <div class="portlet-body min-height-300">
                <form role="form" method="post" wire:submit.prevent="submit" type="multipart">
                    <div class="form-body">
                        <div class="form-group">
                            <label>نوع مناسبت</label>
                            <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-event"></i>
                                    </span>
                                <select class="form-control" wire:model.debounce.1500="typeId">
                                    <option value="2" selected>شمسی</option>
                                    <option value="3">قمری</option>
                                    <option value="1">میلادی</option>
                                </select>
                            </div>
                            @error('typeId')
                            <span class="text-danger form-text text-left">
                               {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>دسته بندی</label>
                            <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-grid"></i>
                                    </span>
                                <select class="form-control" wire:model.debounce.1500="categoryId">
                                    <option value="">یک مورد را انتخاب کنید</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('categoryId')
                            <span class="text-danger form-text text-left">
                               {{ $message }}
                            </span>
                            @enderror
                        </div>
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
                                <textarea class="form-control" wire:model.debounce.1500="event"></textarea>
                            </div>
                            @error('event')
                            <span class="text-danger form-text text-left">
                               {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>تاریخ مناسبت</label>
                            <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-calendar"></i>
                                    </span>
                                <input type="text" placeholder="(روز/ماه) برای مثال: 01/26 یا 12/01" id="date" class="form-control" wire:model.debounce.1500="date">
                            </div>
                            <div class="help-block">فرمت: روز/ماه (برای مثال: 01/26 یا 12/01)
                            </div>
                            @error('date')
                            <span class="text-danger form-text text-left">
                               {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>مناسبت رسمی جهانی</label>
                            <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-options-vertical"></i>
                                    </span>
                                <select class="form-control" wire:model.debounce.1500="show">
                                    <option value="1">هست</option>
                                    <option value="0" selected>نیست</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>تعطیلی</label>
                            <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-options-vertical"></i>
                                    </span>
                                <select class="form-control" wire:model.debounce.1500="status">
                                    <option value="1">هست</option>
                                    <option value="0" selected>نیست</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions m-t-40">
                        <button type="submit" class="btn btn-info btn-round btn-block">
                            <i class="icon-check"></i>
                            تائید و ذخیره
                        </button>
                    </div><!-- /.form-actions -->
                </form>
                <script>
                    var date = document.getElementById('date');
                    function checkValue(str, max) {
                        if (str.charAt(0) !== '0' || str == '00') {
                            var num = parseInt(str);
                            if (isNaN(num) || num <= 0 || num > max) num = 1;
                            str = num > parseInt(max.toString().charAt(0)) && num.toString().length == 1 ? '0' + num : num.toString();
                        };
                        return str;
                    };

                    date.addEventListener('input', function(e) {
                        this.type = 'text';
                        var input = this.value;
                        if (/\D\/$/.test(input)) input = input.substr(0, input.length - 3);
                        var values = input.split('/').map(function(v) {
                            return v.replace(/\D/g, '')
                        });
                        if (values[0]) values[0] =checkValue(values[0], 31);
                        if (values[1]) values[1] =checkValue(values[1], 12);
                        var output = values.map(function(v, i) {
                            return v.length == 2 && i < 2 ? v + ' / ' : v;
                        });
                        this.value = output.join('').substr(0, 7);
                    });
                </script>
            </div><!-- /.portlet-body -->
        </div><!-- /.portlet -->
    </div><!-- /.col-lg-4 -->
</div>

