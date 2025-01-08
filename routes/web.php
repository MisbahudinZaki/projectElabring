<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\absenkeluarcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\isicontroller;
use App\Http\Controllers\LoginController;

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
Route::post('logout', [logincontroller::class, 'actionlogout'])->name('logout')->middleware('auth');
Route::get('home', [isicontroller::class, 'index'])->name('home');
Route::resource('absen', AbsenController::class);
Route::resource('absenpulang', absenkeluarcontroller::class);

