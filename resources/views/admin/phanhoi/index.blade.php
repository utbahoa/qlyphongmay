@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Xem phản hồi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Người dùng </th>
                        <th>Phòng</th>   
                        <th>Máy</th>
                        <th>Nội dung phản hồi</th> 
                        <th>Ngày phản hồi</th> 
                        <th>Hành động</th> 
                    </tr>
                </thead>
                <tbody>  
                    @foreach($phanhoi as $key => $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->user->name}}</td> 
                        <td>{{$item->phong_ten}}</td> 
                        <td>{{$item->may_ten}}</td>                        
                        <td>{{$item->phanhoi_noidung}}</td> 
                        <td>{{date('d/m/Y', strtotime($item->phanhoi_thoigian))}}</td>
                        <td>
                            <a href="" class="btn btn-danger text-uppercase delete" title="Xóa" onclick="return confirm('Bạn có muốn xóa phòng này không?')">
                            Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
@endsection