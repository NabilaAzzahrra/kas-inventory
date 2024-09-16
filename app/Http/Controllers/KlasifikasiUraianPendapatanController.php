<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiUraianPendapatan;
use Illuminate\Http\Request;

class KlasifikasiUraianPendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klasifikasiUraianPendapatan = KlasifikasiUraianPendapatan::paginate(5);
        return view('page.klasifikasi_uraian_pendapatan.index')->with([
            'klasifikasiUraianPendapatan' => $klasifikasiUraianPendapatan,
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
            'uraian_pendapatan' => $request->input('uraian_pendapatan')
        ];

        KlasifikasiUraianPendapatan::create($data);
        return back()->with('message_delete', 'Data Uraian Pendapatan Sudah ditambahkan');
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
            'uraian_pendapatan' => $request->input('uraian_pendapatan')
        ];
        $datas = KlasifikasiUraianPendapatan::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('KlasifikasiUraianPendapatan.index')
            ->with('message', 'Data Uraian Pendapatan Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = KlasifikasiUraianPendapatan::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Uraian Pendapatan Sudah dihapus');
    }
}
