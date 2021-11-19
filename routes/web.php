<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TellerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/home', [DashboardController::class, 'index']);

Auth::routes();

Route::get('/siswa', [UserController::class, 'index']);
Route::get('/siswa/buat', [UserController::class, 'create']);
Route::post('/siswa', [UserController::class, 'store']);
Route::get('/edit-siswa/{id}', [UserController::class, 'edit']);
Route::post('/update-siswa/{id}', [UserController::class, 'update']);
Route::get('/hapus-siswa/{id}', [UserController::class, 'destroy']);

Route::get('/teller', [TellerController::class, 'index']);
Route::get('/teller/buat', [TellerController::class, 'create']);
Route::post('/teller', [TellerController::class, 'store']);
Route::get('/edit-teller/{id}', [TellerController::class, 'edit']);
Route::post('/update-teller/{id}', [TellerController::class, 'update']);
Route::get('/hapus-teller/{id}', [TellerController::class, 'destroy']);

Route::resource('jenis-pembayaran', PembayaranController::class);
Route::resource('transaksi', TagihanController::class);
Route::resource('kelas', KelasController::class);
Route::post('/konfirmasi/{id}', [TagihanController::class , 'konfirmasi'])->name('tagihan.konfirmasi');
Route::get('/download/{id}', [TagihanController::class , 'download'])->name('tagihan.download');
Route::post('/cetak-pdf', [TagihanController::class, 'pdf'])->name('cetak-pdf');