<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Khoa;
use Brian2694\Toastr\Facades\Toastr;

class AdminKhoaController extends Controller
{
    public function index() {
        $page_title = 'Quản Lý Khoa';
        $khoa = Khoa::OrderBy('id', 'asc')->get();
        return view('admin.khoa.index', compact('page_title','khoa'));
        
    }

    public function create() {
        $page_title = 'Thêm khoa';
        return view('admin.khoa.add', compact('page_title'));
    }
    
    public function store(Request $request) {
        $request->validate(
            [
                'khoa_ten' => 'required',               
            ],
            [
                'khoa_ten.required' => 'Tên khoa là bắt buộc',
            ]
        );
        $data = $request->all();
        //dd($data);
        Khoa::create($data);
        Toastr::success('Thêm khoa thành công', 'Thành công');
        return redirect()->route('admin.khoa.index');
    }
    public function edit($id) {
        $page_title ='Cập nhật khoa';
        // Lấy ra khoa theo id
        $khoa = Khoa::find($id);
        //dd($khoa);
        return view('admin.khoa.edit', compact('page_title', 'khoa'));
    }

    public function update(Request $request,$id){
        $data = $request->all();
        Khoa::find($id)->update($data);
        Toastr::success('Cập nhật khoa thành công', 'Thành công');
        return redirect()->route('admin.khoa.index');
    }
    public function destroy($id) {
        Khoa::find($id)->delete();
        Toastr::success('Xóa khoa thành công', 'Thành công');
        return redirect()->route('admin.khoa.index');
    }

}
