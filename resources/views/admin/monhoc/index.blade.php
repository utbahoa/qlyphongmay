@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Quản lý môn học</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <div class="d-flex justify-content-between">
                    <div>
                        <form action="" method="GET">
                            @csrf
                            <div class="search-box d-flex">                           
                            </div>
                        </form>
                    </div>
                    <a href="{{route('admin.monhoc.create')}}" class="btn btn-primary text-uppercase" title="Thêm">
                       Thêm
                    </a>
                </div>
               
                <div style="margin-top: 30px;"></div>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên môn học</th>                       
                        <th class="col-md-2">Hành động</th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach ($monhoc as $item)               
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->monhoc_ten}}</td>                        
                        <td>
                            <a href="{{route('admin.monhoc.edit', $item->id)}}" class="btn btn-success text-uppercase" title="Sửa">
                            Edit
                            </a>
                            <a href="{{route('admin.monhoc.delete', $item->id)}}" class="btn btn-danger text-uppercase delete" title="Xóa" onclick="return confirm('Bạn có muốn xóa môn học này không?')">
                            Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class=" col-sm-12 text-right text-center-xs mt-2">
                <div class="pagination d-flex justify-content-center"> {{$monhoc->links('paginationlinks')}}</div>
            </div>
    </div>
</div>
@endsection