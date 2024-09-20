<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiUraianPengeluaran;
use App\Models\TransaksiPengeluaran;
use Illuminate\Http\Request;

class LaporanUraianPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klasifikasi_uraian_pengeluaran = KlasifikasiUraianPengeluaran::all();
        return view('page.laporan_uraian_pengeluaran.index')->with([
            'klasifikasi_uraian_pengeluaran' => $klasifikasi_uraian_pengeluaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $uraian = $request->input('uraian');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $pengeluaran = TransaksiPengeluaran::whereBetween('tanggal_pengeluaran', [$start_date, $end_date])->where('id_uraian_pengeluaran', $uraian)->get();

        // dd($pengeluaran);
        return view('page.laporan_uraian_pengeluaran.read')->with([
            'pengeluaran' => $pengeluaran,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
