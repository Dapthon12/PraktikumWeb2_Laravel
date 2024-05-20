<!-- Menghubungkan dengan view template master -->
@extends('template.master')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'TAMBAH DATA BANTUAN TUNAI LANGSUNG')
<!-- isi bagian konten -->
@section('konten')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="card-title"> </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('tunai.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="form-label col-sm-2">Penerima</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="nik" name="nik">
                                @foreach ($penduduks as $penduduk)
                                <option value="{{ $penduduk->nik_kk }}">{{ $penduduk->nik_kk}} | {{$penduduk->nama_kk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="form-label col-sm-2">Jumlah Dana</label>
                        <div class="col-sm-4">
                            <input type="text" name="dana" placeholder="Jumlah Dana" class="form-control" value="{{ old('dana') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-2">Tanggal Terima</label>
                        <div class="col-sm-4">
                            <input type="date" name="tanggal" placeholder="Tanggal Terima Bantuan" class="form-control" value="{{ old('tanggal') }}" required>
                        </div>
                        <label class="form-label col-sm-2">Keterangan</label>
                        <div class="col-sm-4">
                            <input type="text" name="keterangan" placeholder="Keterangan" class="form-control" value="{{ old('keterangan') }}" required>
                        </div>
                    </div>
                    <br>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info" id="simpan">SIMPAN</button>
                        <a href="{{ route('tunai.index') }}" class="btn btn-danger">BATAL</a>
                    </div>
                </form>
            </div>
        </div><!-- akhir card -->
    </div> <!-- akhir col-12 -->
</div><!-- akhir row -->

@endsection