<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminMayController;
use App\Http\Controllers\Admin\AdminPhongController;
use App\Http\Controllers\Admin\AdminPhanMemController;
use App\Http\Controllers\Admin\AdminMayPhanMemController;
use App\Http\Controllers\Admin\AdminKhoaController;
use App\Http\Controllers\Admin\AdminMonHocController;
use App\Http\Controllers\Admin\AdminLopController;
use App\Http\Controllers\Admin\AdminNganhController;
use App\Http\Controllers\Admin\AdminThongBaoController;
use App\Http\Controllers\Admin\AdminDanhSachDangKyController;



use App\Http\Controllers\Student\StudentHomeController;
use App\Http\Controllers\Teacher\TeacherHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('login', [LoginController::class, 'showFormLogin'])->name('show_login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::namespace('Admin')->group(function () {
    Route::prefix('admin')->group(function () {

        Route::middleware('checkStatus')->group(function () {
            Route::get('home', [AdminHomeController::class, 'home'])->name('admin.home');
            Route::prefix('may')->group(function () {
                Route::get('/', [AdminMayController::class, 'index'])->name('admin.may.index');
                Route::get('/', [AdminMayController::class, 'index'])->name('admin.may.index');
                Route::get('/create', [AdminMayController::class, 'create'])->name('admin.may.create');
                Route::post('/store', [AdminMayController::class, 'store'])->name('admin.may.store');
                Route::get('/edit/{id}', [AdminMayController::class, 'edit'])->name('admin.may.edit');
                Route::post('/update/{id}', [AdminMayController::class, 'update'])->name('admin.may.update');
                Route::get('/delete/{id}', [AdminMayController::class, 'delete'])->name('admin.may.delete');
                Route::get('/blocked/{id}', [AdminMayController::class, 'blocked'])->name('admin.may.blocked');
                Route::get('/active/{id}', [AdminMayController::class, 'active'])->name('admin.may.active');
            });

            Route::prefix('phong')->group(function () {
                Route::get('/', [AdminPhongController::class, 'index'])->name('admin.phong.index');
                Route::get('/create', [AdminPhongController::class, 'create'])->name('admin.phong.create');
                Route::post('/store', [AdminPhongController::class, 'store'])->name('admin.phong.store');
                Route::get('/edit/{id}', [AdminPhongController::class, 'edit'])->name('admin.phong.edit');
                Route::post('/update/{id}', [AdminPhongController::class, 'update'])->name('admin.phong.update');
                Route::get('/delete/{id}', [AdminPhongController::class, 'destroy'])->name('admin.phong.destroy');
            });

            Route::prefix('phanmem')->group(function () {
                Route::get('/', [AdminPhanMemController::class, 'index'])->name('admin.phanmem.index');
                Route::get('/create', [AdminPhanMemController::class, 'create'])->name('admin.phanmem.create');
                Route::post('/store', [AdminPhanMemController::class, 'store'])->name('admin.phanmem.store');
                Route::get('/edit/{id}', [AdminPhanMemController::class, 'edit'])->name('admin.phanmem.edit');
                Route::post('/update/{id}', [AdminPhanMemController::class, 'update'])->name('admin.phanmem.update');
                Route::get('/delete/{id}', [AdminPhanMemController::class, 'destroy'])->name('admin.phanmem.destroy');
            });

            Route::prefix('may_phanmem')->group(function () {
                Route::get('/', [AdminMayPhanMemController::class, 'index'])->name('admin.may_phanmem.index');
                Route::get('/create', [AdminMayPhanMemController::class, 'create'])->name('admin.may_phanmem.create');
                Route::get('/search', [AdminMayPhanMemController::class, 'search'])->name('admin.may_phanmem.search');
                Route::post('/store', [AdminMayPhanMemController::class, 'store'])->name('admin.may_phanmem.store');
                Route::get('/edit/{id}', [AdminMayPhanMemController::class, 'edit'])->name('admin.may_phanmem.edit');
                Route::post('/update/{id}', [AdminMayPhanMemController::class, 'update'])->name('admin.may_phanmem.update');
                Route::get('/delete/{id}', [AdminMayPhanMemController::class, 'destroy'])->name('admin.may_phanmem.destroy');
            });

            Route::prefix('khoa')->group(function () {
                Route::get('/', [AdminKhoaController::class, 'index'])->name('admin.khoa.index');
                Route::get('/create', [AdminKhoaController::class, 'create'])->name('admin.khoa.create');
                Route::post('/store', [AdminKhoaController::class, 'store'])->name('admin.khoa.store');
                Route::get('/edit/{id}', [AdminKhoaController::class, 'edit'])->name('admin.khoa.edit');
                Route::post('/update/{id}', [AdminKhoaController::class, 'update'])->name('admin.khoa.update');
                Route::get('/delete/{id}', [AdminKhoaController::class, 'destroy'])->name('admin.khoa.delete');
            });

            Route::prefix('lop')->group(function () {
                Route::get('/', [AdminLopController::class, 'index'])->name('admin.lop.index');
                Route::get('/create', [AdminLopController::class, 'create'])->name('admin.lop.create');
                Route::post('/store', [AdminLopController::class, 'store'])->name('admin.lop.store');
                Route::get('/edit/{id}', [AdminLopController::class, 'edit'])->name('admin.lop.edit');
                Route::post('/update/{id}', [AdminLopController::class, 'update'])->name('admin.lop.update');
                Route::get('/delete/{id}', [AdminLopController::class, 'delete'])->name('admin.lop.delete');
            });

            Route::prefix('nganh')->group(function () {
                Route::get('/', [AdminNganhController::class, 'index'])->name('admin.nganh.index');
                Route::get('/create', [AdminNganhController::class, 'create'])->name('admin.nganh.create');
                Route::post('/store', [AdminNganhController::class, 'store'])->name('admin.nganh.store');
                Route::get('/edit/{id}', [AdminNganhController::class, 'edit'])->name('admin.nganh.edit');
                Route::post('/update/{id}', [AdminNganhController::class, 'update'])->name('admin.nganh.update');
                Route::get('/delete/{id}', [AdminNganhController::class, 'destroy'])->name('admin.nganh.destroy');
            });

            Route::prefix('monhoc')->group(function () {
                Route::get('/', [AdminMonHocController::class, 'index'])->name('admin.monhoc.index');
                Route::get('/create', [AdminMonHocController::class, 'create'])->name('admin.monhoc.create');
                Route::post('/store', [AdminMonHocController::class, 'store'])->name('admin.monhoc.store');
                Route::get('/edit/{id}', [AdminMonHocController::class, 'edit'])->name('admin.monhoc.edit');
                Route::post('/update/{id}', [AdminMonHocController::class, 'update'])->name('admin.monhoc.update');
                Route::get('/delete/{id}', [AdminMonHocController::class, 'destroy'])->name('admin.monhoc.delete');
            });

            Route::prefix('phanhoi')->group(function () {
                Route::get('/', [AdminPhanHoiController::class, 'index'])->name('admin.phanhoi.index');
            });

            
            Route::prefix('dangky')->group(function () {
                    Route::prefix('sinhvien')->group(function () {
                        Route::get('/', [AdminDanhSachDangKyController::class, 'index'])->name('admin.dangky.sinhvien.index');
                        Route::get('/phong/{id}', [AdminDanhSachDangKyController::class, 'getComputer'])->name('admin.dangky.sinhvien.get_computer');
                        Route::post('/dangkymay', [AdminDanhSachDangKyController::class, 'registerComputer'])->name('admin.dangky.sinhvien.register_computer');
                    });

                    Route::prefix('giangvien')->group(function () {
                        Route::get('/', [AdminDanhSachDangKyController::class, 'index_gv'])->name('admin.dangky.giangvien.index');
                        Route::get('/phong/{id}', [AdminDanhSachDangKyController::class, 'getComputer_gv'])->name('admin.dangky.giangvien.get_computer');
                        Route::post('/dangkymay', [AdminDanhSachDangKyController::class, 'registerComputer_gv'])->name('admin.dangky.giangvien.register_computer');
                    });
                });
            
           
        });
    });
});

