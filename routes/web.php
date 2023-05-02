<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\sppController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\pembayaranController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/', [loginController::class, "index"]);

Route::post('/login', [loginController::class, "login"]);
Route::get('/logout', [loginController::class, "logout"]);
Route::get('/register', [loginController::class, "register"]);
Route::post('/create', [loginController::class, "create"]);
Route::post('/get-nominal', [pembayaranController::class, "getNominal"]);

Route::group(['middleware' => ['auth', 'ceklevel:admin,petugas,siswa']], function(){
    Route::resource('dashboard', dashboardController::class);
    Route::resource('petugas', petugasController::class);
    Route::resource('kelas', kelasController::class);
    Route::resource('spp', sppController::class);
    Route::resource('siswa', siswaController::class);
    Route::resource('pembayaran', pembayaranController::class);
});
