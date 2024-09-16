<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\TransaksiPendapatan;
use App\Models\TransaksiPengeluaran;
use Illuminate\Http\Request;

class LaporanHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.laporan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $start_date = $request->input('start_date');
        // KURANG DARI
        $pendapatan_saldo_sebelumnya = TransaksiPendapatan::where('tanggal_pendapatan', '<', $start_date)
            ->where('id_pendapatan', '1')
            ->sum('netto');
        $pendapatan_penerimaan_sebelumnya = TransaksiPendapatan::where('tanggal_pendapatan', '<', $start_date)
            ->where('id_pendapatan', '2')
            ->sum('netto');
        $pendapatan_umum_sebelumnya = TransaksiPendapatan::where('tanggal_pendapatan', '<', $start_date)
            ->where('id_pendapatan', '3')
            ->sum('netto');
        $pendapatan_tunai_sebelumnya = TransaksiPendapatan::where('tanggal_pendapatan', '<', $start_date)
            ->where('id_pendapatan', '4')
            ->sum('netto');
        $pendapatan_kredit_sebelumnya = TransaksiPendapatan::where('tanggal_pendapatan', '<', $start_date)
            ->where('id_pendapatan', '5')
            ->sum('netto');
        $pendapatan_sebelumnya = TransaksiPendapatan::where('tanggal_pendapatan', '<', $start_date)->get();

        $kas_sebelumnya = Kas::where('tanggal_kas', '<', $start_date)->sum('kas');

        $pengeluaran_sebelumnya = TransaksiPengeluaran::where('tanggal_pengeluaran', '<', $start_date)->sum('tagihan');

        $TotalPendapatanSebelumnya = ($pendapatan_saldo_sebelumnya + $pendapatan_penerimaan_sebelumnya + $pendapatan_umum_sebelumnya + $pendapatan_tunai_sebelumnya + $pendapatan_kredit_sebelumnya);

        $TotalBersih = $TotalPendapatanSebelumnya - $pengeluaran_sebelumnya;

        $NettoSebelumnya = $TotalBersih + $kas_sebelumnya;

        // dd($NettoSebelumnya);

        // SAMA DENGAN
        $pendapatan_saldo = TransaksiPendapatan::where('tanggal_pendapatan', '=', $start_date)->where('id_pendapatan', '1')->get();
        $pendapatan_penerimaan = TransaksiPendapatan::where('tanggal_pendapatan', '=', $start_date)->where('id_pendapatan', '2')->get();
        $pendapatan_umum = TransaksiPendapatan::where('tanggal_pendapatan', '=', $start_date)->where('id_pendapatan', '3')->get();
        $pendapatan_tunai = TransaksiPendapatan::where('tanggal_pendapatan', '=', $start_date)->where('id_pendapatan', '4')->get();
        $pendapatan_kredit = TransaksiPendapatan::where('tanggal_pendapatan', '=', $start_date)->where('id_pendapatan', '5')->get();
        $pendapatan = TransaksiPendapatan::where('tanggal_pendapatan', '=', $start_date)->get();

        $kas = Kas::where('tanggal_kas', '=', $start_date)->sum('kas');

        // SAMA DENGAN
        $pengeluaran = TransaksiPengeluaran::where('tanggal_pengeluaran', '=', $start_date)->get();
        $pengeluaran_umum = TransaksiPengeluaran::where('tanggal_pengeluaran', '=', $start_date)->where('pengeluaran', 'UMUM')->get();
        $pengeluaran_operasional = TransaksiPengeluaran::where('tanggal_pengeluaran', '=', $start_date)->where('pengeluaran', 'OPERASIONAL')->get();
        $pengeluaran_bahan = TransaksiPengeluaran::where('tanggal_pengeluaran', '=', $start_date)->where('pengeluaran', 'BAHAN')->get();
        $pengeluaran_prive = TransaksiPengeluaran::where('tanggal_pengeluaran', '=', $start_date)->where('pengeluaran', 'PRIVE')->get();

        return view('page.laporan.read')->with([
            'pendapatan' => $pendapatan,
            'pendapatan_saldo' => $pendapatan_saldo,
            'pendapatan_penerimaan' => $pendapatan_penerimaan,
            'pendapatan_umum' => $pendapatan_umum,
            'pendapatan_tunai' => $pendapatan_tunai,
            'pendapatan_kredit' => $pendapatan_kredit,

            'pendapatan_sebelumnya' => $pendapatan_sebelumnya,
            'pendapatan_saldo_sebelumnya' => $pendapatan_saldo_sebelumnya,
            'pendapatan_penerimaan_sebelumnya' => $pendapatan_penerimaan_sebelumnya,
            'pendapatan_umum_sebelumnya' => $pendapatan_umum_sebelumnya,
            'pendapatan_tunai_sebelumnya' => $pendapatan_tunai_sebelumnya,
            'pendapatan_kredit_sebelumnya' => $pendapatan_kredit_sebelumnya,

            'pengeluaran' => $pengeluaran,
            'pengeluaran_umum' => $pengeluaran_umum,
            'pengeluaran_operasional' => $pengeluaran_operasional,
            'pengeluaran_bahan' => $pengeluaran_bahan,
            'pengeluaran_prive' => $pengeluaran_prive,

            'NettoSebelumnya' => $NettoSebelumnya,
            'kas' => $kas,
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
