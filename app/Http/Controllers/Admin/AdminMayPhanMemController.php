<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Phong;
use App\Models\May;
use App\Models\MayPhanMem;
use App\Models\PhanMem;
use Illuminate\Http\Request;

class AdminMayPhanMemController extends Controller
{
    public function index() {
        $page_title = 'Quản lý máy-phần mềm';
        $may = May::all();
        $phanmem= PhanMem::all();
        $may_phanmem = MayPhanMem::orderBy('id', 'asc')->with('may', 'phanmem')->get();
        return view('admin.may_phanmem.index', compact('page_title', 'may_phanmem', 'may', 'phanmem'));      
    }


    public function create(Request $request) {
        $page_title = 'Thêm máy';
        $search = $request->phong_id;
        $may_search = May::where('phong_id', $search)->get();
        return view('admin.may_phanmem.add', compact('page_title', compact('search', ' may_search')));
    }
}

