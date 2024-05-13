<!-- Menghubungkan dengan view template master -->
@extends('template.master')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'HALAMAN UTAMA | PRAKTIKUM WEB II 6D')
<!-- isi bagian konten -->
@section('konten')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('/lib/img/rumah.jpg') }}" class="d-block w-100" width="200" height="400px">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('/lib/img/blt.jpeg') }}" class="d-block w-100" width="200" height="400px">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('/lib/img/barito.jpg') }}" class="d-block w-100" width="200" height="400px">
        </div>
    </div>
</div>

@endsection