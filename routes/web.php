<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\AnggotaKKController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HubunganKKController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\Controller;
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
    return view('login');
});

Route::resource('/Penduduk', PendudukController::class);
Route::resource('/KK', KartuKeluargaController::class);
Route::resource('/HubunganKK', HubunganKKController::class);
Route::resource('/Agama', AgamaController::class);
Route::resource('/AnggotaKK', AnggotaKKController::class);
Route::resource('/Dashboard', DashboardController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login');

