@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Cập nhật phần mềm</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.phanmem.update', $phanmem->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="phanmem_ten">Tên Phần Mềm</label>
                <input type="text" class="form-control" name="phanmem_ten" value="{{$phanmem->phanmem_ten}}" >
                <span style="color: red;">
                    @error('phanmem_ten')
                        {{$message}}
                    @enderror
                </span>
            </div>  
            <div class="form-group">
                <label for="phanmem_mota">Mô Tả Phần Mềm</label>
                <input type="text" class="form-control" name="phanmem_mota" value="{{$phanmem->phanmem_mota}}" >
                <span style="color: red;">
                    @error('phanmem_mota')
                        {{$message}}
                    @enderror
                </span>
            </div>        
            <hr class="mt-2">
            <input type="submit" class="btn btn-info mr-2 mt-2" value="Lưu">
            <a href="{{route('admin.phanmem.index')}}" class="btn btn-danger mt-2">Quay lại</a>
        </form>
    </div>
</div>
@endsection