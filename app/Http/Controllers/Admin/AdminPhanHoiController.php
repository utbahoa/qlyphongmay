<?php

namespace App\Http\Controllers\Admin;
use App\Models\PhanHoi;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdminPhanHoiController extends Controller
{
    public function index()
    {
        $page_title = 'Quản lý phòng';
        $phanhoi = PhanHoi::orderBy('id', 'asc')->with('user')->get();
        return view('admin.phanhoi.index', compact('page_title', 'phanhoi'));
    }
    public function destroy($id) {
        PhanHoi::find($id)->delete();
        Toastr::success('Xóa phản hồi thành công', 'Thành công');
        return redirect()->route('admin.phanhoi.index');
    }
}
