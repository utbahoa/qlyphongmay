<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PhanHoi;
use App\Http\Controllers\User;
use Illuminate\Http\Request;

class AdminPhanHoiController extends Controller
{
    public function index() {
        $page_title = 'Xem phản hồi';
        return view('admin.phanhoi.index', compact('page_title'));        
    }
}
