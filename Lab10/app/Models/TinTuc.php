<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = 'tin_tucs';
    
    protected $fillable = [
        'danh_muc_id', 
        'tieude', 
        'tomtat', 
        'noidung', 
        'hinhanh', 
        'ngaydang'
    ];
    
    // Quan hệ nhiều-một với DanhMuc
    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'danh_muc_id');
    }
}