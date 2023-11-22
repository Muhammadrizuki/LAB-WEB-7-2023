@extends('welcome')
@section('content')
    <div class="container">
        <h1>Crate Warga</h1>
        <form action="/store" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">NAMA</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">NIK</label>
                <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">NO.KK</label>
                <input type="text" name="no_kk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
           
            
            <select class="form-select" name="jenis_kelamin" >
                <option value="pilih jenis kelamin">Pilih Jenis Kelamin</option>
                <option value="L">Laki-Laki</option>
                <option value="p">Perempuan</option>
            </select><br>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ALAMAT</label>
                <textarea class="form-control" name="alamat" rows="10"></textarea><br>
            </div>    
            <input type="submit" name="submit" class="btn " style="background-color: #CD5C08; color:white;width:80px" value="save">
            <a class="btn btn-dark width:80px" href="/warga">Kembali</a>
        </form>
    </div>
   
@endsection 