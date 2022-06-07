<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class LoginController extends Controller
{
    public function showFormLogin() {
        if(Auth::check()) {
            return redirect()->back();
        }
        return view('login.index');
    }

    public function login(Request $request) {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email sai định dạng',
                'password.required' => 'Vui lòng nhập mật khẩu',
            ]
        );
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]) && Auth::user()->quyen_id == 1) {
            Toastr::success('Đăng nhập thành công', 'Thành công');
            return redirect()->route('admin.home');
        }else if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]) && Auth::user()->quyen_id == 2){
            Toastr::success('Đăng nhập thành công', 'Thành công');
            return redirect()->route('student.home');
        }else if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]) && Auth::user()->quyen_id == 3){
            Toastr::success('Đăng nhập thành công', 'Thành công');
            return redirect()->route('teacher.home');
        }
        //Đăng nhập thất bại
        Auth::logout();
        Toastr::error('Sai email hoặc mật khẩu', 'Thất bại');
        return redirect()->back();
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
