<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $danhmucs = ['Thể thao', 'Giáo dục', 'Công nghệ', 'Giải trí'];
        foreach ($danhmucs as $ten) {
            \App\Models\DanhMuc::create(['ten' => $ten]);
        }
    }
}
