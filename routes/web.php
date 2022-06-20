<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FasilitasController;
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

Route::prefix('sicepat')->group(function () {
    Route::get('/', [HomeController::class, 'indexSicepat']);
    Route::get('/api/statuspengiriman', [HomeController::class, 'CheckStatusPaket']);

    Route::get('/api/get-orderan', [HomeController::class, 'GetOrderan']);
    Route::post('/api/tambah-orderan', [HomeController::class, 'TambahOrderan']);
    Route::delete('/api/hapus-orderan', [HomeController::class, 'HapusOrderan']);
});

Route::get('/register/done', function () {
    return view('auth.register_done');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('profil', [HomeController::class, 'profil'])->name('profil');
Route::get('profil/edit', [HomeController::class, 'profil'])->name('profil.edit');
Route::post('profil/edit/submit', [HomeController::class, 'profil'])->name('profil.submit');


// Lapor Keluhan
Route::prefix('lapor')->group(function () {
    Route::get('list', [LaporanController::class, 'daftarKeluhan'])->name('lapor.list');
    Route::get('detail/{id}', [LaporanController::class, 'show'])->name('lapor.show');
    Route::get('keluhan', [LaporanController::class, 'index'])->name('lapor.keluhan');
    Route::get('keluhan/{type}', [LaporanController::class, 'laporKeluhan'])->name('lapor.keluhan.type');
    Route::get('keluhan/{type}/{id}/upload', [LaporanController::class, 'laporKeluhan'])->name('lapor.keluhan.type');
    Route::post('keluhan/fasilitas-rusak/{id}/upload', [LaporanController::class, 'uploadFasilitasRusak'])->name('lapor.keluhan.upload.fasilitas.rusak');
    Route::get('keluhan/fasilitas-rusak/done', function () {
        $data['title'] = 'Laporan Fasilitas Rusak';
        return view('laporan.lapor_fasilitas_rusak_done', $data);
    })->name('lapor.keluhan.fasilitas.rusak.done');

    Route::post('keluhan/oknum/{id}/upload', [LaporanController::class, 'uploadOknum'])->name('lapor.keluhan.upload.oknum');
    Route::get('keluhan/oknum/done', function () {
        $data['title'] = 'Lapor Oknum Perusak Fasilitas';
        return view('laporan.oknum.lapor_oknum_done', $data);
    })->name('lapor.keluhan.oknum.done');

    Route::post('keluhan/saran/{id}/upload', [LaporanController::class, 'uploadSaran'])->name('lapor.keluhan.upload.saran');
    Route::get('keluhan/saran/done', function () {
        $data['title'] = 'Keluhan/Saran Terkait Fasilitass';
        return view('laporan.saran.lapor_saran_done', $data);
    })->name('lapor.keluhan.saran.done');

    Route::get('feedback/{id}', [LaporanController::class, 'feedback'])->name('feedback.show');
    Route::post('feedback', [LaporanController::class, 'feedback'])->name('feedback.store');
    Route::get('keluhan/saran/done', function () {
        $data['title'] = 'Feedback Berhasil';
        return view('laporan.feedback_done', $data);
    })->name('lapor.feedback.done');


    Route::post('keluhan/save}', [LaporanController::class, 'store'])->name('lapor.keluhan.save');

    Route::get('petugas/done', function () {
        $data['title'] = 'Feedback Berhasil';
        return view('laporan.input_laporan_petugas_done', $data);
    })->name('input.laporan.done');
    Route::get('petugas/{id}', [LaporanController::class, 'show'])->name('input.laporan');
    Route::post('petugas/{id}', [LaporanController::class, 'inputLaporan'])->name('input.laporan.store');

    // Verifikasi
    Route::post('verifikasi/{id}', [LaporanController::class, 'verifikasi'])->name('lapor.verifikasi');
});
