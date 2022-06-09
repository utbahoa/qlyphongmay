@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Kết quả đăng ký của sinh viên</h6>
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
                    </tr>
                </thead>
                <tbody>  
                    @foreach($chitiet as $key => $item)
                    <tr>
                        <td>{{$item->danhsach_id}}</td>
                        <td>{{date('d/m/Y', strtotime($item->thoigiansd))}}</td>
                        <td>{{$item->phong->phong_ten}}</td>    
                        <td>{{$item->may->may_ten}}</td>   
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
@endsection