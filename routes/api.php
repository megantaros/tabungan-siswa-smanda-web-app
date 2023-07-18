<?php

use App\Http\Controllers\AndroidController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login', [AndroidController::class, 'login']);
Route::get('/saldo/{id_siswa}', [AndroidController::class, 'saldo']);
Route::get('/transaksi/{id_siswa}', [AndroidController::class, 'transaksi']);
Route::get('/transaksi-end-of-week/{id_siswa}', [AndroidController::class, 'transaksi_week']);
Route::get('/transaksi-end-of-month/{id_siswa}', [AndroidController::class, 'transaksi_month']);
Route::get('/get-transaksi/{id_transaksi}', [AndroidController::class, 'get_transaksi']);
Route::get('/get-last-transaksi/{id_siswa}', [AndroidController::class, 'get_last_transaksi']);
Route::post('/update-profil/{id_siswa}', [AndroidController::class, 'update']);

// Route::get('/setoran/{id_siswa}', [AndroidController::class, 'setoran']);
// Route::get('/setoran-end-of-week/{id_siswa}', [AndroidController::class, 'setoran_week']);
// Route::get('/setoran-end-of-month/{id_siswa}', [AndroidController::class, 'setoran_month']);
// Route::get('/penarikan/{id_siswa}', [AndroidController::class, 'penarikan']);
// Route::get('/penarikan-end-of-week/{id_siswa}', [AndroidController::class, 'penarikan_week']);
// Route::get('/penarikan-end-of-month/{id_siswa}', [AndroidController::class, 'penarikan_month']);