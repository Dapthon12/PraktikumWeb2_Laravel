<!-- Menghubungkan dengan view template master -->
@extends('template.master')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'UBAH DATA PENDUDUK')
<!-- isi bagian konten -->
@section('konten')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header bg-success">
                <h3 class="card-title"> </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('penduduk.update',$data->nik_kk)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="form-label col-sm-2">NIK</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="nik" placeholder="NIK KTP" class="form-control" value="{{ $data->nik_kk }}" readonly>
                            </div>
                        </div>
                        <label class="form-label col-sm-2">Nama Lengkap</label>
                        <div class="col-sm-4">
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" value="{{$data->nama_kk }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-2">Jenis Kelamin</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <select name="jeniskelamin" class="form-control">
                                    <option value="{{$data->jeniskelamin_kk}}">{{$data->jeniskelamin_kk}}</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <label class="form-label col-sm-2">Tanggal Lahir</label>
                        <div class="col-sm-4">
                            <input type="date" name="tgllahir" placeholder="Tanggal Lahir" class="form-control" value="{{$data->tgllahir_kk}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-2">Pendidikan</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="pendidikan" placeholder="SD/SMP..." class="form-control" value="{{$data->pendidikan_kk}}" required>
                            </div>
                        </div>
                        <label class="form-label col-sm-2">Pekerjaan</label>
                        <div class="col-sm-4">
                            <input type="text" name="pekerjaan" placeholder="Pekerjaan" class="form-control" value="{{$data->pekerjaan_kk}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-2">Penghasilan</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="penghasilan" placeholder="Penghasilan" class="form-control" value="{{ $data->penghasilan_kk }}" required>
                            </div>
                        </div>
                        <label class="form-label col-sm-2">Alamat</label>
                        <div class="col-sm-4">
                            <input type="text" name="alamat" placeholder="Alamat Penduduk" class="form-control" value="{{$data->alamat_kk}}" required>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info" id="simpan">UBAH</button>
                        <a href="{{ route('penduduk.index') }}" class="btn btn-danger">BATAL</a>
                    </div>
                </form>
            </div>
        </div><!-- akhir card -->
    </div> <!-- akhir col-12 -->
</div><!-- akhir row -->
@endsection