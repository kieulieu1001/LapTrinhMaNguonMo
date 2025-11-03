<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TinTuc;
use Illuminate\Support\Str;

class TinTucSeeder extends Seeder
{
    public function run(): void
    {
        $titles = [
            ['Bài viết nháp', 'draft', null],
            ['Bài viết đã đăng', 'published', now()],
        ];
        foreach ($titles as [$title, $status, $ngaydang]) {
            $slug = Str::slug($title);
            $base = $slug;
            $i = 2;
            while (TinTuc::where('slug', $slug)->exists()) {
                $slug = $base . '-' . $i++;
            }
            TinTuc::create([
                'tieu_de' => $title,
                'noi_dung' => 'Đây là nội dung ' . strtolower($title) . '.',
                'trang_thai' => $status,
                'ngaydang' => $ngaydang,
                'slug' => $slug,
            ]);
        }
    }
}
