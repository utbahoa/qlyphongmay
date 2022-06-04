@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Thêm máy</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.may.store')}}" method="POST">
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
                <label for="may_ten">Tên máy</label>
                <input type="text" class="form-control" name="may_ten" placeholder="Nhập tên máy ...">
                <span style="color: red;">
                    @error('may_ten')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="phong_id">Tên phòng</label>
               <select name="phong_id" id="phong_id" class="form-control">
                   <option selected disabled>---Chọn Phòng---</option>
                    @foreach($phong as $key => $item)
                        <option value="{{$item->id}}">{{$item->phong_ten}}</option>
                    @endforeach
               </select>
               <span style="color: red;">
                    @error('phong_id')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <input type="hidden" name="may_tinhtrang" value="1">
            <hr class="mt-2">
            <input type="submit" class="btn btn-info mr-2 mt-2" value="Thêm">
            <a href="{{route('admin.lop.index')}}" class="btn btn-danger mt-2">Quay lại</a>
        </form>
    </div>
</div>
@endsection