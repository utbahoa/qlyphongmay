@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Cập nhật môn học</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.monhoc.update', $monhoc->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="monhoc_ten">Tên Môn Học</label>
                <input type="text" class="form-control" name="monhoc_ten" value="{{$monhoc->monhoc_ten}}" >
                <span style="color: red;">
                    @error('monhoc_ten')
                        {{$message}}
                    @enderror
                </span>
            </div>          
            <hr class="mt-2">
            <input type="submit" class="btn btn-info mr-2 mt-2" value="Lưu">
            <a href="{{route('admin.monhoc.index')}}" class="btn btn-danger mt-2">Quay lại</a>
        </form>
    </div>
</div>
@endsection