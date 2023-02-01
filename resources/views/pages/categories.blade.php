@extends('pages.layout.main')
@section('title','مدیریت دسته بندی ها')

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- BEGIN BREADCRUMB -->
            <div class="col-md-12">
                <div class="breadcrumb-box border shadow">
                    <ul class="breadcrumb">
                        <li><a href="{{route('categories')}}">مدیریت دسته بندی</a></li>
                    </ul>
                    <div class="breadcrumb-left">
                        <i class="icon-calendar"></i>
                        {{verta()->formatWord('l')."، ".verta()->format('Y/n/j')}}
                    </div><!-- /.breadcrumb-left -->
                </div><!-- /.breadcrumb-box -->
            </div><!-- /.col-md-12 -->
            <!-- END BREADCRUMB -->
            <div class="col-lg-10 col-md-10 col-md-push-1 col-xs-12">
                <div class="portlet box border shadow">
                    <div class="portlet-heading"  style="border-bottom: none">
                        <ul class="nav nav-tabs nav-tabs-highlight">
                            <li class="nav-item active">
                                <a href="#item-tab1" class="nav-link active" data-toggle="tab">لیست دسته بندی ها</a>
                            </li>
                            <li class="nav-item"><a href="#item-tab2" class="nav-link" data-toggle="tab">افزودن دسته بندی جدید</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" style="margin-top: 20px">
                        <div class="tab-pane fade active in" id="item-tab1">
                            <livewire:manage-categories.category-list-component/>
                        </div>
                        <div class="tab-pane fade " id="item-tab2">
                            <livewire:manage-categories.create-category-component/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-edit-category" tabindex="-1" aria-labelledby="modal-edit-category">
                <livewire:manage-categories.edit-category-component/>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        window.addEventListener('show-edit-category-modal', data => {
            $('#modal-edit-category').modal('show');
        });
        window.livewire.on('showSuccessAlert',function (message) {
            swal(
                'انجام شد.',
                'دسته بندی با موفقیت در سیستم ثبت شد.',
                'success');
        });
        window.livewire.on('showSuccessEditAlert',function (message) {
            swal(
                'انجام شد.',
                'دسته بندی با موفقیت در سیستم ویرایش شد.',
                'success');
            $('#modal-edit-category').modal('hide');
        });
        window.livewire.on('showDeleteAlert',function (id) {
            swal({
                title: 'آیا اطمینان دارید؟',
                text: "آیا تمایل دارید دسته بندی انتخاب شده را حذف نمایید؟",
                icon: 'warning',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f44336',
                cancelButtonColor: '#777',
                confirmButtonText: 'بله، حذف شود. ',
                cancelButtonText: 'خیر '
            }).then(function(value) {
                if (value) {
                    window.livewire.emit('deleteCategory',id);
                    swal(
                        'انجام شد!',
                        'دسته بندی شما با موفقیت حذف گردید.',
                        'success'
                    ).catch(swal.noop);
                }
            }).catch(swal.noop);
        })
    </script>
@endpush

