<?php

namespace App\Http\Controllers;

use App\Models\May;
use App\Models\MayPhanMem;
use App\Models\PhanMem;
use Illuminate\Http\Request;

class AdminMayPhanMemController extends Controller
{
    public function index() {
        $page_title = 'Quản lý máy-phần mềm';
        $may = May::all();
        $phanmem = PhanMem::all();
        $may_phanmem = MayPhanMem::with('may','phanmem')->get();
        return view('admin.may_phanmem.index', compact('page_title', 'may', 'phanmem','may_phanmem'));      
    }
    
}

