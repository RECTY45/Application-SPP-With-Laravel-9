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
    Route::get('login', [LoginController::class, 'Login'])->name('AuthLogin')->middleware('guest');
    Route::post('login', [LoginController::class, 'AuthLogin'])->name('authenticated');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return redirect('auth/login');
    });
});
Route::get('/', function () {
    return redirect('auth/login');
});

// PAGE DASHBOARD
Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard.index')->middleware('auth');

// PAGE  ADMIN
Route::group(['prefix' => 'dashboard', 'middleware' => 'isAdmin'],function() {
    //  PAGE ADMIN SISWA
    // RECORD SISWA
    Route::get('data-siswa',[SiswaController::class,'index'])->name('siswa.index');
    // CREATE
    Route::get('data-siswa/create',[SiswaController::class,'create'])->name('siswa.create');
    // STORE
    Route::post('data-siswa/create',[SiswaController::class,'store'])->name('siswa.store');
    // EDIT
    Route::get('data-siswa/{siswa:id}/edit',[SiswaController::class,'edit'])->name('siswa.edit');
    // UPDATE
    Route::put('data-siswa/{siswa:id}',[SiswaController::class,'update'])->name('siswa.update');
    // DELETE
    Route::delete('data-siswa/{siswa:id}',[SiswaController::class,'destroy'])->name('siswa.destroy');


    // PAGE ADMIN PETUGAS
    // RECORD PETUGAS
    Route::get('data-petugas',[PetugasController::class,'index'])->name('petugas.index');
    //CREATE
    Route::get('data-petugas/create',[PetugasController::class, 'create'])->name('petugas.create');
    //STORE
    Route::post('data-petugas/create', [PetugasController::class, 'store'])->name('petugas.store');
    //EDIT
    Route::get('data-petugas/{petugas:id}/edit',[PetugasController::class,'edit'])->name('petugas.edit');
    //UPDATE
    Route::put('data-petugas/{petugas:id}',[PetugasController::class,'update'])->name('petugas.update');
    // DELETE
    Route::delete('data-petugas/{petugas:id}', [PetugasController::class,'destroy'])->name('petugas.destroy');

    // PAGE ADMIN KELAS
    //  RECORD
    Route::get('data-kelas',[KelasController::class,'index'])->name('kelas.index');
    // CREATE
    Route::get('data-kelas/create',[KelasController::class, 'create'])->name('kelas.create');
    // STORE
    Route::post('data-kelas/create',[KelasController::class, 'store'])->name('kelas.store');
    // EDIT
    Route::get('data-kelas/{kelas:id}/edit',[KelasController::class, 'edit'])->name('kelas.edit');
    // UPDATE
    Route::put('data-kelas/{kelas:id}',[KelasController::class, 'update'])->name('kelas.update');
    //  DELTE
    Route::delete('data-kelas/{kelas:id}',[KelasController::class, 'destroy'])->name('kelas.destroy');

    // PAGE SPP ADMIN
    // RECORD
    Route::get('data-spp',[SppController::class, 'index'])->name('spp.index');
    // CREATE
    Route::get('data-spp/create',[SppController::class, 'create'])->name('spp.create');
    // STORE
    Route::post('data-spp/create',[SppController::class, 'store'])->name('spp.store');
    // EDIT
    Route::get('data-spp/{spp:id}/edit',[SppController::class, 'edit'])->name('spp.edit');
    // UPDATE
    Route::put('data-spp/{spp:id}',[SppController::class, 'update'])->name('spp.update');
    // DELETE
    Route::delete('data-spp/{spp:id}',[SppController::class, 'destroy'])->name('spp.destroy');

    // PAGE PEMBAYARAN ADMIN
    // RECORD
    Route::get('data-pembayaran',[PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('data-transaksi',[PembayaranController::class, 'transaksi'])->name('pembayaran.transaksi');
    // CREATE
    Route::get('data-pembayaran/{siswa:nisn}/create',[PembayaranController::class, 'create'])->name('pembayaran.create');
    // STORE
    Route::post('data-pembayaran/create',[PembayaranController::class, 'store'])->name('pembayaran.store');
    // DELETE
    Route::delete('data-pembayaran/{pembayaran:id}',[PembayaranController::class,'destroy'])->name('pembayaran.destroy');

});

// PAGE  PETUGAS
    Route::group(['prefix' => 'dashboard', 'middleware' => 'isPetugas'],function() {
    // PAGE PEMBAYARAN PETUGAS
    // RECORD
    Route::get('data-pembayaran/{kwitansi:nis}/kwitansi', [PembayaranController::class, 'kwitansi'])->name('kwitansi');
    Route::get('data-pembayaran',[PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('data-transaksi',[PembayaranController::class, 'transaksi'])->name('pembayaran.transaksi');
    // CREATE
    Route::get('data-pembayaran/{siswa:nisn}/create',[PembayaranController::class, 'create'])->name('pembayaran.create');
    // STORE
    Route::post('data-pembayaran/store',[PembayaranController::class, 'store'])->name('pembayaran.store');
    // DELETE
    Route::delete('data-pembayaran/{pembayaran:id}',[PembayaranController::class,'destroy'])->name('pembayaran.destroy');
});
