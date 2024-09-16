<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TransaksiPendapatan;
use Illuminate\Http\Request;

class TransaksiPendapatanAPIController extends Controller
{
    public function get_all()
    {
        $transaksi_pendapatan = TransaksiPendapatan::with(['klasifikasiUraianPendapatan','user', 'pendapatan'])->get();
        return response()->json([
            'transaksi_pendapatan'=>$transaksi_pendapatan,
        ]);
    }
}
