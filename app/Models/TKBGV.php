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

    protected $table = 'tkbgv';
}
