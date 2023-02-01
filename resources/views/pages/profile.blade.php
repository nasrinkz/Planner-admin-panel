@extends('pages.layout.main')
@section('title','ویرایش پروفایل ادمین')

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- BEGIN BREADCRUMB -->
            <div class="col-md-12">
                <div class="breadcrumb-box border shadow">
                    <ul class="breadcrumb">
                        <li><a href="{{route('editProfile')}}">ویرایش پروفایل</a></li>
                    </ul>
                    <div class="breadcrumb-left">
                        <i class="icon-calendar"></i>
                        {{verta()->formatWord('l')."، ".verta()->format('Y/n/j')}}
                    </div><!-- /.breadcrumb-left -->
                </div><!-- /.breadcrumb-box -->
            </div><!-- /.col-md-12 -->
            <!-- END BREADCRUMB -->
            <livewire:manage-profile.edit-profile-component/>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        window.livewire.on('showSuccessAlert',function (message) {
            swal(
                'انجام شد.',
                'ویرایش اطلاعات با موفقیت در سیستم انجام شد.',
                'success');
        });
    </script>
@endpush

