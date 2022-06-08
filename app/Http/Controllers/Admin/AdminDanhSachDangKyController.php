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
use Carbon\Carbon;

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
        //Lấy ra hàng danh sách của sinh viên dựa trên mã đăng ký
        $danhsach = DanhSachDangKy::with('chitietdangky')->where('id', $id)->first();
        $danhsach_id = $danhsach->id;
        $phong_id = $danhsach->phong_id;
        $tiet_id = $danhsach->tiet_id;


        //Lấy ra tổng số lượng máy của phòng
        $phong = Phong::where('id', $phong_id)->first();
        $tongsoluong = $phong->phong_soluong;

        //Lấy ra số lượng tối đa của ngày, phòng, tiết
        $danhsach_thoigiansd = $danhsach->danhsach_thoigiansd;
        //Chuyển đổi ngày sang thứ
        $ngay_convert = (Carbon::parse($danhsach_thoigiansd)->weekday()) +1;
        $thoikhoabieu =ThoiKhoaBieu::where('thu',  $ngay_convert)
                                    ->where('phong_id',  $phong_id)
                                    ->where('tiet_id', $tiet_id)
                                    ->first();
        $soluongtoida = $thoikhoabieu->soluongmaysudung;
        
        //Lấy ra số lượng đã đăng ký được duyệt ngày, phòng, tiết
        $soluongdadangky= DanhSachDangKy::where('danhsach_thoigiansd',  $danhsach_thoigiansd)
        ->where('tiet_id', $tiet_id)
        ->where('phong_id',  $phong_id)
        ->where('danhsach_tinhtrang', 1)
        ->count();
      
        //Tỉnh tổng số máy còn thể đăng ký
        $soluongconlai =  $tongsoluong - $soluongtoida - $soluongdadangky;

        //Lấy ra máy đã đăng ký của sinh viên
        $chitiet = ChiTietDangKy::where('phong_id', $phong_id)
        ->where('thoigiansd', $danhsach_thoigiansd)
        ->where('tiet_id', $tiet_id)
        ->pluck ('may_id');
        
        //dd($chitiet->toArray());
        
        $maycontrong = [] ;
        for ($i=1; $i <= $tongsoluong - $soluongtoida; $i++ )  {            
            //foreach ($chitiet->toArray() as $item) {
                if(!in_array($i, $chitiet->toArray())) {
                    $maycontrong[]= $i;
                }
                
            //}
        }

       $list_computer = May::where('phong_id', $phong_id)->whereIn('id', $maycontrong)->take($soluongconlai)->get();

        //Lấy ra danh sách máy
      

        return view('admin.dangky.sinhvien.list_computer', compact('page_title', 'danhsach', 'danhsach_id', 'phong_id', 'tiet_id', 'phong',
        'list_computer','tongsoluong', 'danhsach_thoigiansd', 'ngay_convert', 'thoikhoabieu', 'soluongtoida',
        'soluongdadangky', 'soluongconlai', 'chitiet'));
    }

    public function registerComputer(Request $request) {
        //Check chỉ đăng ký một phòng
        //Đây là một mảng
        $check_may = $request->may_id;
        //Đếm mảng nếu > 1 thì báo lỗi
        if(count($check_may) > 1) {
            Toastr::error('Chỉ được chọn một máy cho sinh viên', 'Thất bại');
            return redirect()->back();
        }else{
            // $check_register = ChiTietDangKy::where('phong_id', $phong_check)->where('may_id', $may_check)->count();
            foreach($check_may as $key => $item) {
                $danhsach_id = $request->danhsach_id;
                $phong_id = $request->phong_id;
                $tiet_id = $request->tiet_id;
                $may_after_check_id = $item;
                $thoigiansd = $request->thoigiansd;
                $data = [
                    'danhsach_id' => $danhsach_id,
                    'phong_id' => $phong_id,
                    'tiet_id' => $tiet_id,
                    'may_id' => $may_after_check_id,     
                    'thoigiansd' => $thoigiansd,
                ];
                ChiTietDangKy::create($data);

                //Lấy ra danh sách sinh viên để update cho họ 
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
