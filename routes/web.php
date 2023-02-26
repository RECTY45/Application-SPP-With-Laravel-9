<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\PembayaranController;
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
// Authentication
Route::prefix('auth')->group( function (){
    Route::controller(LoginController::class)->group(function(){
        Route::get('login','Login')->name('AuthLogin')->middleware('guest');
        Route::post('login','AuthLogin')->name('authenticated');
        Route::post('logout','logout')->name('logout');

    });
    Route::get('/', function () {
        return redirect('auth/login');
    });
});
Route::get('/', function () {
    return redirect('auth/login');
});

// PAGE  ADMIN
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth','isAdmin']],function() {
    //  SISWA
        Route::resource('siswa',SiswaController::class);
    //  PETUGAS
        Route::resource('petugas',PetugasController::class)->parameters(['petugas' => 'petugas']);
    //  KELAS
        Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kelas']);
    //  SPP
        Route::resource('spp',SppController::class);

});

// PAGE  PETUGAS
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth','isPetugas']],function() {
    // PAGE DASHBOARD
    Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard.index');
    // PEMBAYARAN
    Route::controller(PembayaranController::class)->group(function(){
        Route::get('pembayaran/{kwitansi:nis}/kwitansi', 'kwitansi')->name('kwitansi');
        Route::get('transaksi', 'transaksi')->name('pembayaran.transaksi');
        Route::get('pembayaran/{siswa:nisn}/create', 'create')->name('pembayaran.create');
        Route::resource('pembayaran', PembayaranController::class)->only(['index','store','destroy']);
    });
});
