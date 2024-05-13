<!-- Menghubungkan dengan view template master -->
@extends('template.master')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'UBAH DATA BANTUAN SEMBAKO')
<!-- isi bagian konten -->
@section('konten')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header bg-success">
                <h3 class="card-title"> </h3>
            </div>
            <div class="card-body">
                @foreach ($viewsembakos as $viewsembako)
                <form action="{{ route('sembako.update',$viewsembako->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="form-label col-sm-2">Penerima</label>
                        <input type="hidden" name="id" value="{{$viewsembako->id}}">
                        <div class="col-sm-4">
                            <select class="form-control" id="nik" name="nik">
                                <option value="{{$viewsembako->nik_kk}}">
                                    {{$viewsembako->nik_kk}} | {{$viewsembako->nama_kk}}
                                </option>
                                @foreach ($penduduks as $penduduk)
                                <option value="{{$penduduk->nik_kk}}">
                                    {{$penduduk->nik_kk}} | {{$penduduk->nama_kk}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <label class="form-label col-sm-2">Jenis Bantuan</label>
                        <div class="col-sm-4">
                            <input type="text" name="jenis" placeholder="Jenis Bantuan" class="form-control" value="{{$viewsembako->jenis_bantuan }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-2">Tanggal Terima</label>
                        <div class="col-sm-4">
                            <input type="date" name="tanggal" placeholder="Tanggal Terima Bantuan" class="form-control" value="{{$viewsembako->tgl_bantuan}}" required>
                        </div>
                        <label class="form-label col-sm-2">Keterangan</label>
                        <div class="col-sm-4">
                            <input type="text" name="keterangan" placeholder="Keterangan" class="form-control" value="{{$viewsembako->keterangan}}" required>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info" id="simpan">UBAH</button>
                        <a href="{{ route('sembako.index') }}" class="btn btn-danger">BATAL</a>
                    </div>
                </form>
                @endforeach
            </div>
        </div><!-- akhir card -->
    </div> <!-- akhir col-12 -->
</div><!-- akhir row -->
@endsection