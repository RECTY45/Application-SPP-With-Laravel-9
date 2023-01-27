<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
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
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard.index')->middleware('auth');;
