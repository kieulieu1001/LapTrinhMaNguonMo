<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TinTuc;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    public function index(Request $request)
    {
        $query = TinTuc::with('danhMuc')->orderByDesc('ngaydang')->orderByDesc('id');
        if ($request->filled('q')) {
            $query->where('tieude', 'like', '%' . $request->q . '%');
        }
        $dsTin = $query->paginate(5)->withQueryString();
        return view('admin.tintuc.index', compact('dsTin'));
    }

    public function create()
    {
        $danhMucs = DanhMuc::all();
        return view('admin.tintuc.create', compact('danhMucs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tieude' => 'required',
            'danh_muc_id' => 'required|exists:danh_mucs,id',
            'ngaydang' => 'required|date',
        ]);
        TinTuc::create([
            'tieude' => $request->tieude,
            'danh_muc_id' => $request->danh_muc_id,
            'tomtat' => $request->tomtat,
            'noidung' => $request->noidung,
            'ngaydang' => $request->ngaydang,
        ]);
        return redirect()->route('admin.tintuc.index')->with('success', 'Đã thêm bài viết!');
    }

    public function show($id)
    {
        $tin = TinTuc::with('danhMuc')->findOrFail($id);
        return view('admin.tintuc.show', compact('tin'));
    }

    public function edit($id)
    {
        $tin = TinTuc::findOrFail($id);
        $danhMucs = DanhMuc::all();
        return view('admin.tintuc.edit', compact('tin', 'danhMucs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tieude' => 'required',
            'danh_muc_id' => 'required|exists:danh_mucs,id',
            'ngaydang' => 'required|date',
        ]);
        $tin = TinTuc::findOrFail($id);
        $tin->update([
            'tieude' => $request->tieude,
            'danh_muc_id' => $request->danh_muc_id,
            'tomtat' => $request->tomtat,
            'noidung' => $request->noidung,
            'ngaydang' => $request->ngaydang,
        ]);
        return redirect()->route('admin.tintuc.index')->with('success', 'Đã cập nhật bài viết!');
    }

    public function destroy($id)
    {
        $tin = TinTuc::findOrFail($id);
        $tin->delete();
        return redirect()->route('admin.tintuc.index')->with('success', 'Đã xóa bài viết!');
    }
}
