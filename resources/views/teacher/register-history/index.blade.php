@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Lịch sử đăng ký</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên giảng viên</th>
                        <th>Tiết</th>
                        <th>Phòng</th>
                        <th>Số lượng máy</th>
                        <th>Thời gian đăng ký</th>
                        <th>Tình trạng</th>
                        <th>Người duyệt</th>
                        <th>Thời gian duyệt</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                    @foreach($danhsach as $key => $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->user->name}}</td>    
                        <td>{{$item->tiet->tiet_ten}}</td>   
                        <td>{{$item->phong->phong_ten}}</td>
                        <td>{{$item->danhsach_soluong}}</td>
                        <td>{{date('d/m/Y', strtotime($item->danhsach_thoigiandk));}}</td>    
                        <td>
                            @if($item->danhsach_tinhtrang == 0)
                                Chưa duyệt
                            @else
                                Đã duyệt
                            @endif
                        </td>
                        <td>
                            @if($item->danhsach_nguoiduyet == NULL)
                                Chưa có người duyệt
                            @else
                                {{$item->danhsach_nguoiduyet}}
                            @endif
                        </td>    
                        <td>
                            @if($item->danhsach_thoigianduyet == 0)
                                Chưa duyệt
                            @else
                                {{$item->danhsach_thoigianduyet}}
                            @endif
                        </td>                  
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endsection