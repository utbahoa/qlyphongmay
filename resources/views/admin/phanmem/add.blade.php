@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Thêm phần mềm</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.phanmem.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <?php
                $message =  session()->get('message');
                if ($message) {
                    echo '<p class="alert alert-danger mt-2" id="alert-box">' . $message . '</p>';
                    session()->put('message', null);
                }
                ?>
            </div>
            <div class="form-group">
                <label for="phanmem_ten">Tên phần mềm</label>
                <input type="text" class="form-control" name="phanmem_ten" placeholder="Nhập tên phần mềm ...">
                <span style="color: red;">
                    @error('phanmem_ten')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="phanmem_mota">Tên mô tả</label>
                <input type="text" class="form-control" name="phanmem_mota" placeholder="Nhập mô tả phần mềm ...">
                <span style="color: red;">
                    @error('phanmem_mota')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <hr class="mt-2">
            <input type="submit" class="btn btn-info mr-2 mt-2" value="Thêm">
            <a href="{{route('admin.phanmem.index')}}" class="btn btn-danger mt-2">Quay lại</a>
        </form>
    </div>
</div>
@endsection