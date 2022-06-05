<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachDangKy extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'tiet_id', 'phanmem_id', 'phong_id', 'danhsach_soluong', 'danhsach_thoigiandk', 'danhsach_tinhtrang',
        'danhsach_nguoiduyet', 'danhsach_thoigianduyet', 'quyen'
    ];

    protected $table = 'danhsachdangky';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tiet()
    {
        return $this->belongsTo(Tiet::class, 'tiet_id', 'id');
    }

    public function phanmem()
    {
        return $this->belongsTo(PhanMem::class, 'phanmem_id', 'id');
    }

    //1-1
    public function phong()
    {
        return $this->belongsTo(Phong::class, 'phong_id', 'id');
    }

    //1-n
    public function chitietdangky()
    {
        return $this->hasMany(ChiTietDangKy::class, 'danhsach_id', 'id');
    }
}
