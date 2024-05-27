<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function cetakPenduduk()
    {
        $penduduks = Penduduk::orderBy("nik_kk", "ASC")->get();
        $data = [
            'penduduks' => $penduduks,
            'tanggal' => date('d/m/Y'),
            'judul' => "Laporan Data Penduduk"
        ];

        $laporan = PDF::loadView('penduduk.laporan', $data)->setPaper('f4', 'landscape');
        $namaTGL = substr(date('d/m/Y'), 0, 2) . substr(date('d/m/Y'), 3, 2) . substr(date('d/m/Y'), 6, 4);
        $namaJAM = substr(date('h:i:s'), 0, 2) . substr(date('h:i:s'), 3, 2) . substr(date('h:i:s'), 6, 4);
        return $laporan->stream('Lap' . $namaTGL . $namaJAM . '.pdf');
    }
    public function cetakSembako()
    {
        $viewsembakos = DB::table('viewsembako')->select('*')->get();
        $data = [
            'viewsembakos' => $viewsembakos,
            'tanggal' => date('d/m/Y'),
            'judul' => "Laporan Bantuan Data Sembako"
        ];

        $laporan = PDF::loadView('sembako.laporan', $data)->setPaper('f4', 'landscape');
        $namaTGL = substr(date('d/m/Y'), 0, 2) . substr(date('d/m/Y'), 3, 2) . substr(date('d/m/Y'), 6, 4);
        $namaJAM = substr(date('h:i:s'), 0, 2) . substr(date('h:i:s'), 3, 2) . substr(date('h:i:s'), 6, 4);
        return $laporan->stream('Lap' . $namaTGL . $namaJAM . '.pdf');
    }
    public function cetakTunai()
    {
        $viewtunai = DB::table('viewtunai')->select('*')->get();
        $data = [
            'viewtunai' => $viewtunai,
            'tanggal' => date('d/m/Y'),
            'judul' => "Laporan Data Bantuan Tunai"
        ];

        $laporan = PDF::loadView('tunai.laporan', $data)->setPaper('f4', 'landscape');
        $namaTGL = substr(date('d/m/Y'), 0, 2) . substr(date('d/m/Y'), 3, 2) . substr(date('d/m/Y'), 6, 4);
        $namaJAM = substr(date('h:i:s'), 0, 2) . substr(date('h:i:s'), 3, 2) . substr(date('h:i:s'), 6, 4);
        return $laporan->stream('Lap' . $namaTGL . $namaJAM . '.pdf');
    }
    public function cetakRumah()
    {
        $viewrumah = DB::table('viewrumah')->select('*')->get();
        $data = [
            'viewrumah' => $viewrumah,
            'tanggal' => date('d/m/Y'),
            'judul' => "Laporan Data Bantuan Bedah Rumah"
        ];

        $laporan = PDF::loadView('rumah.laporan', $data)->setPaper('f4', 'landscape');
        $namaTGL = substr(date('d/m/Y'), 0, 2) . substr(date('d/m/Y'), 3, 2) . substr(date('d/m/Y'), 6, 4);
        $namaJAM = substr(date('h:i:s'), 0, 2) . substr(date('h:i:s'), 3, 2) . substr(date('h:i:s'), 6, 4);
        return $laporan->stream('Lap' . $namaTGL . $namaJAM . '.pdf');
    }
}
