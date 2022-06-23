@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Danh sách đăng ký của giảng viên</h6>
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
                        <th>Thời gian sử dụng</th>   
                        <th>Số lượng</th>
                        <th>Tình trạng</th>   
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach($danhsach as $key => $item)  
                    <tr>
                        <td href="" style="font-weight:bold" class="text-error">{{$item->id}}</td>
                        <td href="" style="font-weight:bold" class="text-error">{{$item->user->name ?? 'None'}}</td> 
                        <td href="" style="font-weight:bold" class="text-error">{{$item->tiet->tiet_ten}}</td> 
                        <td href="" style="font-weight:bold" class="text-error">{{$item->phong->phong_ten}}</td>    
                        <td href="" style="font-weight:bold" class="text-error">{{date('d/m/Y', strtotime($item->danhsach_thoigiansd));}}</td>    
                        <td href="" style="font-weight:bold" class="text-error">{{$item->danhsach_soluong}} <span>máy</span></td>     
                        <td>
                            @if($item->danhsach_tinhtrang == 0)
                            <span href="" style="color:orange ; font-weight:bold" class="text-error">Đang đợi duyệt</span>
                            @elseif($item->danhsach_tinhtrang == 1)
                            <span href="" style="color:blue; font-weight:bold" class="text-error">Đã được chấp nhận</span>
                            @else
                            <span href="" style="color:red; font-weight:bold" class="text-error">Không đủ máy</span>
                            @endif
                        </td>
                                        
                        <td>
                            @if($item->danhsach_tinhtrang == 0)
                            <a href="{{route('admin.dangky.giangvien.get_computer', $item->id)}}" class="btn btn-success text-uppercase" title="Duyệt">
                                Duyệt
                            </a>
                            @else
                            <span href="#" style=" font-weight:bold" class="btn btn-danger text-uppercase" title="error">Không đủ máy</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class=" col-sm-12 text-right text-center-xs mt-2">
                <div class="pagination d-flex justify-content-center"> {{$danhsach->links('paginationlinks')}}</div>
            </div>
    </div>
</div>
@endsection