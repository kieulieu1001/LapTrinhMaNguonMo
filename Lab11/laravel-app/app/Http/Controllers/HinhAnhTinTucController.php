<?php

namespace App\Http\Controllers;

use App\Models\HinhAnhTinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HinhAnhTinTucController extends Controller
{
    public function destroy($id)
    {
        $img = HinhAnhTinTuc::findOrFail($id);
        // Xóa file vật lý nếu tồn tại
        if ($img->duongdan && Storage::disk('public')->exists($img->duongdan)) {
            Storage::disk('public')->delete($img->duongdan);
        }
        $img->delete();
        return back()->with('success', 'Đã xóa ảnh thành công!');
    }
}
