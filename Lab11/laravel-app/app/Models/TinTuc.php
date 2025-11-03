<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;

    protected $fillable = [
        'tieu_de', 'noi_dung', 'trang_thai', 'ngaydang', 'slug', 'danhmuc_id'
    ];

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'danhmuc_id');
    }

    public function hinhAnhs()
    {
        return $this->hasMany(HinhAnhTinTuc::class, 'tin_id');
    }
}
