<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DanhSachDangKy;
use App\Models\Phong;

class AdminHomeController extends Controller
{
    public function home() {
        $page_title = 'Home';
        DB::statement("SET SQL_MODE=''");
        //Thống kê số lượng đăng ký của mỗi phòng
        $total_register = DanhSachDangKy::select(
            'phong.phong_ten',
            DB::raw('COUNT(danhsachdangky.phong_id) AS total_register')
        )
        ->join('phong', 'phong.id', '=', 'danhsachdangky.phong_id')
        ->groupBy('danhsachdangky.phong_id')
        ->get();
        $data = "";
        foreach($total_register as $val) {
            $data.="['".$val->phong_ten."', ".$val->total_register."],";
        }
        $chartData = $data;
        // dd($data);
        return view('admin.dashboard.index', compact('page_title', 'total_register', 'chartData'));
    }
}
