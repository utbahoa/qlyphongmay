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
                        <th>Thứ</th>  
                        <th>Phòng</th>   
                        <th>Môn học</th>      
                        <th>Tiết </th>   
                        <th>Học kỳ</th>
                    </tr>
                </thead>
                <tbody>  
                @foreach($tkbsv as $key => $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->thu}}</td>
                        <td>{{$item->phong->phong_ten}}</td>
                        <td>{{$item->monhoc->monhoc_ten}}</td>
                        <td>{{$item->tiet->tiet_ten}}</td>
                        <td>{{$item->hocky->hocky_ten}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
@endsection