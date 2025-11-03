<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinTucController;

Route::get('/', [TinTucController::class, 'index'])->name('tin.index');
Route::get('/tin/{id}', [TinTucController::class, 'show'])->name('tin.show');

// Route tạm cho dashboard và danh mục admin để sidebar không lỗi
Route::view('admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
Route::view('admin/danhmuc', 'admin.danhmuc.index')->name('admin.danhmuc.index');

// Admin CRUD bài viết (thực tế)
Route::prefix('admin')->name('admin.')->group(function () {
	Route::resource('tintuc', App\Http\Controllers\Admin\TinTucController::class);
});