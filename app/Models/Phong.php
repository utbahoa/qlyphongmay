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
}
