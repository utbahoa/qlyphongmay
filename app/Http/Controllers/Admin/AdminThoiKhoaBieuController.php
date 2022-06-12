<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThoiKhoaBieu;
use App\Models\Tiet;
use App\Models\MonHoc;
use App\Models\Phong;
use App\Models\HocKy;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;

class AdminThoiKhoaBieuController extends Controller
{
    public function index(Request $request)
    {
        $page_title = 'Quản lý thời khóa biểu';
        $phong = Phong::orderBy('id', 'asc')->get();
        $tiet = Tiet::OrderBy('id', 'asc')->get();
        $monhoc = MonHoc::orderBy('id','asc')->get();
        $thoikhoabieu_thu = ThoiKhoaBieu::select('thu')
        ->groupBy('thu')
        ->orderBy('thu', 'asc')
        ->get();
        $thu = $request->thu;
        $thoikhoabieu = ThoiKhoaBieu::query()
        ->when(isset($request->phong_id), function($query) use ($request) {
            $query->where('phong_id', $request->phong_id);
        })
        ->when(isset($request->thu), function($query) use ($request) {
            $query->where('thu', $request->thu);
        })
        ->orderBy('id', 'asc')
        ->with('monhoc', 'tiet', 'phong')
        ->paginate(12)
        ->withQueryString();;
        return view('admin.thoikhoabieu.index', compact('page_title', 'thoikhoabieu', 'monhoc' , 'tiet', 
        'phong', 'thoikhoabieu_thu', 'thu'));
    }

    public function edit($id) {
        $page_title ='Cập nhật thời khóa biểu';
        $monhoc = MonHoc::orderBy('id', 'asc')->get();
        $hocky = HocKy::orderBy('id', 'asc')->get();

        $thoikhoabieu = ThoiKhoaBieu::find($id);
        // dd($thoikhoabieu);
        return view('admin.thoikhoabieu.edit', compact('page_title', 'thoikhoabieu', 'monhoc', 'hocky'));
    }


    public function update(Request $request, $id) {
        $request->validate(
            [
                'soluongmaysudung' => 'required',               
            ],
            [
                'soluongmaysudung.required' => 'Số lượng máy sử dụng là bắt buộc',
            ]
        );
        $data = $request->all();
        ThoiKhoaBieu::find($id)->update($data);
        Toastr::success('Cập nhật thời khóa biểu thành công', 'Thành công');
        return redirect()->route('admin.thoikhoabieu.index');
    }
}
