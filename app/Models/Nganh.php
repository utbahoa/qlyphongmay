<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Khoa;

class Nganh extends Model
{
    use HasFactory;
    protected $fillable = [
        'nganh_ten', 'khoa_id'
    ];
    protected $table = 'nganh';

    public function khoa() {
        return $this->belongsTo(Khoa::class, 'khoa_id', 'id');
    }
}