Route::namespace('Student')->group(function () {
    Route::prefix('student')->group(function () {

        Route::middleware('checkStatus')->group(function () {
            Route::get('home', [StudentHomeController::class, 'home'])->name('student.home');

            Route::prefix('information')->group(function() {
                Route::get('/', [StudentHomeController::class, 'information'])->name('student.information');
                Route::post('update/{id}', [StudentHomeController::class, 'update'])->name('student.update_information');
            });

            Route::prefix('computer-register')->group(function() {
                Route::get('/', [StudentHomeController::class, 'computerRegister'])->name('student.computer-register.index');
                Route::post('/register', [StudentHomeController::class, 'register'])->name('student.computer-register.register');
                Route::get('/register-history', [StudentHomeController::class, 'registerHistory'])->name('student.computer-register.register-history');
                Route::get('/register-result/{id}', [StudentHomeController::class, 'registerResult'])->name('student.computer-register.register-result');
                Route::get('/register-feedback/{id}', [StudentHomeController::class, 'registerFeedback'])->name('student.computer-register.register-feedback');
                Route::post('/store-feedback', [StudentHomeController::class, 'storeFeedback'])->name('student.computer-register.store-feedback');
            });
        });
    });
});

Route::namespace('Teacher')->group(function () {
    Route::prefix('teacher')->group(function () {

        Route::middleware('checkStatus')->group(function () {
            Route::get('home', [TeacherHomeController::class, 'teacherHome'])->name('teacher.home');

            Route::prefix('information')->group(function() {
                Route::get('/', [TeacherHomeController::class, 'information'])->name('teacher.information');
                Route::post('update/{id}', [TeacherHomeController::class, 'update'])->name('teacher.update_information');
            });    

            Route::prefix('computer-register')->group(function() {
                Route::get('/', [TeacherHomeController::class, 'computerRegister'])->name('teacher.computer-register.index');
                Route::post('/register', [TeacherHomeController::class, 'register'])->name('teacher.computer-register.register');
                Route::get('/register-history', [TeacherHomeController::class, 'registerHistory'])->name('teacher.computer-register.register-history');
                Route::get('/register-result/{id}', [TeacherHomeController::class, 'registerResult'])->name('teacher.computer-register.register-result');
            });
        });
    });
});