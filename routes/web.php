<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SppController;
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
Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'],function() {
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

    // PAGE KELAS
    Route::get('data-kelas',[KelasController::class,'index'])->name('kelas.index');

    // PAGE SPP
    Route::get('data-spp',[SppController::class,'index'])->name('spp.index');
});


