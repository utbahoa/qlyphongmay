<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Phong;
use App\Models\May;
use App\Models\Tiet;
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
<<<<<<< HEAD
        $danhsach = DanhSachDangKy::with('tiet', 'phanmem', 'phong')->get();
=======
        $danhsach = DanhSachDangKy::with( 'user', 'tiet', 'phanmem', 'phong')->where('quyen', '=', '2')->get();
>>>>>>> 35cd1f2cfb269b995b391fb00cae66aea4194fe9
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
        $phong_check = $request->phong_id;
        $may_check = $request->may_id;  
        $check_register = ChiTietDangKy::where('phong_id', $phong_check)->where('may_id', $may_check)->count();
        if($check_register == 0) {
            $danhsach_id = $request->danhsach_id;
            $phong_id = $request->phong_id;
            $may_id = $request->may_id;
            $data = [
                'danhsach_id' => $danhsach_id,
                'phong_id' => $phong_id,
                'may_id' => $may_id,            
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
        else {
            Toastr::error('Máy đã đăng ký', 'Thất bại');
            return redirect()->back();
        }

      
       
    }


    //Giảng viên
    public function index_gv() {
        $page_title = 'Đăng ký giảng viên';
        $user = User::all();
        $danhsach = DanhSachDangKy::with('tiet', 'phanmem', 'phong')->where('quyen', '=', '3')->get();
        return view('admin.dangky.giangvien.index', compact('page_title', 'user', 'danhsach'));
    }

    public function getComputer_gv($id) {
        $page_title = 'Danh sách máy';
        $danhsach = DanhSachDangKy::where('id', $id)->first();
        //Lấy danhsach_id, phong_id đăng ký gởi sang trang chi tiết
        $danhsach_id = $danhsach->id;
        $phong_id = $danhsach->phong_id;
        $list_computer = May::where('phong_id', $phong_id)->get();
        return view('admin.dangky.giangvien.list_computer', compact('page_title', 'danhsach', 'danhsach_id', 'phong_id', 'list_computer'));
    }

    public function registerComputer_gv(Request $request) {
        $may_id_array = $request->may_id;
        foreach($may_id_array as $key => $item) {
            $danhsach_id = $request->danhsach_id;
            $phong_id = $request->phong_id;
            $may_id_item = $item;
            $data = [
                'danhsach_id' => $danhsach_id,
                'phong_id' => $phong_id,
                'may_id' => $may_id_item
            ];
            ChiTietDangKy::create($data);
        }
        $ds_id = $request->danhsach_id;
        $danhsach = DanhSachDangKy::where('id', $ds_id)->first();
        // $danhsach_tinhtrang = $danhsach->danhsach_tinhtrang;
        $danhsach->update([
            date_default_timezone_set('Asia/Ho_Chi_Minh'),
            'danhsach_tinhtrang' => 1,
            'danhsach_nguoiduyet' => $request->danhsach_nguoiduyet,
            'danhsach_thoigianduyet' => now()
        ]);
        Toastr::success('Đăng ký thành công', 'Thành công');
        return redirect()->route('admin.dangky.giangvien.index');
    }
}
