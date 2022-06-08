@extends('admin.home')
@section('page_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Thêm máy</h6>
    </div>

    <div class="card-body">
        <div>
            <form action="{{route('admin.may_phanmem.search')}}" method="GET">
                @csrf
                <div class="filter-box d-flex align-items-center">
                    <h5 class="text-primary mr-2 mb-0">Chọn phòng</h5>
                    <select name="phong_id" id="phong_id" class="form-control col-md-2">
                        <option selected disabled>-Chọn phòng- </option>
                        @foreach($phong as $key => $item)
                            <option value="{{$item->id}}">{{$item->phong_ten}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary ml-2">Lọc</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection