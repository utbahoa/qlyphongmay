<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Phong;
use App\Models\May;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class AdminMayController extends Controller
{
    public function index() {
        $page_title = 'Quản lý máy';
        $phong = Phong::all();
        $may = May::orderBy('id', 'asc')->with('phong')->get();
        return view('admin.may.index', compact('page_title', 'phong', 'may'));      
    }

    public function create(){
        $page_title = 'Thêm máy';
        $phong = Phong::all();
        $may = May::orderBy('id', 'asc')->with('phong')->get();
        return view('admin.may.add', compact('page_title', 'phong', 'may'));  
    }

    public function store(Request $request) {
        $request->validate(
            [
                'may_ten' => 'required',  
                'phong_id' => 'required',           
            ],
            [
                'may_ten.required' => 'Tên máy là bắt buộc',
                'phong_id.required' =>   'Tên phòng là bắt buộc',
            ]
        );
        $data = [
            'may_ten' => $request->may_ten,
            'phong_id' => $request->phong_id,
            'may_tinhtrang' => $request->may_tinhtrang
        ];
        May::create($data);
        Toastr::success('Thêm máy thành công', 'Thành công');
        return redirect()->route('admin.may.index');
    }
}
