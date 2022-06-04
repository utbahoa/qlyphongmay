@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Cập nhật ngành</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.nganh.update', $nganh->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nganh_ten">Tên Ngành</label>
                <input type="text" class="form-control" name="nganh_ten" value="{{$nganh->nganh_ten}}" >
                <span style="color: red;">
                    @error('nganh_ten')
                        {{$message}}
                    @enderror
                </span>
            </div>  
            <div class="form-group">
                <label for="khoa_id">Tên khoa</label>              
                <select name="khoa_id" class="form-control input-sm m-bot15">
                    @foreach($khoa as $key => $item)
                        @if($item->id==$nganh->khoa_id)
                            <option selected value="{{$item->id}}">{{$item->khoa_ten}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->khoa_ten}}</option>
                        @endif
                    @endforeach
                </select>
            </div>        
            <hr class="mt-2">
            <input type="submit" class="btn btn-info mr-2 mt-2" value="Lưu">
            <a href="{{route('admin.nganh.index')}}" class="btn btn-danger mt-2">Quay lại</a>
        </form>
    </div>
</div>
@endsection