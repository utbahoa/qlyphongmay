@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Quản lý phòng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <div class="d-flex justify-content-between">
                    <div>
                    </div>
                    <a href="{{route('admin.phong.create')}}" class="btn btn-primary text-uppercase" title="Thêm">
                       Thêm
                    </a>
                </div>
               
                <div style="margin-top: 30px;"></div>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên phòng</th>
                        <th>Số lượng máy</th>
                        <th class="col-md-2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($phong as $key => $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->phong_ten}}</td>
                        <td>{{$item->phong_soluong}}</td>
                        <td>
                            <a href="{{route('admin.phong.edit',$item->id)}}" class="btn btn-success text-uppercase" title="Sửa">
                            Edit
                            </a>
                            <a href="{{route('admin.phong.destroy',$item->id)}}" class="btn btn-danger text-uppercase delete" title="Xóa" onclick="return confirm('Bạn có muốn xóa phòng này không?')">
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