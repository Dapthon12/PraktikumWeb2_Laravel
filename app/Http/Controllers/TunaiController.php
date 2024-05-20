<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Tunai;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TunaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewtunai = DB::table('viewtunai')->select('*')->get();
        return view('tunai.tunai', compact('viewtunai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penduduks = Penduduk::orderBy('nik_kk', 'ASC')->get();
        return view('tunai.create', compact('penduduks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $simpan = new Tunai();
        $simpan->nik_kk = $request->input('nik');
        $simpan->jumlah_dana = $request->input('dana');
        $simpan->tgl_bantuan = $request->input('tanggal');
        $simpan->keterangan = $request->input('keterangan');
        $simpan->save();
        return redirect()->route('tunai.index')->with('pesan', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('viewtunai')->where('id', $id)->first();
        return view('tunai.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $viewtunai = DB::table('viewtunai')->where('id', $id)->get();
        $penduduks = Penduduk::orderBy('nik_kk', 'ASC')->get();
        return view('tunai.edit', compact('viewtunai', 'penduduks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ubah = Tunai::findOrFail($id);
        $ubah->nik_kk = $request->input('nik');
        $ubah->tgl_bantuan = $request->input('tanggal');
        $ubah->jumlah_dana = $request->input('dana');
        $ubah->keterangan = $request->input('keterangan');
        $ubah->save();
        return redirect()->route('tunai.index')->with('pesan', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = Tunai::findOrFail($id);
        $hapus->delete();
        return redirect()->route('tunai.index')->with('pesan', 'Data Berhasil Dihapus!');
    }
}
