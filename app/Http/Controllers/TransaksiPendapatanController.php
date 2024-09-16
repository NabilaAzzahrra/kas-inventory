<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiPendapatan;
use App\Models\KlasifikasiUraianPendapatan;
use App\Models\KodeLaporan;
use App\Models\TransaksiPendapatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiPendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TransaksiPendapatan = TransaksiPendapatan::with(['klasifikasiUraianPendapatan', 'user'])
            ->orderBy('tanggal_pendapatan', 'DESC')
            ->paginate(10);
        return view('page.transaksi.index')->with([
            'TransaksiPendapatan' => $TransaksiPendapatan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klasifikasi_pendapatan = KlasifikasiPendapatan::all();
        $klasifikasi_uraian_pendapatan = KlasifikasiUraianPendapatan::all();
        return view('page.transaksi.create')->with([
            'klasifikasi_pendapatan' => $klasifikasi_pendapatan,
            'klasifikasi_uraian_pendapatan' => $klasifikasi_uraian_pendapatan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_uraian_pendapatan = $request->input('uraian');
        $tagihan = $request->input('tagihan');
        $numericTagihan = preg_replace('/[^0-9]/', '', $tagihan);
        $retur = $request->input('retur');
        $numericRetur = preg_replace('/[^0-9]/', '', $retur);
        $penerimaan = $request->input('penerimaan');
        $numericPenerimaan = preg_replace('/[^0-9]/', '', $penerimaan);
        $kekurangan = $request->input('kekurangan');
        $numericKekurangan = preg_replace('/[^0-9]/', '', $kekurangan);
        $kelebihan = $request->input('kelebihan');
        $numericKelebihan = preg_replace('/[^0-9]/', '', $kelebihan);
        $tanggal_pendapatan = $request->input('tgl_pendapatan');

        $tgl_laporan = KodeLaporan::where('tanggal', $tanggal_pendapatan)->first();

        if (!$tgl_laporan) {
            $lastKodeLaporan = KodeLaporan::orderBy('kode', 'desc')->first();

            if ($lastKodeLaporan) {
                $lastNumber = (int)substr($lastKodeLaporan->kode, 3);
                $newNumber = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);
            } else {
                $newNumber = str_pad(1, 5, '0', STR_PAD_LEFT);
            }

            $newKodeLaporan = 'LAP' . $newNumber;

            $data_tanggal = [
                'kode' => $newKodeLaporan,
                'tanggal' => $tanggal_pendapatan
            ];
            $tgl_laporan = KodeLaporan::create($data_tanggal);
        }

        $id_uraian_pendapatan = $request->input('uraian');
        $uraian_pendapatan_value = KlasifikasiUraianPendapatan::find($id_uraian_pendapatan)->uraian_pendapatan ?? null;

        $existing_uraian = KlasifikasiUraianPendapatan::where('id', $id_uraian_pendapatan)
            ->where('uraian_pendapatan', $uraian_pendapatan_value)
            ->first();

        if (!$existing_uraian) {
            // dd('belum ada');
            $data_uraian = [
                'uraian_pendapatan' => $request->input('uraian'),
            ];
            $uraian = KlasifikasiUraianPendapatan::create($data_uraian);
            $id_uraian_pendapatan = $uraian->id;
            // dd($id_uraian_pendapatan);
        } else {
            // dd('ada');
            $id_uraian_pendapatan = $existing_uraian->id;
            // dd($id_uraian_pendapatan);
        }

        $id_tpendapatan = date('YmdHsh');
        $data = [
            'id_tpendapatan' => $id_tpendapatan,
            'id_uraian_pendapatan' => $id_uraian_pendapatan,
            'id_pendapatan' => $request->input('klasifikasi'),
            'tanggal_pendapatan' => $request->input('tgl_pendapatan'),
            'tanggal_faktur1' => $request->input('tanggal_faktur1'),
            'tanggal_faktur2' => $request->input('tanggal_faktur2'),
            'gross' => (int) $numericTagihan,
            'retur' => (int) $numericRetur,
            'netto' => (int) $numericPenerimaan,
            'kurang_bayar' => (int) $numericKekurangan,
            'lebih_bayar' => (int) $numericKelebihan,
            'keterangan' => $request->input('keterangan'),
            'id_user' => Auth::user()->id,
        ];

        TransaksiPendapatan::create($data);

        return redirect()
            ->route('transaksi_pendapatan.index')
            ->with('message', 'Data Pendapatan Sudah ditambahkan');
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
        $klasifikasi_pendapatan = KlasifikasiPendapatan::all();
        $klasifikasi_uraian_pendapatan = KlasifikasiUraianPendapatan::all();
        $TransaksiPendapatan = TransaksiPendapatan::where('id', $id)->first();
        return view('page.transaksi.edit')->with([
            'klasifikasi_pendapatan' => $klasifikasi_pendapatan,
            'klasifikasi_uraian_pendapatan' => $klasifikasi_uraian_pendapatan,
            'TransaksiPendapatan' => $TransaksiPendapatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id_uraian_pendapatan = $request->input('uraian');
        $tagihan = $request->input('tagihan');
        $numericTagihan = preg_replace('/[^0-9]/', '', $tagihan);
        $retur = $request->input('retur');
        $numericRetur = preg_replace('/[^0-9]/', '', $retur);
        $penerimaan = $request->input('penerimaan');
        $numericPenerimaan = preg_replace('/[^0-9]/', '', $penerimaan);
        $kekurangan = $request->input('kekurangan');
        $numericKekurangan = preg_replace('/[^0-9]/', '', $kekurangan);
        $kelebihan = $request->input('kelebihan');
        $numericKelebihan = preg_replace('/[^0-9]/', '', $kelebihan);
        $tanggal_pendapatan = $request->input('tgl_pendapatan');

        $tgl_laporan = KodeLaporan::where('tanggal', $tanggal_pendapatan)->first();

        if (!$tgl_laporan) {
            $lastKodeLaporan = KodeLaporan::orderBy('kode', 'desc')->first();

            if ($lastKodeLaporan) {
                $lastNumber = (int)substr($lastKodeLaporan->kode, 3);
                $newNumber = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);
            } else {
                $newNumber = str_pad(1, 5, '0', STR_PAD_LEFT);
            }

            $newKodeLaporan = 'LAP' . $newNumber;

            $data_tanggal = [
                'kode' => $newKodeLaporan,
                'tanggal' => $tanggal_pendapatan
            ];
            $tgl_laporan = KodeLaporan::create($data_tanggal);
        }

        $id_uraian_pendapatan = $request->input('uraian');
        $uraian_pendapatan_value = KlasifikasiUraianPendapatan::find($id_uraian_pendapatan)->uraian_pendapatan ?? null;

        $existing_uraian = KlasifikasiUraianPendapatan::where('id', $id_uraian_pendapatan)
            ->where('uraian_pendapatan', $uraian_pendapatan_value)
            ->first();

        if (!$existing_uraian) {
            // dd('belum ada');
            $data_uraian = [
                'uraian_pendapatan' => $request->input('uraian'),
            ];
            $uraian = KlasifikasiUraianPendapatan::create($data_uraian);
            $id_uraian_pendapatan = $uraian->id;
            // dd($id_uraian_pendapatan);
        } else {
            // dd('ada');
            $id_uraian_pendapatan = $existing_uraian->id;
            // dd($id_uraian_pendapatan);
        }

        $data = [
            'id_uraian_pendapatan' => $id_uraian_pendapatan,
            'id_pendapatan' => $request->input('klasifikasi'),
            'tanggal_pendapatan' => $request->input('tgl_pendapatan'),
            'tanggal_faktur1' => $request->input('tanggal_faktur1'),
            'tanggal_faktur2' => $request->input('tanggal_faktur2'),
            'gross' => (int) $numericTagihan,
            'retur' => (int) $numericRetur,
            'netto' => (int) $numericPenerimaan,
            'kurang_bayar' => (int) $numericKekurangan,
            'lebih_bayar' => (int) $numericKelebihan,
            'keterangan' => $request->input('keterangan'),
        ];

        $datas = TransaksiPendapatan::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('transaksi_pendapatan.index')
            ->with('message', 'Data Pendapatan Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TransaksiPendapatan::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Transaksi Pendapatan Sudah dihapus');
    }
}
