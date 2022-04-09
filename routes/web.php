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
Route::get('keluhan', [LaporanController::class, 'index'])->name('lapor.keluhan');
