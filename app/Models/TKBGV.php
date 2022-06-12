<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TKBGV extends Model
{
    use HasFactory;
    protected $fillable = [
        'thu','user_id', 'phong_id', 'monhoc_id', 'tiet_id','hocky_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

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
    protected $table = 'tkbgv';
}
