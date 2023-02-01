<div>
    <div class="total-paginate clearfix">
        @if($ads->total()>0)
            @if($page==1)
                @php($start_num=1)
            @else
                @php($start_num=(($page-1)*$paginate_num)+1)
            @endif
            @if($page*$paginate_num>=$ads->total())
                @php($end_num=$ads->total())
            @else
                @php($end_num=$page*$paginate_num)
            @endif
            {{'نمایش '.$start_num.' تا '.$end_num. '، از '.$ads->total().' رکورد'}}
        @endif
    </div>
    <div>
        @if($ads->total()>0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>آیتم</th>
                    <th>عنوان</th>
                    <th>متن</th>
                    <th>لینک</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @php($i=0)
                @foreach($ads as $data)
                    <tr>
                        <td>
                            {{$start_num}}
                        </td>
                        <td>
                            {{$data->title}}
                        </td>
                        <td>
                            {{mb_convert_encoding(substr($data->text, 0, 10), 'UTF-8', 'UTF-8')}}
                            ...
{{--                            {{htmlentities(substr($data->text, 0, 10), ENT_QUOTES, "UTF-8")}}--}}
                        </td>
                        <td>
                            {{$data->link}}
                        </td>
                        <td>
                            @if($data->status == 1)
                                <button wire:click="changeStatus({{$data->id}})" class="btn btn-success">فعال</button>
                            @else
                                <button wire:click="changeStatus({{$data->id}})" class="btn btn-danger">غیرفعال</button>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a wire:click="$emit('showDeleteAlert',{{$data->id}})" class="actionBtn" title="حذف"><i class="icon-trash"></i></a>
                                    <a  wire:click="update({{$data->id}})" class="actionBtn" title="ویرایش"><i class="icon-note"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @php($start_num++)
                @endforeach
                </tbody>
            </table>
        </div>
        @else
            موردی برای نمایش وجود ندارد.
        @endif
            <div class="custom-paginate clearfix">
                {{$ads->links()}}
            </div>
    </div>
</div>
