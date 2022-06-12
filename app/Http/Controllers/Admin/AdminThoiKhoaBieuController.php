<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThoiKhoaBieu;
use Illuminate\Http\Request;

class AdminThoiKhoaBieuController extends Controller
{
    public function index()
    {
        $page_title = 'Quản lý thời khóa biểu';
        $phong = ThoiKhoaBieu::orderBy('id', 'asc')->get();
        return view('admin.thoikhoabieu.index', compact('page_title', 'thoikhoabieu'));
    }
}
