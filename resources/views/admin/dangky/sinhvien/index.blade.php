@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Danh sách đăng ký của sinh viên</h6>
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
                        <th>Thời gian sử dụng</th>   
                        <th>Tình trạng</th>   
                        <th>Người duyệt</th>
                        <th>Thời gian duyệt</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach($danhsach as $key => $item)  
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->user->name ?? 'None'}}</td> 
                        <td>{{$item->tiet->tiet_ten}}</td> 
                        <td>{{$item->phong->phong_ten}}</td>    
                        <td>{{date('d/m/Y', strtotime($item->danhsach_thoigiansd));}}</td>      
                        <td>
                            @if($item->danhsach_tinhtrang == 0)
                                <p class="text-primary"> Chưa duyệt</p>
                            @else
                                <p class="text-danger"> Đã duyệt</p>
                            @endif
                        </td>
                        <td>
                            @if($item->danhsach_nguoiduyet == NULL)
                                 <p class="text-primary"> Chưa duyệt</p>
                            @else
                                {{$item->danhsach_nguoiduyet}}
                            @endif
                        </td>    
                        <td>
                            @if($item->danhsach_thoigianduyet == 0)
                                <p class="text-primary"> Chưa duyệt</p>
                            @else
                                {{$item->danhsach_thoigianduyet}}
                            @endif
                        </td>                       
                        <td>
                            @if($item->danhsach_tinhtrang == 0)
                            <a href="{{route('admin.dangky.sinhvien.get_computer', $item->id)}}" class="btn btn-success text-uppercase" title="Sửa">
                                Duyệt
                            </a>
                            @else
                            <a href="#" class="btn btn-danger text-uppercase" title="Sửa">
                                Đã duyệt
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
@endsection