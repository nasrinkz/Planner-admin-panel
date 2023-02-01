@extends('pages.layout.main')
@section('title','مدیریت مناسبت ها')

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
                        <li><a href="{{route('ads')}}">مدیریت مناسبت ها</a></li>
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
                                <a href="#item-tab1" class="nav-link active" data-toggle="tab">تمام مناسبت ها</a>
                            </li>
                            <li class="nav-item"><a href="#item-tab3" class="nav-link active" data-toggle="tab">شمسی</a>
                            </li>
                            <li class="nav-item"><a href="#item-tab4" class="nav-link" data-toggle="tab">قمری</a>
                            </li>
                            <li class="nav-item"><a href="#item-tab5" class="nav-link" data-toggle="tab">میلادی</a>
                            </li>
                            <li class="nav-item"><a href="#item-tab2" class="nav-link" data-toggle="tab">افزودن مناسبت جدید</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" style="margin-top: 20px">
                        <div class="tab-pane fade active in" id="item-tab1">
                            <livewire:manage-events.events-list-component/>
                        </div>
                        <div class="tab-pane fade" id="item-tab3">
                            <livewire:manage-events.shamsi-list-component/>
                        </div>
                        <div class="tab-pane fade" id="item-tab4">
                            <livewire:manage-events.ghamari-list-component/>
                        </div>
                        <div class="tab-pane fade" id="item-tab5">
                            <livewire:manage-events.miladi-list-component/>
                        </div>
                        <div class="tab-pane fade" id="item-tab2">
                            <livewire:manage-events.create-event-component/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-edit-event" tabindex="-1" aria-labelledby="modal-edit-event">
                <livewire:manage-events.edit-event-component/>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        window.addEventListener('show-edit-event-modal', data => {
            $('#modal-edit-event').modal('show');
        });
        window.livewire.on('showSuccessAlert',function (message) {
            swal(
                'انجام شد.',
                'مناسبت با موفقیت در سیستم ثبت شد.',
                'success');
        });
        window.livewire.on('showSuccessEditAlert',function (message) {
            swal(
                'انجام شد.',
                'مناسبت با موفقیت در سیستم ویرایش شد.',
                'success');
            $('#modal-edit-event').modal('hide');
        });
        window.livewire.on('showDeleteAlert1',function (id) {
            swal({
                title: 'آیا اطمینان دارید؟',
                text: "آیا تمایل دارید مناسبت انتخاب شده را حذف نمایید؟",
                icon: 'warning',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f44336',
                cancelButtonColor: '#777',
                confirmButtonText: 'بله، حذف شود. ',
                cancelButtonText: 'خیر '
            }).then(function(value) {
                if (value) {
                    window.livewire.emit('deleteEvent1',id);
                    swal(
                        'انجام شد!',
                        'مناسبت شما با موفقیت حذف گردید.',
                        'success'
                    ).catch(swal.noop);
                }
            }).catch(swal.noop);
        })
        window.livewire.on('showDeleteAlert2',function (id) {
            swal({
                title: 'آیا اطمینان دارید؟',
                text: "آیا تمایل دارید مناسبت انتخاب شده را حذف نمایید؟",
                icon: 'warning',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f44336',
                cancelButtonColor: '#777',
                confirmButtonText: 'بله، حذف شود. ',
                cancelButtonText: 'خیر '
            }).then(function(value) {
                if (value) {
                    window.livewire.emit('deleteEvent2',id);
                    swal(
                        'انجام شد!',
                        'مناسبت شما با موفقیت حذف گردید.',
                        'success'
                    ).catch(swal.noop);
                }
            }).catch(swal.noop);
        })
        window.livewire.on('showDeleteAlert3',function (id) {
            swal({
                title: 'آیا اطمینان دارید؟',
                text: "آیا تمایل دارید مناسبت انتخاب شده را حذف نمایید؟",
                icon: 'warning',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f44336',
                cancelButtonColor: '#777',
                confirmButtonText: 'بله، حذف شود. ',
                cancelButtonText: 'خیر '
            }).then(function(value) {
                if (value) {
                    window.livewire.emit('deleteEvent3',id);
                    swal(
                        'انجام شد!',
                        'مناسبت شما با موفقیت حذف گردید.',
                        'success'
                    ).catch(swal.noop);
                }
            }).catch(swal.noop);
        })
        window.livewire.on('showDeleteAlert4',function (id) {
            swal({
                title: 'آیا اطمینان دارید؟',
                text: "آیا تمایل دارید مناسبت انتخاب شده را حذف نمایید؟",
                icon: 'warning',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f44336',
                cancelButtonColor: '#777',
                confirmButtonText: 'بله، حذف شود. ',
                cancelButtonText: 'خیر '
            }).then(function(value) {
                if (value) {
                    window.livewire.emit('deleteEvent4',id);
                    swal(
                        'انجام شد!',
                        'مناسبت شما با موفقیت حذف گردید.',
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

