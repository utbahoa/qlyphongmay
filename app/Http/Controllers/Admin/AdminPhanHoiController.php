<?php

namespace App\Http\Controllers\Admin;
use App\Models\PhanHoi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPhanHoiController extends Controller
{
    public function index()
    {
        $page_title = 'Quản lý phòng';
        $phanhoi = PhanHoi::orderBy('id', 'asc')->with('user')->get();
        return view('admin.phanhoi.index', compact('page_title', 'phanhoi'));
    }
}
