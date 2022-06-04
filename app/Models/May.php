<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class May extends Model
{
    use HasFactory;
    protected $fillable = [
        'may_ten', 'phong_id','may_tinhtrang'
    ];
    protected $table = 'may';

    public function phong() {
        return $this->belongsTo(Phong::class, 'phong_id', 'id');
    }
}