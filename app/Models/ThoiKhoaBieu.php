<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThoiKhoaBieu extends Model
{
    use HasFactory;
    protected $fillable = [
        'ngay', 'phong_id', 'monhoc_id', 'tiet_id', 'soluongmaysudung'
    ];

    protected $table = 'thoikhoabieu';
}
