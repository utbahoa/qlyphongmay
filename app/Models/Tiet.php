<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiet extends Model
{
    use HasFactory;
    protected $fillable = [
        'tiet_ten', 'tiet_batdau', 'tiet_ketthuc'
    ];

    protected $table = 'tiet';
}
