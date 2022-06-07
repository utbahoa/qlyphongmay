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
                    <div>
                        <form action="" method="GET">
                            @csrf
                            <div class="search-box d-flex">                        
                            </div>
                        </form>
                    </div>
                    <a href="" class="btn btn-primary text-uppercase" title="Thêm">
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