<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    use HasFactory;
    protected $fillable = [
        'ngay', 'user_id', 'phong_ten', 'tiet_ten', 'thongbao_ten','thongbao_thoigian','thongbao_tinhtrang'
    ];

    protected $table = 'thongbao';
}
