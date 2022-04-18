<?php
 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Models\Laporan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/home', function () {
    return view('home');
});
 
Route::get('/register/berhasil', function () {
    return view('auth.register_berhasil');
});
 
 
// auth
Auth::routes();
 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profil', [HomeController::class, 'profil'])->name('profil');
 
// Laporan
Route::prefix('lapor')->group(function () {
    Route::get('list', [LaporanController::class, 'daftarKeluhan'])->name('lapor.list');
    Route::get('keluhan', [LaporanController::class, 'index'])->name('lapor.keluhan');
    Route::get('keluhan/{type}', [LaporanController::class, 'laporKeluhan'])->name('lapor.keluhan.type');
    Route::get('keluhan/{type}/{id}/upload', [LaporanController::class, 'laporKeluhan'])->name('lapor.keluhan.type');
    Route::post('keluhan/fasilitas-rusak/{id}/upload', [LaporanController::class, 'uploadFasilitasRusak'])->name('lapor.keluhan.upload.fasilitas.rusak');
    Route::get('keluhan/fasilitas-rusak/done', function () {
        $data['title'] = 'Laporan Fasilitas Rusak';
        return view('laporan.lapor_fasilitas_rusak_done', $data);
    })->name('lapor.keluhan.fasilitas.rusak.done');
    Route::post('keluhan/save}', [LaporanController::class, 'store'])->name('lapor.keluhan.save');
});