<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Khoa;
use App\Models\Nganh;
use Brian2694\Toastr\Facades\Toastr;

class AdminNganhController extends Controller
{
    public function index() {
        $page_title = 'Quản lý ngành';
        $khoa = Khoa::all();
        //$nganh = Nganh::orderBy('id', 'asc')->where('khoa', 'khoa.id', '=', 'nganh.khoa_id')->get();
        $nganh = Nganh::orderBy('id', 'asc')->with('khoa')->get();
        return view('admin.nganh.index', compact('page_title', 'khoa', 'nganh'));
    }

    public function create() {
        $page_title = 'Thêm ngành';
        $khoa = Khoa::all();
        //$nganh = Nganh::orderBy('id', 'asc')->where('khoa', 'khoa.id', '=', 'nganh.khoa_id')->get();
        $nganh = Nganh::orderBy('id', 'asc')->with('khoa')->get();
        return view('admin.nganh.add', compact('page_title', 'khoa', 'nganh'));
    }

    public function store(Request $request) {
        $request->validate(
            [
                'nganh_ten' => 'required',  
                'khoa_id' => 'required',             
            ],
            [
                'nganh_ten.required' => 'Tên ngành là bắt buộc',
                'khoa_id.required' =>   'Tên khoa là bắt buộc',
            ]
        );
        $data = $request->all();
        //dd($data);
        Nganh::create($data);
        Toastr::success('Thêm ngành thành công', 'Thành công');
        return redirect()->route('admin.nganh.index');
    }

    public function edit($id) {
        $page_title = 'Cập nhật ngành';
        $khoa = Khoa::all();
        $nganh = Nganh::find($id);
        return view('admin.nganh.edit', compact('page_title', 'khoa', 'nganh'));
    }

    public function update(Request $request, $id) {
        $data = [
            'nganh_ten' => $request->nganh_ten,
            'khoa_id' => $request->khoa_id,
        ];
        Nganh::find($id)->update($data);
        Toastr::success('Cập nhật ngành thành công', 'Thành công');
        return redirect()->route('admin.nganh.index');
    }

    public function destroy($id){
        Nganh::find($id)->delete();
        Toastr::success('Xóa ngành thành công', 'Thành công');
        return redirect()->route('admin.nganh.index');
    }
}
