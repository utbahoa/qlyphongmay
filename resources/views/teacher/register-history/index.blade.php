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
                        <th>Thời gian sử dụng</th>
                        <th>Tình trạng</th>
                        <th>Người duyệt</th>
                        <th>Thời gian duyệt</th>
                        <th>Hành động</th>
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
                        <td>{{date('d/m/Y', strtotime($item->danhsach_thoigiansd));}}</td>     
                        <td>
                        @if($item->danhsach_tinhtrang == 0)
                            <span href="" style="color:red" class="">Đang đợi duyệt</span>
                            @else
                            <span href="" style="color:blue; font-weight:bold" class="text-primary">Đã duyệt</span>
                            @endif
                        </td>
                        <td>
                            @if($item->danhsach_nguoiduyet == NULL)
                            <span href="" style="color:red" class="">Đang đợi duyệt</span>
                            @else
                            {{$item->danhsach_nguoiduyet}}
                                
                            @endif
                        </td>    
                        <td>
                            @if($item->danhsach_thoigianduyet == 0)
                            <span href="" style="color:red" class="">Đang đợi duyệt</span>
                            @else
                            {{date('d/m/Y H:s', strtotime($item->danhsach_thoigianduyet));}}                        
                            @endif
                        </td>    
                        <td>
                            @if($item->danhsach_tinhtrang  == 0 )
                        <a href="{{route('teacher.computer-register.destroy',$item->id)}}" class="btn btn-primary text-uppercase " title="Xóa" onclick="return confirm('Bạn có muốn hủy yêu cầu này không?')">
                                Hủy yêu cầu
                            </a>
                        @else
                            <a href="{{route('teacher.computer-register.register-result', $item->id)}}" class="btn btn-success text-uppercase" title="Xem">
                                Xem chi tiết
                            </a>
                        @endif
                        </td>              
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
            <div class="pagination d-flex justify-content-center"> {{$danhsach->links('paginationlinks')}}</div>
        </div>
    </div>
    @endsection