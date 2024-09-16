<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiUraianPengeluaran;
use Illuminate\Http\Request;

class KlasifikasiUraianPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klasifikasiUraianPengeluaran = KlasifikasiUraianPengeluaran::paginate(5);
        return view('page.klasifikasi_uraian_pengeluaran.index')->with([
            'klasifikasiUraianPengeluaran' => $klasifikasiUraianPengeluaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'uraian_pengeluaran' => $request->input('uraian_pengeluaran')
        ];

        KlasifikasiUraianPengeluaran::create($data);
        return back()->with('message_delete', 'Data Uraian Pengeluaran Sudah ditambahkan');
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
        $data = [
            'uraian_pengeluaran' => $request->input('uraian_pengeluaran')
        ];
        $datas = KlasifikasiUraianPengeluaran::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('KlasifikasiUraianPengeluaran.index')
            ->with('message', 'Data Uraian Pengeluaran Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = KlasifikasiUraianPengeluaran::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Uraian Pengeluaran Sudah dihapus');
    }
}
