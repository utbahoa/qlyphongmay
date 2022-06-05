@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Đăng ký phòng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <form action="{{route('student.computer-register.register')}}" method="POST">
                    @csrf

                    <div class="d-flex register-header">
                        <div class="d-flex flex-column mr-4">
                            <h5 class="text-primary">Tiết học</h5>
                            <select name="tiet_id" id="tiet_id" class="form-control">
                                <option selected disabled>---Chọn tiết học---</option>
                                @foreach($tiet as $key => $item)
                                <option value="{{$item->id}}">{{$item->tiet_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="text-primary">Phần mềm</h5>
                            <select name="phanmem_id" id="phanmem_id" class="form-control">
                                <option selected disabled>----------Chọn phần mềm----------</option>
                                @foreach($phanmem as $key => $item)
                                <option value="{{$item->id}}">{{$item->phanmem_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="user_id" class="user_id" value="{{Auth::id()}}">
                        <input type="hidden" name="quyen" class="quyen" value="{{Auth::user()->quyen_id}}">
                    </div>
                    <div class="d-flex flex-column register-footer mt-3">
                        <h5 class="text-primary">Chọn phòng</h5>
                        <div class="d-flex flex-wrap">
                            @foreach($phong as $key => $item)
                            <div class="col-md-3 mb-3">
                                <div class="card h-100">
                                    <div>
                                        <img class="card-img-top" src="{{asset('admin/img/computer.png')}}">
                                    </div>
                                    <div class="card-content h-100 text-center">
                                        <h5 class="mt-2" style="font-weight: bold">{{$item->phong_ten}}</h5>
                                    </div>
                                    <div class="card-footer text-center">
                                        <input type="checkbox" name="phong_id[]" class="phong_id_{{$item->id}}" value="{{$item->id}}">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success btn-lg">Đăng ký</button>
                    </div>
                </form>
            </table>
        </div>
    </div>
    @endsection