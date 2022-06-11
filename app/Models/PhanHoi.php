<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanHoi extends Model
{
    use HasFactory;
    protected $fillable = [
         'user_id', 'phong_ten', 'may_ten', 'phanhoi_noidung','phanhoi_thoigian'
    ];

    protected $table = 'phanhoi';
}
