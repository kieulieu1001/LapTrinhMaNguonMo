<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    public function index(Request $request)
    {
        $danhMucId = $request->get('danh_muc');
        
        $query = TinTuc::with('danhMuc')
            ->orderByDesc('ngaydang')
            ->orderByDesc('id');
        
        // Lọc theo danh mục nếu có
        if ($danhMucId) {
            $query->where('danh_muc_id', $danhMucId);
        }
        
        $dsTin = $query->paginate(9)->withQueryString();
        $danhMucs = DanhMuc::all();
        $danhMucHienTai = $danhMucId ? DanhMuc::find($danhMucId) : null;
        
        return view('tintuc.index', compact('dsTin', 'danhMucs', 'danhMucHienTai'));
    }
    
    public function show($id)
    {
        $tin = TinTuc::with('danhMuc')->findOrFail($id);
        return view('tintuc.chitiet', compact('tin'));
    }
}