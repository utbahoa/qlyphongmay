<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Khoa;
use App\Models\Nganh;
use App\Models\Lop;
use App\Models\PhanMem;
use App\Models\Tiet;
use App\Models\Phong;
use App\Models\DanhSachDangKy;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TeacherHomeController extends Controller
{
    public function teacherHome() {
        $page_title = 'Home';
        return view('teacher.dashboard.index', compact('page_title'));
    }

    public function information() {
        $page_title = 'Thông tin giảng viên';
        $teacher_id = Auth::user()->id;
        $khoa = Khoa::orderBy('id', 'asc')->get();
        $nganh = Nganh::with('khoa')->orderBy('id', 'asc')->get();
        $teacher = User::where('id', $teacher_id)->with('nganh')->first();
        //dd($teacher);
        return view('teacher.information.index', compact('page_title', 'teacher', 'nganh', 'khoa'));
    }
    
    public function update($id, Request $request) {
        $data = $request->all();
        User::find($id)->update($data);
        Toastr::success('Cập nhật thông tin thành công', 'Thành công');
        return redirect()->route('teacher.information');
    }

    public function computerRegister() {
        $page_title = 'Đăng ký máy trực tuyến';
        $tiet = Tiet::orderBy('id', 'asc')->get();
        $phanmem = PhanMem::orderBy('id', 'asc')->get();
        $phong = Phong::orderBy('id', 'asc')->get();
        return view('teacher.computer-register.index', compact('page_title', 'tiet', 'phanmem', 'phong'));
    }

    public function register(Request $request) {
        $check_phong = $request->phong_id;
        if(count($check_phong) > 1) {
            Toastr::error('Giảng viên chỉ được đăng ký một phòng', 'Thất bại');
            return redirect()->back();
        }
        else {
            foreach($check_phong as $key => $item) {
               $phong_check_id = $item;
               $user_id = $request->user_id;
               $tiet_id = $request->tiet_id;
               $phanmem_id = $request->phanmem_id;
               $danhsach_soluong = $request->danhsach_soluong;
               $danhsach_thoigiandk = now();
               $danhsach_tinhtrang = 0;
               $data = [
                   date_default_timezone_set('Asia/Ho_Chi_Minh'),
                   'user_id' => $user_id,
                   'tiet_id' => $tiet_id,
                   'phanmem_id' => $phanmem_id,
                   'phong_id' => $phong_check_id,
                   'danhsach_soluong' => $danhsach_soluong,
                   'danhsach_thoigiandk' =>  $danhsach_thoigiandk,
                   'danhsach_tinhtrang' =>  $danhsach_tinhtrang
               ];
               $check_user = DanhSachDangKy::where('user_id', $user_id)->where('tiet_id', $tiet_id)->where('phong_id', $phong_check_id)->count();
               if($check_user == 0) {
                   DanhSachDangKy::create($data);
                   Toastr::success('Đăng ký thành công', 'Thành công');
                   return redirect()->route('teacher.computer-register.index');
               }else{
                   Toastr::error('Giảng viên đã đăng ký', 'Thất bại');
                   return redirect()->back();
               }
            }
        } 
    }

}
