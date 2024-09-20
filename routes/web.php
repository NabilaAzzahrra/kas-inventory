<?php

use App\Http\Controllers\KlasifikasiPendapatanController;
use App\Http\Controllers\KlasifikasiUraianPendapatanController;
use App\Http\Controllers\KlasifikasiUraianPengeluaranController;
use App\Http\Controllers\LaporanHarianController;
use App\Http\Controllers\LaporanUraianController;
use App\Http\Controllers\LaporanUraianPengeluaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TambahanKasController;
use App\Http\Controllers\TransaksiPendapatanController;
use App\Http\Controllers\TransaksiPengeluaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('transaksi_pendapatan', TransaksiPendapatanController::class)->middleware('auth');
Route::resource('transaksi_pengeluaran', TransaksiPengeluaranController::class)->middleware('auth');
Route::resource('klasifikasiPendapatan', KlasifikasiPendapatanController::class)->middleware('auth');
Route::resource('laporanHarian', LaporanHarianController::class)->middleware('auth');
Route::resource('laporanUraian', LaporanUraianController::class)->middleware('auth');
Route::resource('laporanUraianPengeluaran', LaporanUraianPengeluaranController::class)->middleware('auth');
Route::resource('tambahanKas', TambahanKasController::class)->middleware('auth');
Route::resource('MasterKlasifikasiPendapatan', KlasifikasiPendapatanController::class)->middleware('auth');
Route::resource('KlasifikasiUraianPendapatan', KlasifikasiUraianPendapatanController::class)->middleware('auth');
Route::resource('KlasifikasiUraianPengeluaran', KlasifikasiUraianPengeluaranController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
