<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDangKy extends Model
{
    use HasFactory;

    protected $fillable = [
        'danhsach_id','phong_id', 'may_id', 
    ];

    protected $table = 'chitietdangky';

    public function danhsachdangky() {
        return $this->belongsTo(DanhSachDangKy::class, 'id', 'danhsach_id');
    }

    public function phong() {
        return $this->belongsTo(Phong::class, 'phong_id', 'id');
    }

    public function may() {
        return $this->belongsTo(May::class, 'may_id', 'id');
    }

}
