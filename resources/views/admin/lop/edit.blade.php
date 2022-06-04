@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Cập nhật lớp</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.lop.update', $lop->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="lop_ten">Tên lớp</label>
                <input type="text" class="form-control" name="lop_ten" value="{{$lop->lop_ten}}" >
                <span style="color: red;">
                    @error('lop_ten')
                        {{$message}}
                    @enderror
                </span>
            </div>  
            <div class="form-group">
                <label for="nganh_id">Tên ngành</label>              
                <select name="nganh_id" class="form-control input-sm m-bot15">
                    @foreach($nganh as $key => $item)
                        @if($item->id==$lop->nganh_id)
                            <option selected value="{{$item->id}}">{{$item->nganh_ten}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nganh_ten}}</option>
                        @endif
                    @endforeach
                </select>
            </div>        
            <hr class="mt-2">
            <input type="submit" class="btn btn-info mr-2 mt-2" value="Lưu">
            <a href="{{route('admin.lop.index')}}" class="btn btn-danger mt-2">Quay lại</a>
        </form>
    </div>
</div>
@endsection