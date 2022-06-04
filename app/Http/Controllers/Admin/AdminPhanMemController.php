<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhanMem;
use Brian2694\Toastr\Facades\Toastr;
class AdminPhanMemController extends Controller
{
    public function index() {
        $page_title ='Quản Lý Phần Mềm';
        $phanmem = PhanMem::OrderBy('id','asc')->get();
        return view('admin.phanmem.index', compact('page_title','phanmem'));
    }

    public function create() {
        $page_title = 'Thêm Phần Mềm';
        return view('admin.phanmem.add', compact('page_title'));
    }
    
    public function store(Request $request) {
        $request->validate(
            [
                'phanmem_ten' => 'required', 
                'phanmem_mota' => 'required',              
            ],
            [
                'phanmem_ten.required' => 'Tên phần mềm là bắt buộc',
                'phanmem_mota.required' => 'Mô tả phần mềm là bắt buộc',
            ]
        );
        $data = [
            'phanmem_ten' => $request->phanmem_ten,
            'phanmem_mota' => $request->phanmem_mota,
        ];
        PhanMem::create($data);
        Toastr::success('Thêm phần mềm thành công', 'Thành công');
        return redirect()->route('admin.phanmem.index');
    }

    public function edit($id) {
        $page_title = "Cập nhật phần mềm";
        $phanmem = PhanMem::find($id);
        return view('admin.phanmem.edit', compact('page_title', 'phanmem'));
    }

    public function update(Request $request,$id) {
        $data = [
            'phanmem_ten' => $request->phanmem_ten,
            'phanmem_mota' => $request->phanmem_mota,
        ];
        PhanMem::find($id)->update($data);
        Toastr::success('Cập nhật phần mềm thành công', 'Thành công');
        return redirect()->route('admin.phanmem.index');
    }
    public function destroy($id){
        PhanMem::find($id)->delete();
        Toastr::success('Xóa phần mềm thành công', 'Thành công');
        return redirect()->route('admin.phanmem.index');
    }
}
