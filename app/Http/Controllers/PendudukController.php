<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penduduks = Penduduk::orderBy("nik_kk", "ASC")->get();

        return view("penduduk.penduduk", compact("penduduks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penduduk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $simpan = new Penduduk();
        $simpan->nik_kk = $request->input('nik');
        $simpan->nama_kk = $request->input('nama');
        $simpan->jeniskelamin_kk = $request->input('jeniskelamin');
        $simpan->tgllahir_kk = $request->input('tgllahir');
        $simpan->pendidikan_kk = $request->input('pendidikan');
        $simpan->pekerjaan_kk = $request->input('pekerjaan');
        $simpan->penghasilan_kk = $request->input('penghasilan');
        $simpan->alamat_kk = $request->input('alamat');
        $simpan->save();
        return redirect()->route('penduduk.index')->with('pesan', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Penduduk::where('nik_kk', $id)->first();

        return view('penduduk.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Penduduk::where('nik_kk', $id)->first();

        return view('penduduk.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ubah = Penduduk::where('nik_kk', $request->input('nik'))->first();

        $ubah->nama_kk = $request->input('nama');
        $ubah->jeniskelamin_kk = $request->input('jeniskelamin');
        $ubah->tgllahir_kk = $request->input('tgllahir');
        $ubah->pendidikan_kk = $request->input('pendidikan');
        $ubah->pekerjaan_kk = $request->input('pekerjaan');
        $ubah->penghasilan_kk = $request->input('penghasilan');
        $ubah->alamat_kk = $request->input('alamat');
        $ubah->save();
        return redirect()->route('penduduk.index')->with('pesan', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = Penduduk::findOrFail($id);
        $hapus->delete();
        return redirect()->route('penduduk.index')->with('pesan', 'Data Berhasil Dihapus!');
    }
}
