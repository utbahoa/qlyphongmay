@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Phản hồi</h6>
    </div>
    <div class="card-body">
        <form action="{{route('teacher.computer-register.store-feedback')}}" method="POST">
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
            <input type="hidden" name="phong_ten" value="{{$phong_ten}}">
            <input type="hidden" name="may_ten" value="{{$may_ten}}">
            <div class="form-group d-flex flex-column">
                <label for="may_ten">Nội dung phản hồi</label>
                <textarea name="phanhoi_noidung" id="" rows="5" class="form-control"></textarea>
                <span style="color: red;">
                    @error('phanhoi_noidung')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <hr class="mt-2">
            <input type="submit" class="btn btn-info mr-2 mt-2" value="Gửi">
            <a href="{{route('teacher.computer-register.register-history')}}" class="btn btn-danger mt-2">Quay lại</a>
        </form>
    </div>
</div>
@endsection