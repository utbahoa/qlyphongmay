<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MayPhanMem extends Model
{
    use HasFactory;
    protected $fillable = [
        'may_id', 'phanmem_id'
    ];

    protected $table = 'may_phanmem';


    public function phanmem() {
        return $this->belongsTo(PhanMem::class, 'phanmem_id', 'id');
    }

    public function may() {
        return $this->belongsTo(May::class, 'may_id', 'id');
    }
}
