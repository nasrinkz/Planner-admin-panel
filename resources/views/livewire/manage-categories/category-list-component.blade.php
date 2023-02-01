<div>
    <div class="total-paginate clearfix">
        @if($categories->total()>0)
            @if($page==1)
                @php($start_num=1)
            @else
                @php($start_num=(($page-1)*$paginate_num)+1)
            @endif
            @if($page*$paginate_num>=$categories->total())
                @php($end_num=$categories->total())
            @else
                @php($end_num=$page*$paginate_num)
            @endif
            {{'نمایش '.$start_num.' تا '.$end_num. '، از '.$categories->total().' رکورد'}}
        @endif
    </div>
    <div>
        @if($categories->total()>0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>آیتم</th>
                        <th>عنوان</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=0)
                    @foreach($categories as $data)
                        <tr>
                            <td>
                                {{$start_num}}
                            </td>
                            <td>
                                {{$data->title}}
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
            {{$categories->links()}}
        </div>
    </div>
</div>
