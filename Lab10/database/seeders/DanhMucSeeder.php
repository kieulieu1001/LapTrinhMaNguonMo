<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('danh_mucs')->insert([
            [
                'ten_danh_muc' => 'Công nghệ',
                'slug' => 'cong-nghe',
                'mo_ta' => 'Tin tức về công nghệ thông tin, phần mềm, phần cứng',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ten_danh_muc' => 'Lập trình',
                'slug' => 'lap-trinh',
                'mo_ta' => 'Tin tức về ngôn ngữ lập trình, framework',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ten_danh_muc' => 'Cơ sở dữ liệu',
                'slug' => 'co-so-du-lieu',
                'mo_ta' => 'Tin tức về hệ quản trị CSDL',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ten_danh_muc' => 'Công cụ',
                'slug' => 'cong-cu',
                'mo_ta' => 'Tin tức về các công cụ hỗ trợ lập trình',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ten_danh_muc' => 'Trí tuệ nhân tạo',
                'slug' => 'tri-tue-nhan-tao',
                'mo_ta' => 'Tin tức về AI, Machine Learning',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}