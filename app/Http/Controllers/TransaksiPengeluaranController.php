<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiUraianPengeluaran;
use App\Models\TransaksiPengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TransaksiPengeluaran = TransaksiPengeluaran::with(['klasifikasiUraianPengeluaran', 'user'])
            ->orderBy('tanggal_pengeluaran', 'DESC')
            ->paginate(5);;
        return view('page.transaksi_pengeluaran.index')->with([
            'TransaksiPengeluaran' => $TransaksiPengeluaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klasifikasi_uraian_pengeluaran = KlasifikasiUraianPengeluaran::all();
        return view('page.transaksi_pengeluaran.create')->with([
            'klasifikasi_uraian_pengeluaran' => $klasifikasi_uraian_pengeluaran,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_uraian_pengeluaran = $request->input('uraian');
        $pengeluaran = $request->input('pengeluaran');
        $numericPengeluaran = preg_replace('/[^0-9]/', '', $pengeluaran);

        $id_uraian_pengeluaran = $request->input('uraian');
        $uraian_pengeluaran_value = KlasifikasiUraianPengeluaran::find($id_uraian_pengeluaran)->uraian_pengeluaran ?? null;

        $existing_uraian = KlasifikasiUraianPengeluaran::where('id', $id_uraian_pengeluaran)
            ->where('uraian_pengeluaran', $uraian_pengeluaran_value)
            ->first();

        if (!$existing_uraian) {
            // dd('belum ada');
            $data_uraian = [
                'uraian_pengeluaran' => $request->input('uraian'),
            ];
            $uraian = KlasifikasiUraianPengeluaran::create($data_uraian);
            $id_uraian_pengeluaran = $uraian->id;
            // dd($id_uraian_pengeluaran);
        } else {
            // dd('ada');
            $id_uraian_pengeluaran = $existing_uraian->id;
            // dd($id_uraian_pengeluaran);
        }

        $id_tpengeluaran = date('YmdHsh');
        $data = [
            'id_tpengeluaran' => $id_tpengeluaran,
            'id_uraian_pengeluaran' => $id_uraian_pengeluaran,
            'pengeluaran' => $request->input('klasifikasi'),
            'tanggal_pengeluaran' => $request->input('tgl_pengeluaran'),
            'tanggal_faktur1' => $request->input('tanggal_faktur1'),
            'tanggal_faktur2' => $request->input('tanggal_faktur2'),
            'tagihan' => (int) $numericPengeluaran,
            'keterangan' => $request->input('keterangan'),
            'id_user' => Auth::user()->id,
        ];

        TransaksiPengeluaran::create($data);

        return redirect()
            ->route('transaksi_pengeluaran.index')
            ->with('message', 'Data Pengeluaran Sudah ditambahkan');
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
        $klasifikasi_uraian_pengeluaran = KlasifikasiUraianPengeluaran::all();
        $TransaksiPengeluaran = TransaksiPengeluaran::where('id', $id)->first();
        return view('page.transaksi_pengeluaran.edit')->with([
            'klasifikasi_uraian_pengeluaran' => $klasifikasi_uraian_pengeluaran,
            'TransaksiPengeluaran' => $TransaksiPengeluaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id_uraian_pengeluaran = $request->input('uraian');
        $pengeluaran = $request->input('pengeluaran');
        $numericPengeluaran = preg_replace('/[^0-9]/', '', $pengeluaran);

        $id_uraian_pengeluaran = $request->input('uraian');
        $uraian_pengeluaran_value = KlasifikasiUraianPengeluaran::find($id_uraian_pengeluaran)->uraian_pengeluaran ?? null;

        $existing_uraian = KlasifikasiUraianPengeluaran::where('id', $id_uraian_pengeluaran)
            ->where('uraian_pengeluaran', $uraian_pengeluaran_value)
            ->first();

        if (!$existing_uraian) {
            // dd('belum ada');
            $data_uraian = [
                'uraian_pengeluaran' => $request->input('uraian'),
            ];
            $uraian = KlasifikasiUraianPengeluaran::create($data_uraian);
            $id_uraian_pengeluaran = $uraian->id;
            // dd($id_uraian_pengeluaran);
        } else {
            // dd('ada');
            $id_uraian_pengeluaran = $existing_uraian->id;
            // dd($id_uraian_pengeluaran);
        }

        $data = [
            'id_uraian_pengeluaran' => $id_uraian_pengeluaran,
            'pengeluaran' => $request->input('klasifikasi'),
            'tanggal_pengeluaran' => $request->input('tgl_pengeluaran'),
            'tanggal_faktur1' => $request->input('tanggal_faktur1'),
            'tanggal_faktur2' => $request->input('tanggal_faktur2'),
            'tagihan' => (int) $numericPengeluaran,
            'keterangan' => $request->input('keterangan'),
        ];
        $datas = TransaksiPengeluaran::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('transaksi_pengeluaran.index')
            ->with('message', 'Data Pendapatan Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TransaksiPengeluaran::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Transaksi Pengeluaran Sudah dihapus');
    }
}
