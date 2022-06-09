<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    use HasFactory;
    protected $fillable = [
        'phong_ten', 'phong_soluong'
    ];

    protected $table = 'phong';

    public function thoikhoabieu() {
        return $this->hasMany(ThoiKhoaBieu::class, 'phong_id');
    }

    public function dangky() {
        return $this->hasMany(DanhSachDangKy::class, 'phong_id');
    }

    public function may() {
        return $this->hasMany(May::class, 'phong_id');
    }
}
