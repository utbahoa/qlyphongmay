@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Quản lý thời khóa biểu</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <div class="d-flex justify-content-between">
                    <div>
                        <form action="" method="GET">
                            <div class="search-box d-flex">
                                <div class="form-group">
                                    <label for="phong_id">Tên phòng</label>
                                    <select name="phong_id" id="phong_id" class="form-control">
                                        <option selected value>---Tất cả---</option>
                                        @foreach($phong as $key => $item)
                                        <option value="{{$item->id}}" @if($item->id == request()->phong_id) selected @endif>{{$item->phong_ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ml-2">
                                    <label for="thu">Thứ</label>
                                    <select name="thu" id="thu" class="form-control">
                                        <option selected value>---Tất cả---</option>
                                        @foreach($thoikhoabieu_thu as $key => $item)
                                            <option value="{{$item->thu}}" @if($item->thu == request()->thu) selected @endif>{{$item->thu}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex align-items-end">
                                    <button class="btn btn-primary ml-4 mb-3">Lọc</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-end">
                        <a href="" class="btn btn-primary text-uppercase align-item-end mb-3" title="Thêm">
                            Thêm
                        </a>
                    </div>
                </div>

                <div style="margin-top: 30px;"></div>
                <thead>
                    <tr>
                        
                        <th>Thứ</th>
                        <th>Tên phòng</th>
                        <th>Môn học</th>
                        <th>Tiết</th>
                        <th>Số lượng máy sử dụng</th>
                        <th>Học kỳ</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($thoikhoabieu as $key => $item)
                    <tr>
                        
                        <td>{{$item->thu}}</td>
                        <td>{{$item->phong->phong_ten}}</td>
                        <td>{{$item->monhoc->monhoc_ten}}</td>
                        <td>{{$item->tiet->tiet_ten}}</td>
                        <td>{{$item->soluongmaysudung}}</td>
                        <td>{{$item->hocky->hocky_ten}}</td>
                        <td>
                            <a href="{{route('admin.thoikhoabieu.edit', $item->id)}}" class="btn btn-success text-uppercase" title="Sửa">
                            Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class=" col-sm-12 text-right text-center-xs mt-2">
                <div class="pagination d-flex justify-content-center"> {{$thoikhoabieu->links('paginationlinks')}}</div>
            </div>
        </div>
    </div>
    @endsection