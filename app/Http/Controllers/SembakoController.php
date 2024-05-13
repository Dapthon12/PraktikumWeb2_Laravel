<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Sembako;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SembakoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewsembakos = DB::table('viewsembako')->select('*')->get();
        return view('sembako.sembako', compact('viewsembakos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penduduks = Penduduk::orderBy('nik_kk', 'ASC')->get();
        return view('sembako.create', compact('penduduks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $simpan = new Sembako();
        $simpan->nik_kk = $request->input('nik');
        $simpan->jenis_bantuan = $request->input('jenis');
        $simpan->tgl_bantuan = $request->input('tanggal');
        $simpan->keterangan = $request->input('keterangan');
        $simpan->save();
        return redirect()->route('sembako.index')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Sembako::where('id', $id)->first();
        return view('sembako.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $viewsembakos = DB::table('viewsembako')->where('id', $id)->get();
        $penduduks = Penduduk::orderBy('nik_kk', 'ASC')->get();
        return view('sembako.edit', compact('viewsembakos', 'penduduks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ubah = Sembako::findOrFail($id);
        $ubah->nik_kk = $request->input('nik');
        $ubah->tgl_bantuan = $request->input('tanggal');
        $ubah->jenis_bantuan = $request->input('jenis');
        $ubah->keterangan = $request->input('keterangan');
        $ubah->save();
        return redirect()->route('sembako.index')->with('pesan', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = Sembako::findOrFail($id);
        $hapus->delete();
        return redirect()->route('sembako.index')->with('pesan', 'Data Berhasil Dihapus!');
    }
}
