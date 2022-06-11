<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDangKy;
use App\Models\User;
use App\Models\Khoa;
use App\Models\Nganh;
use App\Models\May;
use App\Models\Lop;
use App\Models\Tiet;
use App\Models\TKBGV;
use App\Models\Phong;
use App\Models\DanhSachDangKy;
use App\Models\ThoiKhoaBieu;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TeacherHomeController extends Controller
{
    public function teacherHome()
    {
        $page_title = 'Home';
        return view('teacher.dashboard.index', compact('page_title'));
    }

    public function information()
    {
        $page_title = 'Thông tin giảng viên';
        $teacher_id = Auth::user()->id;
        $khoa = Khoa::orderBy('id', 'asc')->get();
        $nganh = Nganh::with('khoa')->orderBy('id', 'asc')->get();
        $teacher = User::where('id', $teacher_id)->with('nganh')->first();
        //dd($teacher);
        return view('teacher.information.index', compact('page_title', 'teacher', 'nganh', 'khoa'));
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        User::find($id)->update($data);
        Toastr::success('Cập nhật thông tin thành công', 'Thành công');
        return redirect()->route('teacher.information');
    }

    public function computerRegister(Request $request)
    {
        $page_title = 'Đăng ký máy trực tuyến';
        $tiet = Tiet::orderBy('id', 'asc')->get();
        $phong = [];
        if ($request->danhsach_thoigiansd > now() && $request->tiet_id && $request->danhsach_soluong) {
            $phong = Phong::orderBy('id', 'asc')
            ->withSum(['dangky as dangky_count' => function ($query) use ($request) {
                $query->where('danhsach_tinhtrang', 1)
                    ->whereDate('danhsach_thoigiansd', $request->danhsach_thoigiansd)
                    ->where('tiet_id', $request->tiet_id);
            }],'danhsach_soluong')
            ->withCount(['may' => function ($query) use ($request) {
                $query->where('may_tinhtrang', 1);
            }])
            ->with(['thoikhoabieu' => function($query) use ($request) {
                $thu = Carbon::parse($request->danhsach_thoigiansd)->weekday() + 1;
                $query->where('tiet_id', $request->tiet_id)
                ->where('thu', $thu);
            }])->get();
        }
        $student_id = Auth::user()->id;
        $thoikhoabieu = ThoiKhoaBieu::all();
        return view('teacher.computer-register.index', compact('page_title', 'tiet', 'phong', 'thoikhoabieu'));
    }

    public function register(Request $request)
    {
        $check_phong = $request->phong_id;
        if (is_null($request->tiet_id) || is_null($request->danhsach_thoigiansd) || is_null($request->danhsach_soluong) || is_null($check_phong)) {
            Toastr::error('Chưa chọn đủ thông tin', 'Thất bại');
            return redirect()->back();
        }

        //Check số phòng lớn hơn 1
        if (count($check_phong) > 1) {
            Toastr::error('Giảng viên chỉ được đăng ký một phòng', 'Thất bại');
            return redirect()->back();
        } else {
            foreach ($check_phong as $key => $item) {
                $phong_after_check_id = $item;
                $tiet_id = $request->tiet_id;
                $user_id = auth()->id();
                $danhsach_thoigiansd = $request->danhsach_thoigiansd;
                $danhsach_soluong = $request->danhsach_soluong;
                $danhsach_tinhtrang = 0;
                $quyen = $request->quyen;

                $data = [
                    date_default_timezone_set('Asia/Ho_Chi_Minh'),
                    'user_id' => $user_id,
                    'tiet_id' => $tiet_id,
                    'phong_id' => $phong_after_check_id,
                    'danhsach_soluong' => $danhsach_soluong,
                    'danhsach_thoigiansd' =>  $danhsach_thoigiansd,
                    'danhsach_tinhtrang' =>  $danhsach_tinhtrang,
                    'quyen' => $quyen
                ];
                //check lịch dạy giảng viên
                $thu_convert = (Carbon::parse($danhsach_thoigiansd)->weekday()) + 1;
                $thoikhoabieu_gv = TKBGV::where('thu', $thu_convert)
                ->where('tiet_id', $tiet_id)
                //->where('phong_id',  $phong_after_check_id)
                ->count();
                if($thoikhoabieu_gv > 0) {
                    Toastr::error('Trùng lịch dạy của bạn', 'Thất bại');
                    return redirect()->back();
                }

                //Check sinh giảng đã đăng ký chưa 
                $user_id =  Auth::user()->id;
                $check_dangky = DanhSachDangKy::where('danhsach_thoigiansd',  $danhsach_thoigiansd)
                    ->where('tiet_id', $tiet_id)
                    //->where('phong_id',  $phong_after_check_id)
                    ->where('user_id', $user_id)
                    ->count();
                if ($check_dangky == 0) {
                    //Chuyển ngày sang thứ
                    $ngay_convert = (Carbon::parse($danhsach_thoigiansd)->weekday()) + 1;

                    //Lấy ra số lượng tối đa từ thười khóa biểu
                    $thoikhoabieu = ThoiKhoaBieu::where('thu', $ngay_convert)
                        ->where('phong_id', $phong_after_check_id)
                        ->where('tiet_id', $tiet_id)
                        ->first();
                    $soluongtoida = $thoikhoabieu->soluongmaysudung;

                    //Lấy ra số lượng đã đăng ký
                    $soluongdadangky = DanhSachDangKy::where('danhsach_thoigiansd',  $danhsach_thoigiansd)
                        ->where('tiet_id', $tiet_id)
                        ->where('phong_id',  $phong_after_check_id)
                        ->where('danhsach_tinhtrang', 1)
                        ->sum('danhsach_soluong');

                    //Tìm tổng số lượng máy của phòng theo phong_id
                    $phong = Phong::where('id', $phong_after_check_id)->first();
                    $tongsoluongmay = $phong->phong_soluong;

                    //Tìm tổng số máy bị hỏng của phòng đó
                    $soluongmayhong = May::where('phong_id', $phong_after_check_id)->where('may_tinhtrang', 0)->count();

                    //Tính tổng số máy còn lại của phòng, tiết, ngày đó
                    $soluongconlai = $tongsoluongmay - $soluongtoida - $soluongdadangky - $soluongmayhong;
                    //dd($soluongconlai);

                    //Check xem sinh viên đăng ký phòng được ko dựa trên số máy còn lại
                    if ($soluongconlai == 0) {
                        Toastr::error('Đã hết máy', 'Thất bại');
                        return redirect()->back();
                    } else {
                        DanhSachDangKy::create($data);
                        Toastr::success('Đăng ký thành công', 'Thành công');
                        return redirect()->route('teacher.computer-register.index');
                    }
                } else {
                    Toastr::error('Đã đăng ký', 'Thất bại');
                    return redirect()->back();
                }
            }
        }
    }

    public function registerHistory()
    {
        $page_title = 'Lịch sử đăng ký';
        $user_id =  Auth::user()->id;
        $user = User::all();
        $tiet = Tiet::all();
        $phong = Phong::all();
        $danhsach = DanhSachDangKy::with('user', 'tiet', 'phong')->where('user_id', $user_id)->get();
        return view('teacher.register-history.index', compact('page_title', 'user', 'tiet', 'phong', 'danhsach'));
    }

    public function registerResult($id)
    {
        $page_title = 'Xem kết quả';
        $chitiet = ChiTietDangKy::with('danhsachdangky', 'phong')->where('danhsach_id', $id)->get();
        return view('teacher.register-result.index', compact('page_title', 'chitiet'));
    }
}
