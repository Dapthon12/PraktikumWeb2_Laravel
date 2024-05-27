<!-- Menghubungkan dengan view template master -->
@extends('template.master')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'PROFIL DATA BANTUAN BEDAH RUMAH')

<!-- isi bagian konten -->
@section('konten')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="card-title"> </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('rumah.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="form-label col-sm-2">Penerima</label>
                        <div class="col-sm-4">
                            <input type="text" name="nama" placeholder="Nama Penerima" class="form-control" value="{{ $data->nama_kk }}" readonly>
                        </div>
                        <label class="form-label col-sm-2">Jumlah Dana</label>
                        <div class="col-sm-4">
                            <input type="text" name="dana" placeholder="Jumlah Dana" class="form-control" value="{{ $data->jumlah_dana }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-2">Tanggal Terima</label>
                        <div class="col-sm-4">
                            <input type="date" name="tanggal" placeholder="Tanggal Terima Bantuan" class="form-control" value="{{ $data->tgl_bantuan }}" readonly>
                        </div>
                        <label class="form-label col-sm-2">Keterangan</label>
                        <div class="col-sm-4">
                            <input type="text" name="keterangan" placeholder="Keterangan" class="form-control" value="{{ $data->keterangan}}" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="card-footer text-center">
                        <a href="{{ route('rumah.index') }}" class="btn btn-danger">BATAL</a>
                    </div>
                </form>
            </div>
        </div><!-- akhir card -->
    </div> <!-- akhir col-12 -->
</div><!-- akhir row -->

@endsection