<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiPendapatan;
use Illuminate\Http\Request;

class KlasifikasiPendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klasifikasiPendapatan = KlasifikasiPendapatan::paginate(5);
        return view('page.klasifikasi_pendapatan.index')->with([
            'klasifikasiPendapatan' => $klasifikasiPendapatan,
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
            'nama' => $request->input('nama')
        ];

        KlasifikasiPendapatan::create($data);
        return back()->with('message_delete', 'Data Klasifikasi Pendapatan Sudah ditambahkan');
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
            'nama' => $request->input('nama')
        ];
        $datas = KlasifikasiPendapatan::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('MasterKlasifikasiPendapatan.index')
            ->with('message', 'Data Klasifikasi Pendapatan Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = KlasifikasiPendapatan::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Klasifikasi Pendapatan Sudah dihapus');
    }
}
