@extends('pages.layout.main')
@section('title','مدیریت تبلیغات')

@section('content')
{{--    <div class="col-lg-3 col-md-4 finish-alert col-md-push-8 col-xs-10 col-xs-push-1 alert alert-success" id="success-alert">--}}
{{--        --}}{{--        <button type="button" class="close" data-dismiss="alert">x</button>--}}
{{--        <strong>انجام شد! </strong><br> تبلیغ با موفقیت در سیستم ثبت شد.--}}
{{--    </div>--}}

    <div class="card">
        <div class="card-body">
            <!-- BEGIN BREADCRUMB -->
            <div class="col-md-12">
                <div class="breadcrumb-box border shadow">
                    <ul class="breadcrumb">
                        <li><a href="{{route('ads')}}">مدیریت تبلیغات</a></li>
                    </ul>
                    <div class="breadcrumb-left">
                        <i class="icon-calendar"></i>
                        {{verta()->formatWord('l')."، ".verta()->format('Y/n/j')}}
                    </div><!-- /.breadcrumb-left -->
                </div><!-- /.breadcrumb-box -->
            </div><!-- /.col-md-12 -->
            <!-- END BREADCRUMB -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="portlet box border shadow">
                    <div class="portlet-heading"  style="border-bottom: none">
                        <ul class="nav nav-tabs nav-tabs-highlight">
                            <li class="nav-item active">
                                <a href="#item-tab1" class="nav-link active" data-toggle="tab">لیست تبلیغات</a>
                            </li>
                            <li class="nav-item"><a href="#item-tab2" class="nav-link" data-toggle="tab">افزودن تبلیغ جدید</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" style="margin-top: 20px">
                            <div class="tab-pane fade active in" id="item-tab1">
                                <livewire:manage-ads.ads-list-component/>
                            </div>
                            <div class="tab-pane fade " id="item-tab2">
                                <livewire:manage-ads.create-ads-component/>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-edit-ads" tabindex="-1" aria-labelledby="modal-edit-ads">
                        <livewire:manage-ads.edit-ads-component/>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        window.addEventListener('show-edit-ads-modal', data => {
            $('#modal-edit-ads').modal('show');
        });
        window.livewire.on('showSuccessAlert',function (message) {
            swal(
            'انجام شد.',
            'تبلیغ با موفقیت در سیستم ثبت شد.',
            'success');
        });
        window.livewire.on('showSuccessEditAlert',function (message) {
            swal(
                'انجام شد.',
                'تبلیغ با موفقیت در سیستم ویرایش شد.',
                'success');
            $('#modal-edit-ads').modal('hide');
        });
        window.livewire.on('showDeleteAlert',function (id) {
            swal({
                title: 'آیا اطمینان دارید؟',
                text: "آیا تمایل دارید تبلیغ انتخاب شده را حذف نمایید؟",
                icon: 'warning',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f44336',
                cancelButtonColor: '#777',
                confirmButtonText: 'بله، حذف شود. ',
                cancelButtonText: 'خیر '
            }).then(function(value) {
                if (value) {
                    window.livewire.emit('deleteAds',id);
                    swal(
                        'انجام شد!',
                        'تبلیغ شما با موفقیت حذف گردید.',
                        'success'
                    ).catch(swal.noop);
                }
            }).catch(swal.noop);
        })

        // window.addEventListener('ads_created', data => {
        //     document.getElementById('success-alert').style.display='block';
        //     $("#success-alert").fadeTo(3000, 500).slideUp(500, function() {
        //         $("#success-alert").slideUp(500);
        //     });
        // });
    </script>
@endpush

