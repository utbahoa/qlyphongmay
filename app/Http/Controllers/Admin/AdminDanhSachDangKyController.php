<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Phong;
use App\Models\May;
use App\Models\Tiet;
use App\Models\DanhSachDangKy;
use App\Models\ChiTietDangKy;
use App\Models\ThoiKhoaBieu;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class AdminDanhSachDangKyController extends Controller
{
    //Sinh viên
    public function index() {
        $page_title = 'Đăng ký sinh viên';
        $user = User::all();
        $danhsach = DanhSachDangKy::with( 'user', 'tiet', 'phong')->where('quyen', '=', '2')->get();
        return view('admin.dangky.sinhvien.index', compact('page_title', 'user', 'danhsach'));
    }

    public function getComputer($id) {
        $page_title = 'Danh sách máy';
        $danhsach = DanhSachDangKy::where('id', $id)->first();
        $danhsach_id = $danhsach->id;
        $phong_id = $danhsach->phong_id;
        $tiet_id = $danhsach->tiet_id;
        $ngay= $danhsach->danhsach_thoigiansd;
        $user_id = $danhsach->user_id;

        //Lấy ra số lượng máy cả phòng
        $phong = Phong::where('id', $phong_id)->first();
        $phong_tongsoluong = $phong->phong_soluong;
        $phong_ten = $phong->phong_ten;

        //Lấy ra số máy đăng ký theo lịch đaotao
        $thoikhoabieu = ThoiKhoaBieu::where('phong_id', $phong_id)->where('ngay', $ngay)->where('tiet_id', $tiet_id)->first();
        $soluongmaysudung = $thoikhoabieu->soluongmaysudung;

        //Lấy ra tổng số máy được phép đăng ký
        $soluongduocdangky = $phong_tongsoluong - $soluongmaysudung;

        //Lấy ra danh sách máy
        $list_computer = May::where('phong_id', $phong_id)->take($soluongduocdangky)->get();

        return view('admin.dangky.sinhvien.list_computer', compact('page_title', 'danhsach', 'danhsach_id', 'phong_id', 'tiet_id',  'ngay',
        'list_computer', 'phong', 'phong_tongsoluong', 'phong_ten', 'thoikhoabieu', 'soluongmaysudung'));
    }

    public function registerComputer(Request $request) {
        $phong_check = $request->phong_id;
        $may_check = $request->may_id;  
        $check_register = ChiTietDangKy::where('phong_id', $phong_check)->where('may_id', $may_check)->count();
        if($check_register == 0) {
            $danhsach_id = $request->danhsach_id;
            $phong_id = $request->phong_id;
            $tiet_id = $request->tiet_id;
            $thoigiansd = $request->thoigiansd;
            $may_id = $request->may_id;
            $data = [
                'danhsach_id' => $danhsach_id,
                'phong_id' => $phong_id,
                'tiet_id' => $tiet_id,
                'thoigiansd' => $thoigiansd,
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
        $danhsach = DanhSachDangKy::with('tiet', 'phong')->where('quyen', '=', '3')->get();
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
