<?php

namespace App\Models;
use App\Models\Phong;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    use HasFactory;
    protected $fillable = [
        'khoa_ten'
    ];
    protected $table = 'khoa';
}
