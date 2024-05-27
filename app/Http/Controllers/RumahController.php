<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Rumah;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewrumah = DB::table('viewrumah')->select('*')->get();
        return view('rumah.rumah', compact('viewrumah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penduduks = Penduduk::orderBy('nik_kk', 'ASC')->get();
        return view('rumah.create', compact('penduduks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $simpan = new Rumah();
        $simpan->nik_kk = $request->input('nik');
        $simpan->tgl_bantuan = $request->input('tanggal');
        $simpan->jumlah_dana = $request->input('dana');
        $simpan->keterangan = $request->input('keterangan');
        $simpan->save();
        return redirect()->route('rumah.index')->with('pesan', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('viewrumah')->where('id', $id)->first();
        return view('rumah.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $viewrumah = DB::table('viewrumah')->where('id', $id)->get();
        $penduduks = Penduduk::orderBy('nik_kk', 'ASC')->get();
        return view('rumah.edit', compact('viewrumah', 'penduduks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ubah = Rumah::findOrFail($id);
        $ubah->nik_kk = $request->input('nik');
        $ubah->tgl_bantuan = $request->input('tanggal');
        $ubah->jumlah_dana = $request->input('dana');
        $ubah->keterangan = $request->input('keterangan');
        $ubah->save();
        return redirect()->route('rumah.index')->with('pesan', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = Rumah::findOrFail($id);
        $hapus->delete();
        return redirect()->route('rumah.index')->with('pesan', 'Data Berhasil Dihapus!');
    }
}
