<?php

use App\Http\Controllers\API\TransaksiPendapatanAPIController;
use App\Http\Controllers\API\TransaksiPengeluaranAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/transaksiPendapatan', [TransaksiPendapatanAPIController::class, 'get_all'])->name('transaksi_pendapatan.get');
Route::get('/transaksiPengeluaran', [TransaksiPengeluaranAPIController::class, 'get_all'])->name('transaksi_pengeluaran.get');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
