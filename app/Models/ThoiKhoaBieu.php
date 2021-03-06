<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThoiKhoaBieu extends Model
{
    use HasFactory;
    protected $fillable = [
        'thu', 'phong_id', 'monhoc_id', 'tiet_id', 'soluongmaysudung','hocky_id'
    ];

    public function phong() {
        return $this->belongsTo(Phong::class, 'phong_id', 'id');
    }

    public function monhoc() {
        return $this->belongsTo(MonHoc::class, 'monhoc_id', 'id');
    }

    public function tiet() {
        return $this->belongsTo(Tiet::class, 'tiet_id', 'id');
    }

    public function hocky() {
        return $this->belongsTo(HocKy::class, 'hocky_id', 'id');
    }

    protected $table = 'thoikhoabieu';
}
