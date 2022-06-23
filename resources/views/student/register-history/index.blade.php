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
                        <th>Tên sinh viên</th>
                        <th>Tiết</th>
                        <th>Phòng</th>
                        <th>Thời gian sử dụng </th>
                        <th>Tình trạng</th>
                        <th>Người duyệt</th>
                        <th>Thời gian duyệt</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhsach as $key => $item)
                    <tr>
                        <td href="" style="font-weight:bold" class="text-error">{{$item->id}}</td>
                        <td href="" style="font-weight:bold" class="text-error">{{$item->user->name}}</td>
                        <td href="" style="font-weight:bold" class="text-error">{{$item->tiet->tiet_ten}}</td>
                        <td href="" style="font-weight:bold" class="text-error">{{$item->phong->phong_ten}}</td>
                        <td href="" style="font-weight:bold" class="text-error">{{date('d/m/Y', strtotime($item->danhsach_thoigiansd));}}</td>
                        <td>
                            @if($item->danhsach_tinhtrang == 0)
                            <span href="" style="color:orange ; font-weight:bold" class="text-error">Đang đợi duyệt</span>
                            @elseif($item->danhsach_tinhtrang == 1)
                            <span href="" style="color:blue; font-weight:bold" class="text-error">Đã được chấp nhận</span>
                            @else
                            <span href="" style="color:red; font-weight:bold" class="text-error">Phòng đã hết máy</span>
                            @endif
                        </td>
                        <td>
                            @if($item->danhsach_nguoiduyet == NULL)
                            <span href="" style="color:orange; font-weight:bold" class="text-error">Đang đợi duyệt</span>
                            @else
                            <span href="" style="font-weight:bold" class="text-error">{{$item->danhsach_nguoiduyet}}</span>
                            @endif
                        </td>
                        <td>
                            @if($item->danhsach_thoigianduyet == 0)
                            <span href="" style="color:orange; font-weight:bold" class="text-error">Đang đợi duyệt</span>
                            @else
                            <span href="" style="font-weight:bold" class="text-error">{{date('d/m/Y H:s', strtotime($item->danhsach_thoigianduyet));}}</span>
                            @endif
                        </td>
                        <td>
                            @if($item->danhsach_tinhtrang == 0 )
                            <a href="{{route('student.computer-register.destroy',$item->id)}}" class="btn btn-primary" title="Xóa" onclick="return confirm('Bạn có muốn hủy yêu cầu này không?')">
                                Hủy yêu cầu
                            </a>
                            @elseif($item->danhsach_tinhtrang == 2 )
                            <a href="{{route('student.computer-register.destroy',$item->id)}}" class="btn btn-primary  " title="Xóa" onclick="return confirm('Bạn có muốn hủy yêu cầu này không?')">
                                Hủy yêu cầu
                            </a>
                            @else
                            <a href="{{route('student.computer-register.register-result', $item->id)}}" class="btn btn-success " title="Xem">
                                Xem chi tiết
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination d-flex justify-content-center"> {{$danhsach->links('paginationlinks')}}</div>
        </div>
    </div>
</div>
@endsection