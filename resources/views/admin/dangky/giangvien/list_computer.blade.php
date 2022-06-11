
@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Đăng ký máy</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <form action="{{route('admin.dangky.giangvien.register_computer')}}" method="POST">
                    @csrf
                    <div class="d-flex flex-column register-footer mt-3">
                        <h6 class="text-danger">{{$phong_ten}}</h6>
                        <h6 class="text-danger">{{$tiet_ten}}</h6>
                        <h6 class="text-danger">Ngày sử dụng: {{date('d/m/Y', strtotime($danhsach_thoigiansd));}}</h6>
                        <h6 class="text-danger">Tổng số lượng máy: {{$tongsoluong}}</h6>
                        <h6 class="text-danger">Tổng số lượng đã sử dụng: {{$soluongtoida}}</h6>
                        <h6 class="text-danger">Tổng số lượng máy hỏng: {{$soluongmayhong}}</h6>
                        <h6 class="text-danger mb-3">Tổng số lượng máy đăng ký đã duyệt: {{$soluongdadangky}}</h6>

                        <input type="hidden" name="danhsach_id" value="{{$danhsach_id}}">
                        <input type="hidden" name="phong_id" value="{{$phong_id}}">
                        <input type="hidden" name="tiet_id" value="{{$tiet_id}}"> 
                        <input type="hidden" name="thoigiansd" value="{{$danhsach_thoigiansd}}">
                        <input type="hidden" name="danhsach_nguoiduyet" value="{{Auth::user()->name}}">
                        <div class="d-flex flex-wrap">
                            @foreach($list_computer as $key => $item)
                            <div class="col-md-2 mb-3">
                                <div class="card h-100">
                                    <div>
                                        <img class="card-img-top" src="{{asset('admin/img/mycomputer.png')}}">
                                    </div>
                                    <div class="card-content h-100 text-center">
                                        <h5 class="mt-2" style="font-weight: bold">{{$item->may_ten}}</h5>
                                    </div>
                                    <div class="card-footer text-center">
                                        <input type="checkbox" name="may_id[]" class="may_id_{{$item->id}}" value="{{$item->id}}">
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