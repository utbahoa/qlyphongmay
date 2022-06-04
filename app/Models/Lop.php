<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nganh;

class Lop extends Model
{
    use HasFactory;
    protected $fillable = [
        'lop_ten', 'nganh_id'
    ];
    protected $table = 'lop';

    public function nganh() {
        return $this->belongsTo(Nganh::class, 'nganh_id', 'id');
    }
}
