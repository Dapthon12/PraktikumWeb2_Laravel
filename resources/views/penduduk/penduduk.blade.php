<!-- Menghubungkan dengan view template master -->
@extends('template.master')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'HALAMAN UTAMA DATA PENDUDUK')
<!-- isi bagian konten -->
@section('konten')
<a href="{{route('penduduk.create')}}" type="button" class="btn btn-success" id="btnModal">
    Tambah Data
</a>
<hr>
@if(Session::has('pesan'))
<div class="alert alert-success" role="alert">
    {{Session::get('pesan')}}
</div>
@endif
<div class="table-responsive margin">
    <table id="table-penduduk" class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th style="width: 10px">#</th>
                <th style="width: 100px">NIK</th>
                <th style="width: 100px">Nama Kepala Keluarga</th>
                <th style="width: 100px;">Jenis Kelamin</th>
                <th style="width: 100px;">Tanggal Lahir</th>
                <th style="width: 100px;">Pendidikan</th>
                <th style="width: 100px;">Pekerjaan</th>
                <th style="width: 100px;">Penghasilan per Bulan</th>
                <th style="width: 100px;">Alamat</th>
                <th style="width: 50px;"></th>
            </tr>
        </thead>
        <tbody>
            @if($penduduks->count()>0)
            @foreach ($penduduks as $data)

            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->nik_kk}}</td>
                <td>{{$data->nama_kk}}</td>
                <td>{{$data->jeniskelamin_kk}}</td>
                <td>{{$data->tgllahir_kk}}</td>
                <td>{{$data->pendidikan_kk}}</td>
                <td>{{$data->pekerjaan_kk}}</td>
                <td>{{$data->penghasilan_kk}}</td>
                <td>{{$data->alamat_kk}}</td>
                <td>
                    <div class="btn-group" role="group" arialabel="basic example">
                        <a href="{{route('penduduk.show',$data->nik_kk)}}" class="btn btn-small btn-secondary">Detail</a>
                        <a href="{{route('penduduk.edit',$data->nik_kk)}}" class="btn btn-small btn-warning">Edit</a>
                        <form action="{{route('penduduk.destroy',$data->nik_kk)}}" method="POST" onsubmit="return confirm('Apakah yakin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-small btn-danger">
                                Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="10">Data Masih
                    Kosong</td>
            </tr>
            @endif
        </tbody>
    </table>

</div>
@endsection