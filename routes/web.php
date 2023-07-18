<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PenarikanController;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TabunganController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontEndController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'login'])->name('attempt');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware('auth:admin')->group(function () {
    Route::prefix('bendahara')->group(function () {
        Route::get('/profil', [FrontEndController::class, 'profil'])->name('admin.profil');
        Route::put('/profil/update', [AdminController::class, 'update'])->name('update.profil');
        Route::get('/dashboard', [FrontEndController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/cetak_siswa', [FrontEndController::class, 'cetak_siswa'])->name('cetak.siswa');
        Route::get('/tambah-siswa', [FrontEndController::class, 'tambah_siswa'])->name('admin.add.siswa');
        Route::get('/siswa/{id_siswa}', [FrontEndController::class, 'get_siswa'])->name('admin.get.siswa');
        Route::post('/tambah-siswa', [SiswaController::class, 'store'])->name('store.siswa');
        Route::put('/update-siswa/{id_siswa}', [SiswaController::class, 'update'])->name('update.siswa');
        Route::get('/delete-siswa/{id_siswa}', [SiswaController::class, 'delete'])->name('delete.siswa');
        Route::get('/penarikan/{id_siswa}', [FrontEndController::class, 'penarikan'])->name('admin.penarikan');
        Route::post('/penarikan/{id_siswa}', [PenarikanController::class, 'store'])->name('store.penarikan');
        Route::get('/setoran/{id_siswa}', [FrontEndController::class, 'setoran'])->name('admin.setoran');
        Route::post('/setoran/{id_siswa}', [SetoranController::class, 'store'])->name('store.setoran');
        Route::get('/transaksi', [FrontEndController::class, 'transaksi'])->name('admin.transaksi');
        Route::get('/transaksi/cetak', [FrontEndController::class, 'cetak_transaksi'])->name('cetak.transaksi.siswa');
        Route::get('/transaksi/{id_transaksi}', [FrontEndController::class, 'get_transaksi'])->name('get.transaksi');
        Route::get('/transaksi/{id_transaksi}/cetak', [FrontEndController::class, 'cetak_penarikan'])->name('cetak.transaksi');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/daftar-admin', [FrontEndController::class, 'users_admin'])->name('admin.users');
        Route::get('/tambah-admin', [FrontEndController::class, 'tambah_admin'])->name('admin.add.admin');
        Route::get('/admin/{id_admin}', [FrontEndController::class, 'get_admin'])->name('admin.get.admin');
        Route::put('/update-admin/{id_admin}', [AdminController::class, 'update_admin'])->name('update.admin');
        Route::post('/tambah-admin', [AdminController::class, 'store'])->name('add.admin');
        Route::put('/update-saldo/{id_tabungan}', [TabunganController::class, 'edit'])->name('update.saldo');
    });
});