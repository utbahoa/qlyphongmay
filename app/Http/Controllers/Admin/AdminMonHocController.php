<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MonHoc;
use Brian2694\Toastr\Facades\Toastr;

class AdminMonHocController extends Controller
{
    public function index() {
        $page_title = 'Quản Lý Môn Học';
        $monhoc = monhoc::OrderBy('id', 'asc')->get();
        return view('admin.monhoc.index', compact('page_title','monhoc'));
        
    }

    public function create() {
        $page_title = 'Thêm môn học';
        return view('admin.monhoc.add', compact('page_title'));
    }
    
    public function store(Request $request) {
        $request->validate(
            [
                'monhoc_ten' => 'required',               
            ],
            [
                'monhoc.required' => 'Tên môn học là bắt buộc',
            ]
        );
        $data = $request->all();
        //dd($data);
        monhoc::create($data);
        Toastr::success('Thêm môn học thành công', 'Thành công');
        return redirect()->route('admin.monhoc.index');
    }
    public function edit($id) {
        $page_title ='Cập nhật môn học';
        // Lấy ra môn học theo id
        $monhoc = monhoc::find($id);
        //dd($monhoc);
        return view('admin.monhoc.edit', compact('page_title', 'monhoc'));
    }

    public function update(Request $request,$id){
        $data = $request->all();
        monhoc::find($id)->update($data);
        Toastr::success('Cập nhật môn học thành công', 'Thành công');
        return redirect()->route('admin.monhoc.index');
    }
    public function destroy($id) {
        monhoc::find($id)->delete();
        Toastr::success('Xóa môn học thành công', 'Thành công');
        return redirect()->route('admin.monhoc.index');
    }

}
