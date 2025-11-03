<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = TinTuc::query();
        $query->when($request->filled('kw'), function($q) use ($request) {
            $q->where('tieu_de', 'like', '%'.$request->kw.'%');
        });
        $query->when($request->filled('danhmuc_id'), function($q) use ($request) {
            $q->where('danhmuc_id', $request->danhmuc_id);
        });
        $query->when($request->filled('trang_thai'), function($q) use ($request) {
            $q->where('trang_thai', $request->trang_thai);
        });
        $query->when($request->filled('from'), function($q) use ($request) {
            $q->whereDate('ngaydang', '>=', $request->from);
        });
        $query->when($request->filled('to'), function($q) use ($request) {
            $q->whereDate('ngaydang', '<=', $request->to);
        });
        $tinTucs = $query->orderByDesc('id')->paginate(10)->withQueryString();
        $danhmucs = \App\Models\DanhMuc::all();
        return view('tin_tucs.index', compact('tinTucs', 'danhmucs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tin_tucs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tieu_de' => 'required',
            'noi_dung' => 'required',
            'trang_thai' => 'required|in:draft,published',
            'slug' => 'nullable|string',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $data = $validated;
        // Sinh slug nếu chưa nhập hoặc bị trùng
        $slug = $data['slug'] ?? '';
        if (empty($slug)) {
            $slug = Str::slug($data['tieu_de']);
        }
        $base = $slug;
        $i = 2;
        while (TinTuc::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        $data['slug'] = $slug;
        if ($data['trang_thai'] === 'published') {
            $data['ngaydang'] = now();
        }
        $tinTuc = TinTuc::create($data);

        // Xử lý upload nhiều ảnh
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                if ($file && $file->isValid()) {
                    $path = $file->store('public/news/gallery');
                    $filename = basename($path);
                    \App\Models\HinhAnhTinTuc::create([
                        'tin_id' => $tinTuc->id,
                        'duongdan' => 'news/gallery/' . $filename,
                        'ghi_chu' => null,
                    ]);
                }
            }
        }
        return redirect()->route('tin_tucs.index')->with('success', 'Đã thêm tin tức!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TinTuc  $tinTuc
     * @return \Illuminate\Http\Response
     */
    public function show(TinTuc $tinTuc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TinTuc  $tinTuc
     * @return \Illuminate\Http\Response
     */
    public function edit(TinTuc $tinTuc)
    {
        $tinTuc->load('hinhAnhs');
        return view('tin_tucs.edit', compact('tinTuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TinTuc  $tinTuc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TinTuc $tinTuc)
    {
        $validated = $request->validate([
            'tieu_de' => 'required',
            'noi_dung' => 'required',
            'trang_thai' => 'required|in:draft,published',
            'slug' => 'nullable|string',
        ]);
        $data = $validated;
        // Nếu slug trống hoặc bị trùng, sinh lại slug
        $slug = $data['slug'] ?? '';
        if (empty($slug)) {
            $slug = Str::slug($data['tieu_de']);
        }
        $base = $slug;
        $i = 2;
        while (TinTuc::where('slug', $slug)->where('id', '!=', $tinTuc->id)->exists()) {
            $slug = $base . '-' . $i++;
        }
        $data['slug'] = $slug;
        if ($data['trang_thai'] === 'published' && empty($tinTuc->ngaydang)) {
            $data['ngaydang'] = now();
        }
        $tinTuc->update($data);
        return redirect()->route('tin_tucs.index')->with('success', 'Đã cập nhật tin tức!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TinTuc  $tinTuc
     * @return \Illuminate\Http\Response
     */
    public function destroy(TinTuc $tinTuc)
    {
        // Xóa toàn bộ ảnh gallery liên quan cả DB và file vật lý
        foreach ($tinTuc->hinhAnhs as $img) {
            if ($img->duongdan && \Illuminate\Support\Facades\Storage::disk('public')->exists($img->duongdan)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($img->duongdan);
            }
            $img->delete();
        }
        $tinTuc->delete();
        return redirect()->route('tin_tucs.index')->with('success', 'Đã xóa bài viết và toàn bộ ảnh liên quan!');
    }
}
