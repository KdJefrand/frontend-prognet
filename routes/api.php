<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\AnggotaKKController;
use App\Http\Controllers\HubunganKKController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendudukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('/Penduduk', PendudukController::class);
// Route::apiResource('/KK', KartuKeluargaController::class);
// Route::apiResource('/HubunganKK', HubunganKKController::class);
// Route::apiResource('/Agama', AgamaController::class);
// Route::apiResource('/AnggotaKK', AnggotaKKController::class);
// Route::apiResource('/Login', LoginController::class);

// Route::get('api/Agama/create', [AgamaController::class, 'create']);
// Route::get('api/Penduduk/create', [PendudukController::class, 'create']);
// Route::get('api/HubunganKK/create', [HubunganKKController::class, 'create']);
// Route::get('api/AnggotaKK/create', [AnggotaKKController::class, 'create']);
// Route::get('api/KK/create', [KartuKeluargaController::class, 'create']);
