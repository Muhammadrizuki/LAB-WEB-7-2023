@extends('layout.template')
<!-- START FORM -->
@section('konten') 
<style>
    label, h2 {
        color: #ffffff;
        font-weight: 900;
    }
</style>
<form action='{{ url('buku') }}' method='post'>
@csrf 
<div class="p-5 rounded shadow-sm" style="margin-top: 45px; background-color: rgb(185, 164, 205)">
    <div class="mt-2 mb-3 row">
        <h2 class="fw-bold">Detail Data Buku Baru</h2>
    </div>
    <div class=" mt-3 mb-3 row">
        <label for="idbuku" class="col-sm-2 col-form-label">ID Buku</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='idbuku' value="{{ Session::get('idbuku') }}" id="idbuku">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='judul' value="{{ Session::get('judul') }}" id="judul">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='penulis' value="{{ Session::get('penulis') }}" id="penulis">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tanggal_terbit" class="col-sm-2 col-form-label">Tanggal Terbit</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name='tanggal_terbit' value="{{ Session::get('tanggal_terbit') }}" id="tanggal_terbit">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="kategori" class="col-sm-2 col-form-label">Kategori (Genre)</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='kategori' value="{{ Session::get('kategori') }}" id="kategori">
        </div>
    </div>
    <div class="mb-3 row">
        {{-- <label for="kategori" class="col-sm-2 col-form-label"></label> --}}
        <div class="col-sm-10">
            <a href='{{ url('buku') }}' class="btn btn-danger btn-md"><i class="fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i></a>
            <button type="submit" class="btn btn-primary" name="submit" class="btn btn-danger btn-md"><i class="fa-solid fa-floppy-disk fa-lg" style="color: #ffffff;"></i></button>        </div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection