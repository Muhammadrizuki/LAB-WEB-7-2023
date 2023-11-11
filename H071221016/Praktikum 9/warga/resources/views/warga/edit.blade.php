@extends('welcome')
@section('content')
<div class="container">
    <h1>Edit Data</h1>
    <form action="/{{$warga->id}}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NAMA</label>
            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$warga->nama}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NIK</label>
            <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$warga->nik}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NO.KK</label>
            <input type="text" name="no_kk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$warga->no_kk}}">
        </div>
        
        
        <select class="form-select" name="jenis_kelamin" >
            <option value="pilih jenis kelamin">Pilih Jenis Kelamin</option>
            <option value="L" @if($warga->jenis_kelamin == "L") selected @endif>Laki-Laki</option>
            <option value="p" @if($warga->jenis_kelamin == "P") selected @endif>Perempuan</option>
        </select><br>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ALAMAT</label>
            <textarea class="form-control" name="alamat" rows="10">{{$warga->alamat}}</textarea><br>
        </div>    
        <input type="submit" name="submit" class="btn "  style="background-color: #CD5C08; color:white;width:80px" value="update">
        <a class="btn btn-dark" style="width:80px" href="/warga">Batal</a>
    </form>
</div>

@endsection 