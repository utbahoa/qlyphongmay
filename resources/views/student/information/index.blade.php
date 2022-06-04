@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Thông tin sinh viên</h6>
    </div>
    <div class="card-body">
        <div class="col-lg-12">
            <form action="{{route('student.update_information', $student->id)}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group d-flex align-items-center col-md-6">
                        <label class="col-md-4" style="margin-bottom: 0!important;">Email :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="email" value="{{$student->email}}" disabled>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center col-md-6">
                        <label class="col-md-4" style="margin-bottom: 0!important;">Khoa :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="khoa_id" value="{{$student->lop->nganh->khoa->khoa_ten}}" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group d-flex align-items-center col-md-6">
                        <label class="col-md-4" style="margin-bottom: 0!important;">Ngành :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="nganh_id" value="{{$student->lop->nganh->nganh_ten}}" disabled>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center col-md-6">
                        <label class="col-md-4" style="margin-bottom: 0!important;">Lớp :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="lop_id" value="{{$student->lop->lop_ten}}" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group d-flex align-items-center col-md-6">
                        <label class="col-md-4" style="margin-bottom: 0!important;">Họ và tên :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="{{$student->name}}" disabled>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center col-md-6">
                        <label class="col-md-4" style="margin-bottom: 0!important;">Số điện thoại :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="tel" value="{{$student->tel}}">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group d-flex align-items-center col-md-6">
                        <label class="col-md-4" style="margin-bottom: 0!important;">Giới tính :</label>
                        <div class="col-md-8">
                            <input type=radio name="gender" class="mr-1" value="1" {{ $student->gender == 1 ? 'checked' : ''}}>Nam</option>
                            <input type=radio name="gender" class="mr-1" value="0" {{ $student->gender == 0 ? 'checked' : ''}}>Nữ</option>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center col-md-6">
                        <label class="col-md-4" style="margin-bottom: 0!important;">Ngày sinh :</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="birthday" value="{{ date('Y-m-d', strtotime($student->birthday))}}">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group d-flex align-items-center col-md-6">
                        <label class="col-md-4" style="margin-bottom: 0!important;">Địa chỉ :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address" value="{{$student->address}}">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex align-items-center" style="justify-content: center;">
                    <input type="submit" class="btn btn-info mr-2 mt-2" value="Cập nhật">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection