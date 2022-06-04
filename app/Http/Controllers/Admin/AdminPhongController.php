<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phong;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class AdminPhongController extends Controller
{
    public function index()
    {
        $page_title = 'Quản lý phòng';
        $phong = Phong::orderBy('id', 'asc')->get();
        return view('admin.phong.index', compact('page_title', 'phong'));
    }

    public function create()
    {
        $page_title = 'Thêm phòng';
        return view('admin.phong.add', compact('page_title'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'phong_ten' => 'required',
                'phong_soluong' => 'required',
            ],
            [
                'phong_ten.required' => 'Tên phòng là bắt buộc',
                'phong_soluong.required' => 'Số lượng máy của phòng là bắt buộc',
            ]
        );
        $data = [
            'phong_ten' => $request->phong_ten,
            'phong_soluong' => $request->phong_soluong,
        ];
        //dd($data);
        if (Phong::where('phong_ten', '=', $request->phong_ten)->count() > 0) {
            session()->put('message','Tên phòng này đã tồn tại');
            return redirect()->back();
        }
        Phong::create($data);
        Toastr::success('Cập nhật thông tin thành công', 'Thành công');
        return redirect()->route('admin.phong.index');
    }

    public function edit($id) {
        $page_title = 'Cập nhật phòng';
        $phong = Phong::where('id', $id)->first();
        if($phong) {
            return view('admin.phong.edit', compact('page_title','phong'));
        }
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        Phong::find($id)->update($data);
        Toastr::success('Cập nhật phòng thành công', 'Thành công');
        return redirect()->route('admin.phong.index');
    }

    public function destroy($id) {
        Phong::find($id)->delete();
        Toastr::success('Xóa phòng thành công', 'Thành công');
        return redirect()->route('admin.phong.index');
    }
}
