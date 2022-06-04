<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Phong;
use App\Models\May;
use App\Models\DanhSachDangKy;
use App\Models\ChiTietDangKy;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class AdminDanhSachDangKyController extends Controller
{
    //Sinh viên
    public function index() {
        $page_title = 'Đăng ký sinh viên';
        $user = User::all();
        $danhsach = DanhSachDangKy::join('users', 'users.id', '=', 'danhsachdangky.user_id')
        ->with('tiet', 'phanmem', 'phong')
        ->where('users.quyen_id', '=', 2)->get();
        return view('admin.dangky.sinhvien.index', compact('page_title', 'user', 'danhsach'));
    }

    public function getComputer($id) {
        $page_title = 'Danh sách máy';
        $danhsach = DanhSachDangKy::where('id', $id)->first();
        $danhsach_id = $danhsach->id;
        $phong_id = $danhsach->phong_id;
        $list_computer = May::where('phong_id', $phong_id)->get();
        return view('admin.dangky.sinhvien.list_computer', compact('page_title', 'danhsach', 'danhsach_id', 'phong_id', 'list_computer'));
    }

    public function registerComputer(Request $request) {
        $danhsach_id = $request->danhsach_id;
        $phong_id = $request->phong_id;
        $may_id = $request->may_id;
        $data = [
            'danhsach_id' => $danhsach_id,
            'phong_id' => $phong_id,
            'may_id' => $may_id
        ];
        ChiTietDangKy::create($data);

        $danhsach = DanhSachDangKy::where('id', $danhsach_id)->first();
        // $danhsach_tinhtrang = $danhsach->danhsach_tinhtrang;
        $danhsach->update([
            date_default_timezone_set('Asia/Ho_Chi_Minh'),
            'danhsach_tinhtrang' => 1,
            'danhsach_nguoiduyet' => $request->danhsach_nguoiduyet,
            'danhsach_thoigianduyet' => now()
        ]);

        Toastr::success('Đăng ký thành công', 'Thành công');
        return redirect()->route('admin.dangky.sinhvien.index');

       
    }
}
