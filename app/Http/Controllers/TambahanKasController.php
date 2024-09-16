<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;

class TambahanKasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TambahanKas = Kas::paginate(5);
        return view('page.kas.index')->with([
            'TambahanKas' => $TambahanKas,
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
            'kas' => $request->input('kas'),
            'tanggal_kas' => $request->input('tgl_kas')
        ];

        Kas::create($data);

        return redirect()
            ->route('tambahanKas.index')
            ->with('message', 'Data Kas Sudah ditambahkan');
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
            'kas' => $request->input('kas'),
            'tanggal_kas' => $request->input('tgl_kas')
        ];

        $datas = Kas::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('tambahanKas.index')
            ->with('message', 'Data Tambahan Kas Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kas::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Tambahan Kas Sudah dihapus');
    }
}
