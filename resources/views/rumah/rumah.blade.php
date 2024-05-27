<!-- Menghubungkan dengan view template master -->
@extends('template.master')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'HALAMAN UTAMA BANTUAN BEDAH
RUMAH')


<!-- isi bagian konten -->
@section('konten')
<div class="btn-group" role="group">
    <a href="{{route('rumah.create')}}" type="button" class="btn btn-success">Tambah Data</a>
    <a href="{{route('cetakRumah')}}" type="button" class="btn btn-info">Cetak Laporan</a>
</div>
<hr>
@if(Session::has('pesan'))
<div class="alert alert-success" role="alert">
    {{Session::get('pesan')}}
</div>
@endif

<div class="table-responsive margin">
    <table id="table-rumah" class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th style="width: 10px">#</th>
                <th style="width: 100px">NIK</th>
                <th style="width: 100px">Nama Kepala Keluarga</th>
                <th style="width: 100px;">Jenis Kelamin</th>
                <th style="width: 100px;">Pekerjaan</th>
                <th style="width: 100px;">Tanggal Bantuan</th>
                <th style="width: 100px;">Total Renovasi</th>
                <th style="width: 100px;">Keterangan Bedah Rumah</th>
                <th style="width: 50px;"></th>
            </tr>
        </thead>
        <tbody>
            @if($viewrumah->count()>0)
            @foreach ($viewrumah as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->nik_kk}}</td>
                <td>{{$data->nama_kk}}</td>
                <td>{{$data->jeniskelamin_kk}}</td>
                <td>{{$data->pekerjaan_kk}}</td>
                <td>{{$data->tgl_bantuan}}</td>
                <td>{{$data->jumlah_dana}}</td>
                <td>{{$data->keterangan}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="basic example">
                        <a href="{{route('rumah.show',$data->id)}}" class="btn btn-small btn-secondary">Detail</a>
                        <a href="{{route('rumah.edit',$data->id)}}" class="btn btn-small btn-warning">Edit</a>
                        <form action="{{route('rumah.destroy',$data->id)}}" method="POST" onsubmit="return confirm('Apakah yakin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-small btn-danger">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="10">Data Masih Kosong</td>
            </tr>
            @endif
        </tbody>
    </table>

</div>


@endsection