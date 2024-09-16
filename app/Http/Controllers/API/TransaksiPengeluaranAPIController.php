<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TransaksiPengeluaran;
use Illuminate\Http\Request;

class TransaksiPengeluaranAPIController extends Controller
{
    public function get_all()
    {
        $transaksi_pengeluaran = TransaksiPengeluaran::with(['klasifikasiUraianPengeluaran','user'])->get();
        return response()->json([
            'transaksi_pengeluaran'=>$transaksi_pengeluaran,
        ]);
    }
}
