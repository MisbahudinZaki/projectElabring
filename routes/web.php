<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\absenkeluarcontroller;
use App\Http\Controllers\cetakcontroller;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\isicontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserStatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('home', [isicontroller::class, 'index'])->name('home')->middleware('auth');

Route::resource('absen', AbsenController::class)->middleware('aktif');
Route::resource('absenpulang', absenkeluarcontroller::class)->middleware(('aktif'));

Route::resource('user', UserController::class)->middleware('admin');
Route::resource('status', UserStatusController::class);

Route::get('/gantiPassword',[UserController::class,'showchangepasswordform'])->middleware('auth');
Route::post('/gantiPassword',[UserController::class,'changepassword'])->name('changepassword')->middleware('auth');

Route::get('/cetak', [cetakcontroller::class, 'cetak'])->name('cetak')->middleware('admin');
Route::get('/cetakdata', [cetakcontroller::class, 'cetakform'])->name('cetak-pegawai-form')->middleware('admin');
Route::get('cetakdatapertanggal/{tglawal}/{tglakhir}', [cetakcontroller::class, 'cetakpegawaipertanggal'])->name('cetakpegawaipertanggal')->middleware('admin');
Route::resource('cetak', cetakcontroller::class);

Route::get('about', [AboutController::class, 'home'])->name('about');
