<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanMem extends Model
{
    use HasFactory;
    protected $fillable = [
        'phanmem_ten', 'phanmem_mota'
    ];
    protected $table = 'phanmem';
}
