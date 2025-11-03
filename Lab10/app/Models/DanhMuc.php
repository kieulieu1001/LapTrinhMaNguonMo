<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = 'danh_mucs';
    
    protected $fillable = ['ten_danh_muc', 'slug', 'mo_ta'];
    
    // Quan hệ một-nhiều với TinTuc
    public function tinTucs()
    {
        return $this->hasMany(TinTuc::class, 'danh_muc_id');
    }
}