@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Kết quả đăng ký của giảng viên</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày</th>
                        <th>Phòng</th>   
                        <th>Máy</th>   
                        <th>Phản hồi</th>  
                    </tr>
                </thead>
                <tbody>  
                    @foreach($chitiet as $key => $item)
                    <tr>
                        <td>{{$item->danhsach_id}}</td>
                        <td>{{date('d/m/Y', strtotime($item->thoigiansd))}}</td>
                        <td>{{$item->phong->phong_ten}}</td>    
                        <td>{{$item->may->may_ten}}</td>  
                        <td> 
                        @if($item->thoigiansd  < date('Y-m-d'))
                            <a href="{{route('teacher.computer-register.register-feedback', $item->danhsach_id)}}" class="btn btn-success text-uppercase" title="gui">
                                Gửi phản hồi
                            </a>
                        @else
                        <a href="#" class="btn btn-danger text-uppercase" title="gui">
                                Gửi phản hồi
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