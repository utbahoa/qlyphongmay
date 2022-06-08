@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Quản lý Máy-Phần mềm</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <div class="d-flex justify-content-between">
                    
                    <a href="{{route('admin.may_phanmem.create')}}" class="btn btn-primary text-uppercase" title="Thêm">
                       Thêm
                    </a>
                </div>
               
                <div style="margin-top: 30px;"></div>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên máy</th>
                        <th>Tên phần mềm </th>
                        <th class="col-md-2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>
    </div>
</div>
@endsection