<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TinTuc;
use App\Models\DanhMuc;

class DashboardController extends Controller
{
    public function index()
    {
        $tongTinTuc = TinTuc::count();
        $tongDanhMuc = DanhMuc::count();
        $tinMoiNhat = TinTuc::with('danhMuc')
            ->orderByDesc('ngaydang')
            ->limit(5)
            ->get();
        
        return view('admin.dashboard', compact('tongTinTuc', 'tongDanhMuc', 'tinMoiNhat'));
    }
}