@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Thêm ngành</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.nganh.store')}}" method="POST">
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
                <label for="nganh_ten">Tên ngành</label>
                <input type="text" class="form-control" name="nganh_ten" placeholder="Nhập tên ngành ...">
                <span style="color: red;">
                    @error('nganh_ten')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="khoa_id">Tên khoa</label>
               <select name="khoa_id" id="khoa_id" class="form-control">
                   <option selected disabled>---Chọn khoa---</option>
                    @foreach($khoa as $key => $item)
                        <option value="{{$item->id}}">{{$item->khoa_ten}}</option>
                    @endforeach
               </select>
               <span style="color: red;">
                    @error('khoa_id')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <hr class="mt-2">
            <input type="submit" class="btn btn-info mr-2 mt-2" value="Thêm">
            <a href="{{route('admin.nganh.index')}}" class="btn btn-danger mt-2">Quay lại</a>
        </form>
    </div>
</div>
@endsection