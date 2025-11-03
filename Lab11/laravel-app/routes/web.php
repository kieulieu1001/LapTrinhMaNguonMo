
<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('tin_tucs.index');
});


use App\Http\Controllers\TinTucController;
use App\Http\Controllers\HinhAnhTinTucController;
Route::resource('tin_tucs', TinTucController::class);
Route::delete('hinh-anh-tin-tuc/{id}', [HinhAnhTinTucController::class, 'destroy'])->name('hinh_anh_tin_tuc.destroy');

use App\Models\TinTuc;
Route::get('tin/{slug}', function ($slug) {
    $tin = TinTuc::where('slug', $slug)->firstOrFail();
    return view('tin_tucs.show', compact('tin'));
})->name('tin.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
