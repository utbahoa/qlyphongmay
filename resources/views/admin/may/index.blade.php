@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Quản lý máy</h6>
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
                                <div class="d-flex align-items-end">
                             <button class="btn btn-primary ml-4 mb-3">Lọc</button>
                        </div>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-end">
                    <a href="{{route('admin.may.create')}}" class="btn btn-primary text-uppercase align-item-end mb-3" title="Thêm">
                        Thêm
                    </a>
                        </div>
                   
                </div>

                <div style="margin-top: 30px;"></div>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên máy</th>
                        <th>Tên phòng</th>
                        <th>Tình trạng</th>
                        <th class="col-md-2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($may as $key => $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->may_ten}}</td>
                        <td>{{$item->phong->phong_ten}}</td>
                        <td>
                            @if($item->may_tinhtrang == 1)
                            <a href="{{route('admin.may.blocked', $item->id)}}" class="text-primary">Hoạt động</a>
                            @else
                            <a href="{{route('admin.may.active', $item->id)}}" class="text-danger">Khóa</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.may.delete',$item->id)}}" class="btn btn-danger text-uppercase delete" title="Xóa" onclick="return confirm('Bạn có muốn xóa máy này không?')">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class=" col-sm-12 text-right text-center-xs mt-2">
                <div class="pagination d-flex justify-content-center"> {{$may->links('paginationlinks')}}</div>
            </div>
        </div>
    </div>
    @endsection