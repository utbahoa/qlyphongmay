@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Cập nhật thời khóa biểu</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.thoikhoabieu.update', $thoikhoabieu->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="phong_soluong">Số lượng máy sử dụng</label>
                <input type="text" class="form-control" name="soluongmaysudung" 
                value="{{$thoikhoabieu->soluongmaysudung}}">
                <span style="color: red;">
                    @error('soluongmaysudung')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="monhoc_id">Chọn môn học</label>              
                <select name="monhoc_id" class="form-control input-sm m-bot15">
                    @foreach($monhoc as $key => $item)
                        @if($item->id==$thoikhoabieu->monhoc_id)
                            <option selected value="{{$item->id}}">{{$item->monhoc_ten}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->monhoc_ten}}</option>
                        @endif
                    @endforeach
                </select>
            </div> 
            <div class="form-group">
                <label for="hocky_id">Chọn học kỳ</label>              
                <select name="hocky_id" class="form-control input-sm m-bot15">
                    @foreach($hocky as $key => $item)
                        @if($item->id==$thoikhoabieu->hocky_id)
                            <option selected value="{{$item->id}}">{{$item->hocky_ten}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->hocky_ten}}</option>
                        @endif
                    @endforeach
                </select>
            </div>  
            <hr class="mt-2">
            <input type="submit" class="btn btn-info mr-2 mt-2" value="Lưu">
            <a href="{{route('admin.thoikhoabieu.index')}}" class="btn btn-danger mt-2">Quay lại</a>
        </form>
    </div>
</div>
@endsection