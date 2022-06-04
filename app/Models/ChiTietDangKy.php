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
}
