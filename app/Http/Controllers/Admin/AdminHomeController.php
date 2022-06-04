<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function home() {
        $page_title = 'Home';
        return view('admin.dashboard.index', compact('page_title'));
    }
}
