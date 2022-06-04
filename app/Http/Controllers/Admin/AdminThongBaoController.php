<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminThongBaoController extends Controller
{
    public function index() {
        $page_title = 'Quản lý thông báo';
        return view('admin.thongbao.index', compact('page_title'));
    }
}
