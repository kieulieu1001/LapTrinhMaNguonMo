<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserAdminSeeder extends Seeder
{
    public function run()
    {
        User::where('email', 'admin@example.com')->update(['role' => 'admin']);
    }
}
